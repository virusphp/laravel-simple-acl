<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Auth::routes();
Route::get('pkl-admin', 'Auth\LoginController@showLoginForm')->name('show.login');
Route::post('pkl-admin/post', 'Auth\LoginController@login')->name('post.login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//frontend
Route::group(['namespace' => 'f'], function () {
    Route::get('/', 'BlogController@index');
    Route::get('post/{post}', 'BlogController@show')->name('show.post');
    Route::get('categori/{category}', 'BlogController@category')->name('category');
    Route::get('author/{author}', 'BlogController@author')->name('author');

});

//Backend
Route::group(['middleware' => ['auth'], 'namespace' => 'b', 'prefix' => 'b'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('sliders', 'SliderController');
    Route::get('users/ganti-password/{id}', 'UserController@password')->name('users.password');
    Route::put('users/ganti-password/post/{id}', 'UserController@gantiPassword')->name('ganti.password');
    Route::get('blogs/tong-sampah', 'PostController@tongSampah')->name('blogs.sampah');
    Route::get('blogs/restore/{id}', 'PostController@restore')->name('blogs.restore');
    Route::get('blogs/forceDestroy/{forceDestroy}', 'PostController@forceDestroy')->name('blogs.forceDestroy');
    Route::resource('categories', 'CategoriesController');
    Route::post('categories/save', 'CategoriesController@saveCategory')->name('categories.saveCategory');
    Route::resource('blogs', 'PostController');
    Route::get('blogs?{filter}', 'PostController@index')->name('blogs.filter');
    Route::get('blogs/publish/{id}', 'PostController@publish')->name('blogs.publish');
});

//Sitemap

Route::group(['namespace' => 'f'], function () {
    Route::get('sitemap.xml', 'SitemapController@sitemap');
    Route::get('sitemap/posts.xml', 'SitemapController@posts');
    Route::get('sitemap/kategori.xml', 'SitemapController@categories');
});
