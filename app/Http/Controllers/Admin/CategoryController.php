<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Index page
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    // Show Create Form
    public function create()
    {
        return view('admin.category.create');
    }

    // Store category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description ?? '',
            'is_active' => $request->is_active ?? 1,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category added successfully!');
    }

    // Show Edit Form
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    // Update category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description ?? '',
            'is_active' => $request->is_active ?? 1,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully!');
    }

    // Delete category
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully!');
    }
}
