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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'IndexController')->name('index');

    Route::get('cursos', 'CursoController@index')->name('cursos.index');
    Route::get('cursos/novo', 'CursoController@novo')->name('cursos.create');
    Route::post('cursos', 'CursoController@save')->name('cursos.store');
    Route::get('cursos/{curso}/editar', 'CursoController@editar')->name('cursos.edit');
    Route::put('cursos/{curso}', 'CursoController@save')->name('cursos.update');
    Route::delete('cursos/{curso}/delete', 'CursoController@delete')->name('cursos.delete');
    Route::put('cursos/{curso}/restore', 'CursoController@restore')->name('cursos.restore');
    Route::delete('cursos/{curso}/destroy', 'CursoController@destroy')->name('cursos.destroy');

    Route::get('ofertas', 'OfertaController@index')->name('ofertas.index');
    Route::get('ofertas/nova', 'OfertaController@nova')->name('ofertas.create');
    Route::post('ofertas', 'OfertaController@save')->name('ofertas.store');
    Route::get('ofertas/{oferta}/editar', 'OfertaController@editar')->name('ofertas.edit');
    Route::put('ofertas/{oferta}', 'OfertaController@save')->name('ofertas.update');
    Route::delete('ofertas/{oferta}/delete', 'OfertaController@delete')->name('ofertas.delete');
    Route::put('ofertas/{oferta}/restore', 'OfertaController@restore')->name('ofertas.restore');
    Route::delete('ofertas/{oferta}/destroy', 'OfertaController@destroy')->name('ofertas.destroy');
});

Auth::routes();
