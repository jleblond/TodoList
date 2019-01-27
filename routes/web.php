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



// use App\Task;
// use Illuminate\Http\Request;




Route::get('/', 'TasksController@create');
Route::post('/', 'TasksController@store');
Route::delete('/{id}', ['uses' =>'TasksController@destroy', 'as'=>'routeDestroyTask']);