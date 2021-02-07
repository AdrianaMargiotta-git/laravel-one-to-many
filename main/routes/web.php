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

/********************TASK********************/
//mostra tutti i task
Route::get('/', 'TaskController@index') -> name('home');

//mostra un task
Route::get('/show/{id}', 'TaskController@show') -> name('show');

//crea un task
Route::get('/create', 'TaskController@create') -> name('create');
Route::post('/store', 'TaskController@store') -> name('store');

//modifica un task
Route::get('/edit/{id}', 'TaskController@edit') -> name('edit');
Route::post('/update/{id}', 'TaskController@update') -> name('update');

//eliminare un task
Route::get('/delete/{id}', 'TaskController@delete') -> name('delete');

/********************TIPOLOGY********************/
Route::get('/typologies', 'TaskController@typologies_index') -> name('typologies-index');
Route::get('/typologies/show/{id}', 'TaskController@typologies_show') -> name('typologies-show');

/********************EMPLOYEE********************/
Route::get('/employees', 'TaskController@employees_index') -> name('employees-index');
Route::get('/employee/show/{id}', 'TaskController@employees_show') -> name('employees-show');