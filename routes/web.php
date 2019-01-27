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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::auth();

Route::get('/', 'TasksController@index');
Route::post('/', 'TasksController@store');
Route::delete('/{id}', ['uses' =>'TasksController@destroy', 'as'=>'routeDestroyTask']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
