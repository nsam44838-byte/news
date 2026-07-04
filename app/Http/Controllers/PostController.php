<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function frontIndex()
    {
        $posts = Post::latest()->paginate(6);
        return view('front.pages.posts', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('front.pages.post-show', compact('post'));
    }
}
