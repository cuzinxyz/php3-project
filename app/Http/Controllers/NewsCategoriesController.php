<?php

namespace App\Http\Controllers;

use App\Models\NewsCategories;
use App\Http\Requests\StoreNewsCategoriesRequest;
use App\Http\Requests\UpdateNewsCategoriesRequest;

class NewsCategoriesController extends Controller
{
    public function index()
    {
        $categories = NewsCategories::where('status', 1)->get();

        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreNewsCategoriesRequest $request)
    {
        NewsCategories::create($request->validated());

        return redirect()
            ->route('categories.list')
                ->with('success', 'Add category successfully!');
    }

    public function edit(NewsCategories $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateNewsCategoriesRequest $request, NewsCategories $category)
    {
        $category->update($request->validated());

        return redirect()
            ->route('categories.list')
                ->with('success', 'Updated category successfully!');
    }

    public function destroy(NewsCategories $category)
    {
        $result = $category->delete();

        if($result) {
            return redirect()
                ->route('categories.list')
                    ->with('success', 'Deteled successfully');
        } 
    }
}
