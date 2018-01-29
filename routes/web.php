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

Route::get('/create/article',         'ArticleController@create');
Route::post('/create/article',        'ArticleController@store');
Route::get('/articles',               'ArticleController@index');
Route::get('/edit/article/{id}',      'ArticleController@edit');
Route::post('/edit/article/{id}',     'ArticleController@update');
Route::delete('/delete/article/{id}', 'ArticleController@destroy');

Route::match(['get', 'post'], '/submit', 'LinkController@submit')
          ->middleware('auth')
          ->name('submit');
