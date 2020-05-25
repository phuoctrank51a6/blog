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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('login', 'AuthenticationController@login')->name('login');
    Route::post('post-login', 'AuthenticationController@postLogin')->name('postLogin');
    Route::get('fogot-password', 'AuthenticationController@forgotPassword')->name('forgotPassword');
    Route::post('post-forgot', 'AuthenticationController@postForgot')->name('postForgot');
    Route::get('new_password/{token}', 'AuthenticationController@newPassword')->name('newPassword');
    Route::post('update-password', 'AuthenticationController@updatePassword')->name('updatePassword');
});

Route::group(['middleware' => ['auth', 'check.role']], function () {
    Route::resource('user', 'UserController');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');

    Route::get('category-children/{id}', 'CategoryController@categoryChildren')->name('category-children');
    Route::get('category-list-posts/{id}', 'PostController@listPostCategory')->name('categoryListPosts');

    Route::get('search',array('as'=>'search','uses'=>'SearchController@search'));
    Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));

    Route::post('detail', 'SearchController@detailPost')->name('detailPost');

    Route::get('send-mail', 'EmailController@sendEmail');


    Route::get('logout', 'AuthenticationController@logout')->name('logout');
});

Route::get('menu', 'CategoryController@menu');

