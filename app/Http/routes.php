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




Route::group(['middleware' => 'auth'],function(){
Route::get('/', 'HomeController@index');
Route::get('/reports', 'ListController@index');
Route::post('/saveReservation', 'ReservationController@saveReservation');
Route::get('/send', 'MailController@sendEmailReminder');
Route::get('/inaccessible', 'MailController@sendEmailReminder');


});
Route::auth();

Route::get('/getoption/{stand}','AjaxController@getoption');
Route::get('/blastmail','AjaxController@blastmail');
Route::get('/getview/{elec}', 'AjaxController@getview');