<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurso;

class CursoController extends Controller
{
    /**
     * Mostra a lista de Cursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::with('ofertas.turnos', 'ofertas.campus', 'ofertas.modalidade', 'ofertas.nivel')->get();
        return view('cursos.index')->with('cursos', $cursos);
    }

    /**
     * Mostra o fomulário para criar um novo Curso.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
        $curso = new Curso();
        return view('cursos.create')->with('curso', $curso);
    }

    /**
     * Mostra o fomulário para editar um Curso já existente.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function editar(Curso $curso)
    {
        $curso = Curso::find($curso->id);
        return view('cursos.edit')->with('curso', $curso);
    }

    /**
     * Salva um Curso novo ou já existente.
     *
     * @param  \App\Http\Requests\StoreCurso  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function save(StoreCurso $request, Curso $curso)
    {
        if (!$curso->exists) {
            $curso = new Curso();
        }
        $curso->nome = $request->nome;
        $curso->apresentacao = $request->apresentacao;
        if ($curso->save()) {
            $request->session()->flash('status', 'success');
            if ($request->isMethod('PUT')) {
                $request->session()->flash('message', 'Curso atualizado com sucesso!');
            } else {
                $request->session()->flash('message', 'Curso cadastrado com sucesso!');
            }
        } else {
            $request->session()->flash('status', 'danger');
            if ($request->isMethod('PUT')) {
                $request->session()->flash('message', 'Ocorreu um erro ao atualizar o curso.');
            } else {
                $request->session()->flash('message', 'Ocorreu um erro ao cadastrar o curso.');
            }

        }
        return redirect()->route('cursos.index');
    }

    /**
     * Remove PERMANENTEMENTE o Curso.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Curso $curso)
    {
        if ($curso->delete()) {
            $request->session()->flash('status', 'Curso removido com sucesso!');
        } else {
            $request->session()->flash('status', 'Ocorreu um erro ao remover o curso.');
        }
        return redirect()->route('cursos.index');
    }
}
