<?php

namespace App\Http\Controllers\f;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $post = Post::orderBy('updated_at', 'DESC')->first();
        $kategori = Category::orderBy('updated_at', 'DESC')->first();

        return response()->view('f.sitemap.sitemap', [
            'post' => $post,
            'kategori' => $kategori
        ])->header('Content-Type', 'text/xml');
    }

    public function posts()
    {
        $posts = Post::all();
        return response()->view('f.sitemap.posts', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function categories()
    {
        $categories = Category::all();
        return response()->view('f.sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

}
