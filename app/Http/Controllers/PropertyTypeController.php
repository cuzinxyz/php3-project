<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PropertyTypeRequest;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $types = PropertyType::all();

        return view('admin.property-type.list', compact('types'));
    }

    public function create()
    {
        return view('admin.property-type.create');
    }

    public function store(PropertyTypeRequest $request)
    {
        PropertyType::create($request->validated());

        return redirect()
            ->route('property-type.list')
                ->with('success', 'Added property type successfully!');
    }

    public function edit(PropertyType $type)
    {
        return view('admin.property-type.edit', compact('type'));
    }

    public function update(PropertyTypeRequest $request, PropertyType $type)
    {
        $type->update($request->validated());

        return redirect()
            ->route('property-type.list')
                ->with('success', 'Edited property type successfully!');
    }

    public function destroy(PropertyType $type)
    {
        $result = $type->delete();

        if($result) {
            return redirect()
                ->route('property-type.list')
                    ->with('success', 'Deleted property type successfully!');
        } 
    }
}
