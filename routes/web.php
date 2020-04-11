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
    Route::post('/home/createUser','HomeController@insertUser')->name('home.insertUser');

    Route::get('/home/editUser/{userId}','HomeController@editUser')->name('home.editUser');
    Route::post('/home/editUser/{userId}','HomeController@update')->name('home.update');

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
    Route::get('/home/removeBusCounter/{id}', 'HomeController@removeBusCounter')->name('home.removeBusCounter');
    

});


//Manager Route

Route::get('/manager', 'ManagerController@index')->name('manager.index');

//Manager List
Route::get('/system/busManager', 'ManagerController@busManagerList')->name('manager.busManagerList');

Route::get('/manager/buscounter', 'ManagerController@buscounter')->name('manager.buscounter');

//Edit Bus Counter by Manager

Route::get('/manager/editBusCounter/{id}', 'ManagerController@editBusCounter')->name('manager.editBusCounter');
Route::post('/manager/editBusCounter/{id}', 'ManagerController@updateBusCounter')->name('manager.updatebuscounter');

// Bus Counter Search
Route::get('/manager/action', 'ManagerController@action')->name('manager.search');

//Delete Bus Counter
Route::get('/manager/deleteBusCounter/{id}', 'ManagerController@deleteBusCounter')->name('manager.deleteBusCounter');
Route::get('/manager/removeBusCounter/{id}', 'ManagerController@removeBusCounter')->name('manager.removeBusCounter');


//Add New Bus
Route::get('/manager/addBus', 'ManagerController@addBus')->name('manager.addBus');
Route::post('/manager/addBus', 'ManagerController@insertBus')->name('manager.insertBus');


//Bus List
Route::get('/manager/busList', 'ManagerController@busList')->name('manager.busList');
Route::post('/manager/busList', 'ManagerController@busListSearch')->name('manager.busListSearch');


//Logout Route
Route::get('/logout','LogoutController@index')->name('logout.index');