<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // Admin index
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    // Admin create
    public function create()
    {
        return view('admin.news.create');
    }

    // Admin store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News added successfully.');
    }

    // NEW: Front-end index
    public function frontIndex()
    {
        $news = News::latest()->get(); // fetch all news
        return view('news', compact('news')); // resources/views/news.blade.php
    }
}
