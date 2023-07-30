<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::select('banners.id', 'banners.title', 'image_url', 'property_id')
            ->orderBy('banners.created_at', 'desc')->get();

        return view('admin.banner.list', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(BannerRequest $request)
    {
        if ($request->hasFile('image_url'))
        {
            $image_url = $request->file('image_url');
            $imageName = $image_url->store('banners');

            $validatedData = $request->validated();

            $validatedData['image_url'] = $imageName;

            $result = Banner::create($validatedData);

            if ($result) {
                return  redirect()
                    ->route('banner.list')
                    ->with('success', 'Add banner successfully!');
            }
        }
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(BannerRequest $request, Banner $banner)
    {
        $params = $request->except('_token');
        if ($request->hasFile('image_url') && $request->file('image_url')->isValid())
        {
            $resultDelete = Storage::delete($banner->image_url);
            if($resultDelete) {
                $fileName = time().'_'.$request->file('image_url')->getClientOriginalName();
                $saveName = $request->file('image_url')->storeAs('banners',$fileName,'public');

                $params['image_url'] = $saveName;
            }
        } else {
            $params['image_url'] = $banner->image_url;
        }
        $banner->update($params);
        return redirect()
            ->route('banner.edit', $banner)
                ->with('success', "Cập nhật thành công!");
    }

    public function destroy(Banner $banner)
    {
        $result = $banner->delete();

        if($result) {
            return redirect()
                ->route('banner.list')
                ->with('success', 'Deteled successfully');
        }
    }
}
