<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create([
            'category' => $request->category,
        ]);

        return back()->with('success','Category created successfully');
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit',compact('category','categories'));
    }

    public function update(Category $category, Request $request)
    {
        $category->update([
            'category' => $request->category,
        ]);

        return redirect()->route('category.index')->with('success','Category updated successfully');
    }

    public function destroy(Category $category)
    {
        // dd('delete');
        $category->delete();
        return back()->with('danger','Category deleted succussfull');
    }
}
