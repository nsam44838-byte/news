<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::latest()->get();
        $posts  = Post::latest()->get();
        return view('front.pages.home', compact('slides', 'posts'));
    }
}
