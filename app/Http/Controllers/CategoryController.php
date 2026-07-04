<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('front.pages.categories', compact('categories'));
    }
}
