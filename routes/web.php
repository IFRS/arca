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
    Route::get('ofertas/{oferta}/arquivos', 'OfertaController@arquivos')->name('ofertas.arquivos');
    Route::post('ofertas/{oferta}/upload', 'OfertaController@upload')->name('ofertas.upload');
    Route::delete('ofertas/{oferta}/arquivos/{arquivo}', 'OfertaController@arquivo_destroy')->name('ofertas.arquivo_destroy');
    Route::delete('ofertas/{oferta}/delete', 'OfertaController@delete')->name('ofertas.delete');
    Route::put('ofertas/{oferta}/restore', 'OfertaController@restore')->name('ofertas.restore');
    Route::delete('ofertas/{oferta}/destroy', 'OfertaController@destroy')->name('ofertas.destroy');

    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/novo', 'UserController@novo')->name('users.create');
    Route::post('users', 'UserController@save')->name('users.store');
    Route::delete('users/{curso}/destroy', 'UserController@destroy')->name('users.destroy');

    Route::get('campi', 'InfoController@campi')->name('campi.index');
    Route::get('modalidades', 'InfoController@modalidades')->name('modalidades.index');
    Route::get('niveis', 'InfoController@niveis')->name('niveis.index');
    Route::get('turnos', 'InfoController@turnos')->name('turnos.index');

    Route::get('sobre', function() {
        return view('info.sobre');
    })->name('sobre.index');
});

Auth::routes();
