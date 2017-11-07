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

Route::get('/', function() {
    return view('home.index');
});

//Blog
Route::get('blog', 'BlogController@index');
Route::resource('blog/post', 'PostController');

//Blog json
Route::get('blog/posts.json/{all?}', 'BlogController@posts');
Route::get('blog/tags.json/{scope?}', 'BlogController@tags');

Route::get('blog/tag/{slug}', 'TagController@show');
Route::delete('blog/tag/{slug}', 'TagController@destroy');

Route::delete('blog/photo/{id}', 'PhotoController@destroy');

/* Route::get('projects/create', 'ProjectController@create');
Route::post('projects', 'ProjectController@store'); */

Route::resource('page', 'PageController');

//Dashboard
Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store');

Route::get('logout', 'SessionController@destroy');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('dashboard/posts', 'DashboardController@posts');
Route::get('dashboard/pages', 'DashboardController@pages');
Route::get('dashboard/photos', 'DashboardController@photos');
Route::get('dashboard/tags', 'DashboardController@tags');
