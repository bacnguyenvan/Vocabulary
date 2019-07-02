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

// login
Route::match(['get','post'],'login','Mycontroller@login')->name('login');
Route::match(['get','post'],'home','Mycontroller@home')->name('home');
//sign up
Route::match(['get','post'],'signUp','Mycontroller@signUp')->name('signUp');
//lost password
Route::match(['get','post'],'lostPassword','Mycontroller@lostPassword')->name('lostPassword');

//add
Route::post('addVoca','Mycontroller@addVoca')->name('addVoca');
//delete
Route::get('deleteVoca/{id}','Mycontroller@deleteVoca')->name('deleteVoca');
// edit
Route::match(['get','post'],'editVoca/{id}','Mycontroller@editVoca')->name('editVoca');

//search
Route::post('search','Mycontroller@search')->name('search');