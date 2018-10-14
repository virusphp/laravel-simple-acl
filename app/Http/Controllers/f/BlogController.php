<?php

namespace App\Http\Controllers\f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\User;

class BlogController extends FrontendController
{
    public function index()
    {
        $utama      = Post::with('user')->latest()->published()->paginate(1);
        $blogutama  = Post::with('user')->published()->paginate(10);
        // $random     = Post::with('user')->published()->paginate(10);
        return view('f.index', compact('utama', 'blogutama'));
    }
}
