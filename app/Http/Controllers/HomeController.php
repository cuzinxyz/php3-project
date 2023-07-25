<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Banner;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::select('id', 'title', 'image_url')
                    ->get();

        // Your code
        $properties = DB::table('properties')
        ->leftJoin('property_images', function ($join) {
            $join->on('properties.id', '=', 'property_images.property_id')
                ->whereRaw('property_images.id = (SELECT MIN(id) FROM property_images WHERE property_id = properties.id)');
        })
        ->select('properties.id', 'properties.address', 'properties.title', 'properties.price', 'properties.area', 'properties.beds', 'properties.baths', 'property_images.image_url')
        ->get();

        $blogs = Blog::select('slug', 'thumbnail', 'updated_at', 'title')->take(6)->get();

        // dd($properties);
        return view('client.home', compact('banners', 'properties', 'blogs'));
    }

    public function show(Property $property)
    {
        $images = PropertyImage::where('property_id', $property->id)->get();

        // dd($images);
        return view('client.property-single', compact(
            'property',
            'images'
        ));
    }

    public function blog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        return view('client.blog-single', compact(
            'blog',
        ));
    }

    public function admin()
    {
        return view('admin.home');
    }
}
