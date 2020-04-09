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

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verifyUser');


//Home Page Router
//Creata a Group Route
Route::group(['middleware'=>['sass']], function(){
    Route::get('/home','HomeController@index')->name('home.index');
    Route::get('/home/viewUserList','HomeController@viewUserList')->name('home.viewUserList');
    Route::get('/home/createUser','HomeController@createUser')->name('home.createUser');
    Route::get('/home/editUser/{id}','HomeController@editUser')->name('home.editUser');
    Route::post('/home/editUser/{id}','HomeController@update')->name('home.update');
    Route::post('/home/createUser','HomeController@insertUser')->name('home.insertUser');
    Route::get('/home/delete/{id}','HomeController@delete')->name('home.delete');
});



//Logout Route
Route::get('/logout','LogoutController@index')->name('logout.index');

