<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();

        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $path = $request->file('image')->store('images/category');
        if(!$path) {
            return redirect()->back()->withInput()->with("ERROR", __("Failed to upload image"));
        }

        $category = Category::create([
            'image' => $path,
            'name' => $request->get('name'),
        ]);
        if(empty($category)) {
            return redirect()->back()->withInput();
        }
        return redirect()->route('categories.index')->with("SUCCESS", __("Category has been created successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['categories'] = $category;

        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if($request->hasFile('image')) {
            if($category->image) {
                Storage::delete($category->image);
            }
            $path = $request->file('image')->store('images/category');
        }
        if($category->update([
            $category->name = $request->get('name'),
            $category->image = $path
        ])) {
            return redirect()->route('categories.index')->with('SUCCESS', __('Category has been updated successfully'));
        }
        return redirect()->back()->withInput()->with('ERROR', __('Failed to updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        if($category->delete()) {
            return redirect()->back()->with('SUCCESS', __('Category has been deleted'));
        }
        return redirect()->back()->with('ERROR', __('Failed to delete Category'));
    }
}