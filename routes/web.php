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

Route::get('/', function () {
    return view('f.welcome');
});

// Auth::routes();
$this->get('pkl-admin', 'Auth\LoginController@showLoginForm')->name('show.login');
$this->post('pkl-admin/post', 'Auth\LoginController@login')->name('post.login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'b\HomeController@index')->name('home');
Route::resource('categories', 'b\CategoriesController');
Route::get('categories/datatables', 'b\CategoriesCOntroller@search')->name('category.search');
