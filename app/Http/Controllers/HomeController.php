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
        ->leftJoin('property_type', 'properties.property_type_id', '=', 'property_type.id')
        ->select('property_type.type_name','properties.id', 'properties.address', 'properties.title', 'properties.price', 'properties.area', 'properties.beds', 'properties.baths', 'property_images.image_url')
        ->whereNull('properties.deleted_at')
        ->get();

        $blogs = Blog::select('slug', 'thumbnail', 'news.updated_at', 'title', 'news_categories.category_name', 'news.category_id')
        ->leftJoin('news_categories', 'news.category_id', '=', 'news_categories.id')
        ->take(6)
        ->get();

        // dd($properties);
        return view('client.home', compact('banners', 'properties', 'blogs'));
    }

    public function list(Request $request)
    {
        $query = DB::table('properties')
            ->leftJoin('property_images', function ($join) {
                $join->on('properties.id', '=', 'property_images.property_id')
                    ->whereRaw('property_images.id = (SELECT MIN(id) FROM property_images WHERE property_id = properties.id)');
            })
            ->leftJoin('property_type', 'properties.property_type_id', '=', 'property_type.id')
            ->select('property_type.type_name', 'properties.id', 'properties.address', 'properties.title', 'properties.price', 'properties.area', 'properties.beds', 'properties.baths', 'property_images.image_url')
            ->whereNull('properties.deleted_at');
        if($request->isMethod('POST')) {
            $searchKeyw = $request->input('search-key');

            $query->where('title', 'LIKE', '%'.$searchKeyw.'%');
            // dd($searchKeyw);
        }

        $properties = $query->get();

        return view('client.property-grid', compact('properties'));
    }

    public function news()
    {
        $blogs = Blog::select('slug', 'thumbnail', 'news.updated_at', 'title', 'news_categories.category_name', 'news.category_id')
        ->leftJoin('news_categories', 'news.category_id', '=', 'news_categories.id')
        ->whereNull('news.deleted_at')
        ->get();

        // dd($blogs);

        return view('client.blog-grid', compact('blogs'));
    }

    public function type(String $id)
    {
        $properties = DB::table('properties')
            ->leftJoin('property_images', function ($join) {
                $join->on('properties.id', '=', 'property_images.property_id')
                    ->whereRaw('property_images.id = (SELECT MIN(id) FROM property_images WHERE property_id = properties.id)');
            })
            ->leftJoin('property_type', 'properties.property_type_id', '=', 'property_type.id')
            ->select('property_type.type_name', 'properties.id', 'properties.address', 'properties.title', 'properties.price', 'properties.area', 'properties.beds', 'properties.baths', 'property_images.image_url')
            ->where('property_type_id', $id)
            ->whereNull('properties.deleted_at')
            ->get();
        return view('client.property-type-grid', compact('properties'));
    }

    public function category(String $id)
    {
        $blogs = Blog::select('slug', 'thumbnail', 'news.updated_at', 'title', 'news_categories.category_name', 'news.category_id')
        ->leftJoin('news_categories', 'news.category_id', '=', 'news_categories.id')
        ->where('category_id', $id)
        ->whereNull('news.deleted_at')
        ->get();

        return view('client.blog-category-grid', compact('blogs'));
    }

    public function show(Property $property)
    {
        $images = PropertyImage::where('property_id', $property->id)->get();

        $property = Property::where('properties.id', $property->id)->select('properties.*', 'property_type.type_name')->leftJoin('property_type', 'properties.property_type_id','=', 'property_type.id')
        ->first();

        // dd($property);
        return view('client.property-single', compact(
            'property',
            'images'
        ));
    }

    public function blog($slug)
    {
        $blog = Blog::where('slug', $slug)
        ->leftJoin('news_categories', 'news.category_id', '=', 'news_categories.id')
        ->first();

        return view('client.blog-single', compact(
            'blog',
        ));
    }

    public function admin()
    {
        return view('admin.home');
    }
}
