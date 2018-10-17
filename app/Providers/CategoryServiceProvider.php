<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category; 

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('f.widgets.category', function($view){
            $categories =  Category::with(['posts' => function($query) {
                $query->published();
            }])->orderBy('name', 'asc')->get();

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
