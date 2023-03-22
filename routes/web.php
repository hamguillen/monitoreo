<?php

use Illuminate\Support\Facades\Route;
Auth::routes();



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('/home');
Route::resource('/areas','AreaController');
Route::resource('/personal','PersonalController');
Route::resource('/turnos','TurnoController');
Route::resource('/horarios','HorarioController');
Route::resource('/guardias','GuardiaController');