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


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//home page
Route::get('/', 'HomeController@index');


//admin pages
Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' =>
'auth'], function() 
{   //middware needed here
Route::get('/', 'AdminHomeController@index');
Route::resource('pages', 'PagesController');
Route::resource('articles', 'ArticlesController');
Route::resource('comments', 'CommentsController');
});
//web pages
Route::get('pages/{id}', 'PagesController@show');
//blog articles
Route::get('articles/{id}', 'ArticlesController@show');
//comments submit
Route::post('comment/store', 'CommentsController@store');

?>