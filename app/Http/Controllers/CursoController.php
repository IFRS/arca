<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurso;
use Illuminate\Support\Facades\Gate;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($request->route()->getName() == 'cursos.delete' || $request->route()->getName() == 'cursos.restore' || $request->route()->getName() == 'cursos.destroy') {
                if (Gate::denies('manage-cursos')) {
                    $request->session()->flash('status', 'danger');
                    $request->session()->flash('message', 'Você não tem permissão para fazer isso.');
                    return redirect()->route('cursos.index');
                }
            }

            return $next($request);
        });
    }

    /**
     * Mostra a lista de Cursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::with('ofertas.turnos', 'ofertas.campus', 'ofertas.modalidade', 'ofertas.nivel')->get();
        $cursos_trashed = Curso::onlyTrashed()->with('ofertas.turnos', 'ofertas.campus', 'ofertas.modalidade', 'ofertas.nivel')->get();
        return view('cursos.index')->with('cursos', $cursos)->with('cursos_trashed', $cursos_trashed);
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
     * Salva um Curso novo ou atualiza um já existente.
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
        $curso->atuacao = $request->atuacao;
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
     * Remove o Curso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Curso $curso)
    {
        if ($curso->delete()) {
            foreach ($curso->ofertas as $oferta) {
                $oferta->delete();
            }
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Curso enviado para a lixeira com sucesso!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao enviar o curso para a lixeira.');
        }
        return redirect()->route('cursos.index');
    }

    /**
     * Restaura o Curso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $curso = Curso::onlyTrashed()->find($id);
        if ($curso->restore()) {
            foreach ($curso->ofertas as $oferta) {
                $oferta->restore();
            }
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Curso restaurado com sucesso!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao restaurar o curso.');
        }
        return redirect()->route('cursos.index');
    }

    /**
     * Remove PERMANENTEMENTE o Curso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $curso = Curso::onlyTrashed()->find($id);
        if ($curso->forceDelete()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Curso removido com sucesso!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao remover o curso.');
        }
        return redirect()->route('cursos.index');
    }
}
