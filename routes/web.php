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
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/projects', 'ProjectsController@index');

//saving data
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects', 'ProjectsController@store');
//end saving data

//Edit data
Route::get('/projects/{id}/edit', 'ProjectsController@edit');
Route::put('/projects/{id}', 'ProjectsController@update');
//end edit data

//delete data
Route::delete('/projects/{id}', 'ProjectsController@delete')->name('projects.delete');
//end delete data
Route::get('/projects/{id}', 'ProjectsController@show');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
