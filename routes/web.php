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

Route::get('/', function() {
    return redirect(env('APP_ROOT_REDIRECT', 'app.index'));
});

Route::group(['prefix' => 'app'], function () {
    Route::get('/', ['as' => 'app.index', 'uses' => 'IndexController']);

    Route::resource('cursos', 'CursoController');
});
