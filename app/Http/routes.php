<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


//home page
Route::get('/', 'HomeController@index');


//admin pages
Route::group(['prefix' => 'admin', 'middleware' =>
'auth'], function() 
{   //middware needed here
Route::get('/', 'Admin\AdminHomeController@index');
Route::resource('pages', 'PagesController');
Route::resource('articles', 'Admin\ArticlesController');
Route::resource('comments', 'Admin\CommentsController');
});
//web pages
Route::get('pages/{id}', 'PagesController@show');
//blog articles
Route::get('articles/{id}', 'ArticlesController@show');
//comments submit
Route::post('comment/store', 'CommentsController@store');

Route::auth();

Route::get('/home', 'HomeController@index');
