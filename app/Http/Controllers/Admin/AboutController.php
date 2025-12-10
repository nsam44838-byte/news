<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // make sure this matches your folder name: admin/category/index.blade.php
        return view('admin.about.index');
    }
}
