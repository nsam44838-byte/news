<?php

namespace App\Http\Controllers;

use App\Models\Slide;

class SlideController extends Controller
{
    public function index()
    {
        // Fetch all active slides
        $slides = Slide::where('is_active', 1)->get();

        return view('slide', compact('slides'));
    }
}
