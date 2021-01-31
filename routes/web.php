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

Route::get('/admin', 'HomeController@index')->name('home');
Route::group(['namespace'=>'BackEnd' , 'middleware'=>'auth' ,'prefix' =>'/admin'],function (){
    Route::resource('/country','CountryController');
    Route::resource('/city','CityController');
    Route::resource('/hotel','HotelController');
});

Route::group(['prefix'=>'/home' ,'namespace'=>'Hotel'],function (){
    Route::get('/login','HotelController@loginForm')->name('hotel.login.form')->middleware('guest:hotel');
    Route::post('/login','HotelController@login')->name('hotel.login')->middleware('guest:hotel');
    //----------------------hotel admin routes----------------//
    Route::group(['middleware' =>'auth:hotel'],function (){
        Route::get('/hotel','HotelController@index')->name('hotel');
        Route::get('/profile','HotelController@profile')->name('hotel.profile');
        Route::post('/profile','HotelController@update')->name('hotel.profile.update');
        Route::post('/logout','HotelController@logout')->name('hotel.logout');
    });
});
