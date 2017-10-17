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

Route::get('/api/projects', 'ProjectsController@getAllProjects');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/projects/{id}', 'ProjectsController@GetSingleProject');

Route::get('/api/requests', 'RequestsController@getAllRequests');


Auth::routes();
