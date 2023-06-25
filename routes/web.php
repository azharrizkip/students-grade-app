<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\StudentController@index')->name('students.index');
Route::get('/students/{student}', 'App\Http\Controllers\StudentController@show')->name('students.show');

Route::post('/grades/{student}', 'App\Http\Controllers\GradeController@store')->name('grades.store');
