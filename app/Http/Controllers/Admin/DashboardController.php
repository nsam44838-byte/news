<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Post;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'slides' => Slide::count(),
            'categories' => Category::count(),
            'posts' => Post::count(),
            'news' => News::count(),
            'users' => User::count(),
        ];

        $recentPosts = Post::latest()->take(5)->get();
        $recentSlides = Slide::latest()->take(5)->get();

        return view('admin.dashboard.index', compact('stats', 'recentPosts', 'recentSlides'));
    }
}
