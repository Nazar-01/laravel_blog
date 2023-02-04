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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {

    Route::get('/', 'DashboardController@index')->name('admin');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');
    Route::resource('/posts', 'PostsController');
    Route::get('/comments', 'CommentsController@index')->name('admin.comments');
    Route::get('/comments/{id}', 'CommentsController@toggle')->name('status-toggle');
    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
    Route::resource('/subscribers', 'SubscribersController');
});

Route::group(['prefix' => '', 'namespace' => 'Front'], function() {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
    Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
    Route::get('/category/{slug}', 'HomeController@category')->name('category.show');
    Route::post('/subscribe', 'SubscribersController@subscribe')->name('subscribe');
});

Route::group(['prefix' => '', 'namespace' => 'Front', 'middleware' => 'auth'], function() {
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile', 'ProfileController@store')->name('profile.store');
    Route::post('/comments', 'CommentsController@store')->name('comments');
});

Route::group(['prefix' => '', 'namespace' => 'Front', 'middleware' => 'guest'], function() {
    Route::get('/register', 'AuthController@registerForm')->name('register');
    Route::post('/register', 'AuthController@register');
    Route::get('/loginform', 'AuthController@loginForm')->name('loginForm');
    Route::post('/login', 'AuthController@login')->name('login');
});
