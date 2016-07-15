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

Route::get('/',['as' => 'FrontEndHome', 'uses' => 'FrontEndController@index']);
Route::get('/p/{type}',['as' => 'FrontEndHomeWithType', 'uses' => 'FrontEndController@index']);
Route::post('registeruser', ['as' => 'RegisterUser', 'uses'=> 'UserController@register']);
Route::post('signinuser', ['as' => 'SignInUser', 'uses'=> 'UserController@login']);
Route::get('activationreminder', ['as' => 'ActivationReminder', 'uses' => 'UserController@activationreminder'] );
Route::get('activate/{encryptedValue}','UserController@activate');


Route::get('dashboard', ['as' => 'DashboardHome', 'uses' => 'BackEndController@index'])->middleware(['auth']);
Route::get('account/myusername', ['as' => 'MyUsername', 'uses' => 'BackEndController@myUsername']);
Route::post('setusername', ['as' => 'SetUsername', 'uses'=> 'UserController@setUser']);

Route::auth();




Route::get('testing', 'ServicesController@testing');
Route::get('sendemail', function () {

    // $data = array(
    //     'name' => "Learning Laravel",
    // );

    // Mail::send('emails.welcome', $data, function ($message) {

    //     $message->from('ngekeep@gmail.com', 'Learning Laravel');

    //     $message->to('franco@talenta.co')->subject('Learning Laravel test email');

    // });
	return env('APP_URL');
    // $activationlink = "a";
	   //  Mail::send('emails.activation', ['activationlink'=>$activationlink], function ($message) {

	   //      $message->from('ngekeep@gmail.com', 'NgeKEEP - No Reply');

	   //      $message->to('franco@talenta.co')->subject('NgeKEEP Account Activation');

	   //  });

    // return "Your email has been sent successfully";

});