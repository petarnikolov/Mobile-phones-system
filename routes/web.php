<?php

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
Route::get('/rejected', 'HomeController@rejected')->name('rejected');
Route::resource("phones","PhonesController") ->middleware('auth');
Route::resource("manufacturers","ManufacturersController") ->middleware('is_admin');
Route::Post('/phones/GetBy/','SearchController@GetBy')->middleware('auth');
