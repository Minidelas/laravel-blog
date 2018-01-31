<?php

use Illuminate\Http\Request;

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

Route::get('/', 'WelcomeController@welcome')
          ->name('welcome');

Route::get('/home', 'HomeController@index')
          ->middleware('auth')
          ->name('home');

// Articles
Route::get('/create/article',         'ArticleController@create')
          ->middleware('auth');
Route::post('/create/article',        'ArticleController@store')
          ->middleware('auth');
Route::get('/articles',               'ArticleController@index')
          ->middleware('auth');
Route::get('/edit/article/{id}',      'ArticleController@edit')
          ->middleware('auth');
Route::get('/article/{article}',           'ArticleController@show');
Route::post('/edit/article/{id}',     'ArticleController@update')
          ->middleware('auth');
Route::delete('/delete/article/{id}', 'ArticleController@destroy')
          ->middleware('auth');

// Comments
Route::post('/create/comment',        'CommentController@store');
