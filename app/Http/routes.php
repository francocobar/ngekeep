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

Route::get('/','FrontEndController@index');
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'BackEndController@index'])->middleware(['auth']);

Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('registeruser', ['as' => 'registeruser', 'uses'=> 'UserController@register']);
Route::post('login', ['as' => 'login', 'uses'=> 'UserController@login']);
