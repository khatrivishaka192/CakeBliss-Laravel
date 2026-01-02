<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function cakesByCategory($id)
    {
        $category = Category::findOrFail($id);  // Get category info
        $cakes = $category->cakes;              // Get all cakes under this category

        return view('admin.categories.cakes', compact('category', 'cakes'));
    }

    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Added Successfully');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    public function destroy($id) {
        Category::destroy($id);
        return back()->with('success', 'Category Deleted Successfully');
    }
}
