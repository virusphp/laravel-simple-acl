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
        $sliderblog = Post::with('user')->popular()->published()->paginate(9);
        $bloglatest = Post::with('user')->latest()->published()->paginate($this->limit);
        return view('f.index', compact('sliderblog', 'bloglatest'));
    }

    public function show(Post $post)
    {
        $post->increment('view_count');
        $postlatest = Post::with('user')->latest()->published()->paginate($this->limit);
        return view("f.show", compact('post', 'postlatest'));
    }

    public function category(Category $category)
    {
        $sliderblog = Post::with('user')->latest()->published()->paginate(9);

        $bloglatest = $category->posts()
            ->with('user')
            ->published()
            ->paginate($this->limit);

        return view('f.index', compact('sliderblog', 'bloglatest'));
    }

    public function author(User $author)
    {
        $sliderblog = Post::with('user')->latest()->published()->paginate(9);

        $bloglatest = $author->posts()
            ->with('category')
            ->published()
            ->paginate($this->limit);

        return view('f.index', compact('sliderblog', 'bloglatest'));
    }
}
