<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    // public function index(){
    //      // Fetch all active slides
    //     $posts = Post::where('is_active', 1)->get();

    //     return view('slid', compact('slides'));
    // }
    // Show list of all news
    public function frontIndex()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }



    // Show single news detail
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }
    
}
