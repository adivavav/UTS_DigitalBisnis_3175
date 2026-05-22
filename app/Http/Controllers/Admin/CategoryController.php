<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // READ + SEARCH
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::where('name', 'LIKE', "%$search%")
            ->latest()
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    // CREATE
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name)
        ]);

        return redirect()->back();
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name)
        ]);

        return redirect()->back();
    }

    // DELETE
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back();
    }
}