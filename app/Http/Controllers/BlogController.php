<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\NewsCategories;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::select('id', 'title', 'content', 'thumbnail', 'status', 'created_at')
                ->orderBy('created_at', 'desc')
                ->get();

        return view('admin.blog.list', compact('blogs'));
    }

    public function create()
    {
        $categories = NewsCategories::where('status', 1)->get();

        return view('admin.blog.create', compact('categories'));
    }

    public function store(StoreBlogRequest $request)
    {
        // dd($request->validated());
        if ($request->hasFile('thumbnail')) 
        {
            $thumbnail = $request->file('thumbnail');
            $imageName = $thumbnail->store('thumbnail');
            
            $validatedData = $request->validated();

            $slug = Str::slug($request->title);

            $validatedData['slug'] = $slug;
            $validatedData['thumbnail'] = $imageName;

            $result = Blog::create($validatedData);

            if ($result) {
                return redirect()
                    ->route('blog.list')
                        ->with('success', 'Add post successfully!');
            }
        }
    }

    public function edit(Blog $post)
    {
        $categories = NewsCategories::where('status', 1)->get();
        
        return view('admin.blog.edit', compact('post', 'categories'));
    }

    public function update(UpdateBlogRequest $request, Blog $post)
    {
        $params = $request->except('_token');
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid())
        {
            $resultDelete = Storage::delete($post->thumbnail);
            if($resultDelete) {
                $fileName = time().'_'.$request->file('thumbnail')->getClientOriginalName();
                $saveName = $request->file('thumbnail')->storeAs('thumbnail',$fileName,'public');

                $params['thumbnail'] = $saveName;
            } 
        } else {
            $params['thumbnail'] = $post->thumbnail;
        }
        $post->update($params);
        return redirect()
            ->route('blog.edit', $post->id)
                ->with('success', "Cập nhật thành công!");
    }

    public function destroy(Blog $post)
    {
        $result = $post->delete();

        if($result) {
            return redirect()
                ->route('blog.list')
                    ->with('success', 'Deleted successfully!');
        }
    }
}
