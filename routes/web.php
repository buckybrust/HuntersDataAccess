<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessesController;
use App\Http\Controllers\EmployeesController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Business Pages
Route::get('businesses', 'App\Http\Controllers\BusinessesController@index');
Route::post('businesses', 'App\Http\Controllers\BusinessesController@store');
Route::get('businesses/create', 'App\Http\Controllers\BusinessesController@create');
Route::get('businesses/{business}', 'App\Http\Controllers\BusinessesController@show')->name('businesses.show');
Route::get('businesses/{business}/edit', 'App\Http\Controllers\BusinessesController@edit');
Route::put('businesses/{business}', 'App\Http\Controllers\BusinessesController@update');
Route::put('businesses','App\Http\Controllers\BusinessesController@destroy');

//Employees pages
Route::get('employees', 'App\Http\Controllers\EmployeesController@index');
Route::post('employees', 'App\Http\Controllers\EmployeesController@store');
Route::get('employees/create', 'App\Http\Controllers\EmployeesController@create');
Route::get('employees/{employee}', 'App\Http\Controllers\EmployeesController@show')->name('employees.show');
Route::get('employees/{employee}/edit', 'App\Http\Controllers\EmployeesController@edit');
Route::put('employees/{employee}', 'App\Http\Controllers\EmployeesController@update');
Route::put('employees','App\Http\Controllers\EmployeesController@destroy');
