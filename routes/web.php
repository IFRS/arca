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

Route::get('/', 'IndexController')->name('index');

Route::get('cursos', 'CursoController@index')->name('cursos.index');
Route::get('cursos/novo', 'CursoController@novo')->name('cursos.create');
Route::post('cursos', 'CursoController@save')->name('cursos.store');
Route::get('cursos/{curso}/editar', 'CursoController@editar')->name('cursos.edit');
Route::put('cursos/{curso}', 'CursoController@save')->name('cursos.update');
Route::get('cursos/lixeira', 'CursoController@trash')->name('cursos.trash');
Route::delete('cursos/{curso}/delete', 'CursoController@delete')->name('cursos.delete');
Route::put('cursos/{curso}/restore', 'CursoController@restore')->name('cursos.restore');
Route::delete('cursos/{curso}/destroy', 'CursoController@destroy')->name('cursos.destroy');

Route::get('ofertas', 'OfertasController@index')->name('ofertas.index');
Route::get('ofertas/novo', 'OfertasController@novo')->name('ofertas.create');
Route::post('ofertas', 'OfertasController@save')->name('ofertas.store');
Route::get('ofertas/{curso}/editar', 'OfertasController@editar')->name('ofertas.edit');
Route::put('ofertas/{curso}', 'OfertasController@save')->name('ofertas.update');
Route::get('ofertas/lixeira', 'OfertasController@trash')->name('ofertas.trash');
Route::delete('ofertas/{curso}/delete', 'OfertasController@delete')->name('ofertas.delete');
Route::put('ofertas/{curso}/restore', 'OfertasController@restore')->name('ofertas.restore');
Route::delete('ofertas/{curso}/destroy', 'OfertasController@destroy')->name('ofertas.destroy');
