<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

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
            $categories = Category::with(['posts'])->orderBy('name', 'asc')->get();
        return $view->with('categories', $categories);
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
