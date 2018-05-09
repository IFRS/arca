<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('client')->group(function () {
    Route::namespace('Api')->group(function () {
        Route::prefix('v1')->group(function () {
            Route::get('cursos', 'CursosController@index');
            Route::get('cursos/{id}', 'CursosController@show');
            Route::get('ofertas', 'OfertasController@index');
            Route::get('ofertas/{id}', 'OfertasController@show');
        });
    });
});
