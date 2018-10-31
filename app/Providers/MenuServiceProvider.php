<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Post;
use App\Slider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.f.patrials.menu', function($view){
            $categories =  Category::with(['posts' => function($query) {
                $query->published();
            }])->where('id', '!=', 1)->orderBy('name', 'asc')->get();
            return $view->with('categories', $categories);
        });

        view()->composer('f.widgets.terkini', function($view){
            $terkini = Post::with('user')->latest()->published()->paginate(3);
        return $view->with('terkini', $terkini);
        });

        view()->composer('f.widgets.populer', function($view){
            $populer = Post::with('user')->latest()->populer()->paginate(5);
        return $view->with('populer', $populer);
        });

        view()->composer('f.widgets.sliders', function($view){
            $sliders = Slider::startAt()->finishAt()->get();
        return $view->with('sliders', $sliders);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
