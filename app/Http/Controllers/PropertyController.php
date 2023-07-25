<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::select('id', 'title', 'description', 'area', 'price', 'address', 'property_type_id', 'phone_number', 'status')
            ->get();

            $properties = $properties->map(function ($property) {
                $propertyTypeId = $property->property_type_id;
                $propertyTypeName = PropertyType::where('id', $propertyTypeId)->value('type_name');

                $property->type_name = $propertyTypeName;

                return $property;
            });

        return view('admin.property.list', compact('properties'));
    }

    public function getAllProperties(Request $request)
    {
        $search = $request->input('search');

        // Truy vấn database với điều kiện tìm kiếm
        $properties = Property::select('id', 'title', 'price', 'address', 'property_type_id')
                ->where('title', 'like', "%$search%")
                ->get();

            $properties = $properties->map(function ($property) {
                $propertyTypeId = $property->property_type_id;
                $propertyTypeName = PropertyType::where('id', $propertyTypeId)->value('type_name');

                $property->type_name = $propertyTypeName;

                return $property;
            });

        return response()
            ->json($properties);
    }

    public function create()
    {
        $types = PropertyType::all();

        return view('admin.property.create', compact('types'));
    }

    public function store(PropertyRequest $request)
    {
        if ($request->hasFile('images'))
        {
            $property = Property::create($request->validated());

            $images = $request->file('images');

            foreach ($images as $image) {
                $imageName = $image->store('images');

                // Lưu tên tệp vào cơ sở dữ liệu
                PropertyImage::create([
                    'image_url' => $imageName,
                    'property_id' => $property->id
                ]);
            }
        }

        if( $property )
        {
            return redirect()
                ->route('property.list')
                    ->with('success', 'Add new property successfully!');
        }
    }

    public function edit(Property $property)
    {
        $types = PropertyType::all();
        $oldImages = PropertyImage::where('property_id', $property->id)->get();
// dd($oldImages);
        return view('admin.property.edit', compact('property', 'types', 'oldImages'));
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $property->update($request->validated());

        if ($request->hasFile('images'))
        {
            $images = $request->file('images');
            $oldImages = PropertyImage::where('property_id', $property->id)->get();
            foreach ($oldImages as $old)
            {
                $resultDelete = Storage::delete($old->image_url);
                if($resultDelete) {
                    PropertyImage::where('property_id', $property->id)->delete();
                }
            }
            foreach ($images as $image)
            {
                $imageName = $image->store('images');
                if($oldImages) {
                    // Lưu tên tệp vào cơ sở dữ liệu
                    PropertyImage::create([
                        'image_url' => $imageName,
                        'property_id' => $property->id
                    ]);
                }
            }
        }
        return redirect()
            ->route('property.list')
                ->with('success', 'Update successfully!');
    }

    public function destroy(Property $property)
    {
        $result = $property->delete();

        if($result) {
            return redirect()
                ->route('property.list')
                    ->with('success', 'Deleted successfully!');
        }
    }
}
