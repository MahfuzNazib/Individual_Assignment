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
    Route::get('/home/editUser/{userId}','HomeController@editUser')->name('home.editUser');
    Route::post('/home/editUser/{userId}','HomeController@update')->name('home.update');
    Route::post('/home/createUser','HomeController@insertUser')->name('home.insertUser');
    Route::get('/home/delete/{userId}','HomeController@delete')->name('home.delete');
    Route::get('/home/buscounter', 'HomeController@buscounter')->name('home.buscounter');
    Route::get('/home/action', 'HomeController@action')->name('home.search');

    //Add New Bus Counter
    Route::get('/home/addbuscounter', 'HomeController@addbuscounter')->name('home.addbuscounter');
    Route::post('/home/addbuscounter', 'HomeController@newbuscounter')->name('home.newbuscounter');

    //Edit BusCounter
    Route::get('/home/editBusCounter/{id}', 'HomeController@editBusCounter')->name('home.editBusCounter');
    Route::post('/home/editBusCounter/{id}', 'HomeController@updateBusCounter')->name('home.updatebuscounter');

    //Delete Bus Counter
    Route::get('/home/deleteBusCounter/{id}', 'HomeController@deleteBusCounter')->name('home.deleteBusCounter');

});



//Logout Route
Route::get('/logout','LogoutController@index')->name('logout.index');

