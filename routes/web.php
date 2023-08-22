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

Route::get('/', 'DashboardController@chart')->middleware('auth');
Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');
Route::post('/logout', 'LoginController@logout');
Route::post('/import', 'AdminController@import')->middleware('auth');
Route::get('/download-template', 'AdminController@template')->middleware('auth');
Route::post('/insert-company-grade', 'AdminController@insertCompanyScore')->middleware('auth');
Route::post('/insert-ptk-open', 'AdminController@insertptkopen')->middleware('auth');
Route::post('/insert-employee-req', 'AdminController@insertEmployeeReq')->middleware('auth');
Route::post('/insert-turnover', 'AdminController@insertTurnover')->middleware('auth');
Route::post('/delete-pakpi', 'AdminController@destroyCompany')->middleware('auth');
Route::post('/delete-employee', 'AdminController@destroyEmployee')->middleware('auth');
Route::post('/delete-employee-req', 'AdminController@destroyEmployeeReq')->middleware('auth');
Route::post('/delete-turnover', 'AdminController@destroyturnover')->middleware('auth');
Route::post('/edit-employee', 'AdminController@editEmployee')->middleware('auth');
Route::post('/edit-company-grade', 'AdminController@editCompanyScore')->middleware('auth');
Route::post('/edit-employee-req', 'AdminController@editEmployeeReq')->middleware('auth');
Route::post('/edit-ptkopen', 'AdminController@editPtkOpen')->middleware('auth');
Route::post('/edit-turnover', 'AdminController@editTurnover')->middleware('auth');
