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
        $sliderblog  = Post::with('user')->latest()->published()->paginate(9);
        $bloglatest  = Post::with('user')->published()->paginate(10);
        return view('f.index', compact('sliderblog', 'bloglatest'));
    }

    public function show(Post $post)
    {
        return view("f.show", compact('post'));
    }
}
