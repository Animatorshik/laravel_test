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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')
	->name('home');

Route::middleware(['role:manager'])->group(function () {
	Route::get('/articles', 'ArticleController@index')
		->name('articles.index');

	Route::post('/articles', 'ArticleController@store')
		->name('articles.store');

	Route::get('/articles/create', 'ArticleController@create')
		->name('articles.create');

	Route::get('/articles/{article}', 'ArticleController@show')
		->name('articles.show');

	Route::get('/articles/{article}/edit', 'ArticleController@edit')
		->name('articles.edit');

	Route::put('/articles/{article}', 'ArticleController@update')
		->name('articles.update');
});

Route::middleware(['role:admin'])->group(function () {
	Route::get('/articles-all', 'ArticleController@indexAll')
		->name('articles.indexAll');

	Route::get('/users', 'HomeController@users')
		->name('users');

	Route::delete('/articles/{article}', 'ArticleController@destroy')
		->name('articles.delete');
});
