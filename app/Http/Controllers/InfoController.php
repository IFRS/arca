<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Modalidade;
use App\Nivel;
use App\Turno;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Mostra a lista de Campi.
     *
     * @return \Illuminate\Http\Response
     */
    public function campi()
    {
        $campi = Campus::all();
        return view('info.campi')->with('campi', $campi);
    }

    /**
     * Mostra a lista de Modalidades.
     *
     * @return \Illuminate\Http\Response
     */
    public function modalidades()
    {
        $modalidades = Modalidade::all();
        return view('info.modalidades')->with('modalidades', $modalidades);
    }

    /**
     * Mostra a lista de Níveis.
     *
     * @return \Illuminate\Http\Response
     */
    public function niveis()
    {
        $niveis = Nivel::whereNull('pai_id')->get();
        return view('info.niveis')->with('niveis', $niveis);
    }

    /**
     * Mostra a lista de Turnos.
     *
     * @return \Illuminate\Http\Response
     */
    public function turnos()
    {
        $turnos = Turno::all();
        return view('info.turnos')->with('turnos', $turnos);
    }
}
