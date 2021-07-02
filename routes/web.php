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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/student-list', 'StudentController@index')->name('student-list');
Route::match(['get','post'], '/student-add', 'StudentController@add')->name('student-add');
Route::match(['get','post'], '/student-edit/{id}', 'StudentController@edit')->name('student-edit');
Route::get('/student-delete/{sid}', 'StudentController@studentDelete');


Route::get('/education-list', 'EducationController@index')->name('education-list');
Route::match(['get','post'], '/education-add', 'EducationController@add')->name('education-add');
Route::match(['get','post'], '/education-edit/{id}', 'EducationController@edit')->name('education-edit');
Route::get('/education-delete/{sid}', 'EducationController@educationDelete');
