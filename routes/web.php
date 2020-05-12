<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () { return view('welcome'); });

Route::resource('user', 'UserController');
Route::resource('post', 'PostController');

Route::resource('category', 'CategoryController');
Route::get('category-children/{id}', 'CategoryController@categoryChildren')->name('category-children');
Route::get('category-list-posts/{id}', 'PostController@listPostCategory')->name('categoryListPosts');

Route::get('menu', 'CategoryController@menu');
