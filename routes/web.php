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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'HomeController@index')->name('home');


Route::get('/tag/{tag}', 'ArticleController@index')->name('tag.articles');
//Route::get('/articles', 'ArticleController@index')->name('articles.index');
Route::get('articles/list', 'ArticleController@list')->name('articles.list');
//Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');
Route::resource('articles', 'ArticleController');

Route::resource('users', 'UserController');
Route::resource('tags', 'TagController');

//Route::post('/admin/articles', 'ArticleController@store');
//Route::get('/admin/articles', 'ArticleController@list')->name('admin.articles.list');
//
//Route::get('/admin/articles/create', 'ArticleController@create')->name('admin.articles.create');
//Route::get('/admin/articles/{id}/edit', 'ArticleController@edit')->name('admin.articles.edit');
//
//Route::put('/articles/{id}', 'ArticleController@update');
//Route::delete('/articles/{id}', 'ArticleController@destroy');
//
//Route::get('/articles', 'ArticleController@index')->name('articles.index');
//Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');
//Route::get('/tag/{tag}', 'ArticleController@index')->name('tag.articles');
