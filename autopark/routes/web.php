<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Car
Route::get('/carsReference', 'CarController@CarsList')->name('carsReference');
Route::match(['get', 'post'], '/carCreate', 'CarController@CarCreate')->name('carCreate');
Route::get('/carEditing', 'CarController@carEditingPage')->name('carEditingPage');
Route::post('/carEditing', 'CarController@carEditing')->name('carEditing');

Route::get('/BindingCars', 'CarController@BindingCarsPage')->name('BindingCarsPage');
Route::post('/BindingCars', 'CarController@BindingCars')->name('BindingCars');
//Autopark//
//Справочник
Route::get('/autoparksReference', 'AutoparkController@autoparkList')->name('autoparksReference');

//Создание
Route::post('/autoparkCreate', 'AutoparkController@autoparkCreate')->name('autoparkCreate');
Route::get('/autoparkCreate', 'AutoparkController@autoparkCreatePage')->name('autoparkCreatePage');

//Изменения
Route::get('/autoparkEditing', 'AutoparkController@autoparkEditingPage')->name('autoparkEditingPage');
Route::delete('/autoparkEditing', 'AutoparkController@autoparkDelete')->name('autoparkDelete');
Route::post('/autoparkEditing', 'AutoparkController@autoparkEditing')->name('autoparkEditing');
