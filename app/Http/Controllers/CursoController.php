<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::with('ofertas.turnos', 'ofertas.campus', 'ofertas.modalidade', 'ofertas.nivel')->get();
        return view('cursos.index')->with('cursos', $cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = new Curso();
        return view('cursos.create')->with('curso', $curso);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurso $request)
    {
        $curso = new Curso();
        $curso->nome = $request->nome;
        $curso->apresentacao = $request->apresentacao;
        if ($curso->save()) {
            $request->session()->flash('status', 'Curso cadastrado com sucesso!');
        } else {
            $request->session()->flash('status', 'Ocorreu um erro ao cadastrar o curso.');
        }

        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        $curso = Curso::find($curso->id);
        return view('cursos.edit')->with('curso', $curso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCurso $request, Curso $curso)
    {
        $curso = Curso::find($curso->id);
        $curso->nome = $request->nome;
        $curso->apresentacao = $request->apresentacao;
        if ($curso->save()) {
            $request->session()->flash('status', 'Curso atualizado com sucesso!');
        } else {
            $request->session()->flash('status', 'Ocorreu um erro ao atualizar o curso.');
        }

        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
