<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function frontIndex()
{
    $posts = Post::latest()->paginate(6);

    return view('post', compact('posts'));
}
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }


public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'content'     => 'required|string',
        'image'       => 'nullable|image|max:2048',
    ]);

    $image = $request->hasFile('image') 
        ? $request->file('image')->store('posts', 'public') 
        : null;

    // Generate unique slug
    $slug = Str::slug($request->title);
    $count = Post::where('slug', 'LIKE', "{$slug}%")->count();
    if ($count > 0) {
        $slug .= '-' . ($count + 1);
    }

    Post::create([
        'title'       => $request->title,
        'slug'        => $slug, // unique slug
        'category_id' => $request->category_id,
        'content'     => $request->content,
        'image'       => $image,
        'user_id'     => Auth::id(),
    ]);

    return redirect()->route('admin.post.index')->with('success', 'Post created successfully!');
}

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'category_id' => $request->category_id,
            'content'     => $request->content,
            'image'       => $post->image,
        ]);

        return redirect()->route('admin.post.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back()->with('success', 'Post deleted successfully!');
    }
}
