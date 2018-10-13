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

Route::get('/', 'f\BlogController@index');

// Auth::routes();
Route::get('pkl-admin', 'Auth\LoginController@showLoginForm')->name('show.login');
Route::post('pkl-admin/post', 'Auth\LoginController@login')->name('post.login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['namespace' => 'b', 'prefix' => 'b'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('blogs', 'PostController');
    Route::get('categories/datatables', 'CategoriesCOntroller@search')->name('category.search');
    Route::post('categories/save', 'CategoriesController@saveCategory')->name('categories.saveCategory');
});
