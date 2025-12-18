<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage; // ✅ Add this line

class SlideController extends Controller
{

    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('slides', 'public');

        Slide::create([
            'title' => $request->title,
            'description' => $request->description ?? '',
            'image' => $path,
            'is_active' => $request->is_active ?? 1,
        ]);

        return redirect()->route('admin.slide.index')->with('success', 'Slide added!');
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slide.edit', compact('slide'));
    }

  public function update(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slide->title = $request->title;
        $slide->description = $request->description;

        if ($request->hasFile('image')) {
            if ($slide->image && Storage::exists($slide->image)) {
                Storage::delete($slide->image);
            }
            $path = $request->file('image')->store('slides', 'public');
            $slide->image = $path;
        }

        $slide->save();

        return redirect()->route('admin.slide.index')->with('success', 'Slide updated successfully.');
    }

        public function destroy($id)
        {
            $slide = Slide::findOrFail($id);

            // Delete image from storage
            if ($slide->image && Storage::exists($slide->image)) {
                Storage::delete($slide->image);
            }

            $slide->delete();

            return redirect()->route('admin.slide.index')->with('success', 'Slide deleted successfully.');
        }

// Optional: show trashed slides
public function trashed()
{
    $slides = Slide::onlyTrashed()->get();
    return view('admin.slide.trashed', compact('slides'));
}

// Optional: restore soft deleted slide
public function restore($id)
{
    $slide = Slide::onlyTrashed()->findOrFail($id);
    $slide->restore();
    return redirect()->route('admin.slide.index')->with('success', 'Slide restored successfully.');
}
}
