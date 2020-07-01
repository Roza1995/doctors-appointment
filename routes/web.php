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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('auth')->group(function(){
    Route::resource('/doctors', 'DoctorController');
    Route::resource('/patient', 'PatientController');
});



Route::group(['namespace'=>'Admin'],function(){
    Route::get('event','EventController@index')->name('event');
    Route::get('event-list','EventController@event_list');
    Route::post('event','EventController@save_event');
    Route::get('all-event','EventController@all_event')->name('all-event');
    Route::get('single-event/{id}','EventController@single_event');
    Route::post('update-event','EventController@update_event');
    Route::delete('delete-event/{id}','EventController@delete_event');
});







