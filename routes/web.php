<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PostController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/all-posts', 'PostController@index');
Route::get('/author-post/{id}', 'PostController@AuthorPost')->name('author-post');
Route::get('/category-post/{id}', 'PostController@CategoryPost')->name('category-post');
Route::get('/posts/search', 'PostController@Search')->name('search');
