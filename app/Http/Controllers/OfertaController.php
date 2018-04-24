<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\Campus;
use App\Curso;
use App\Modalidade;
use App\Nivel;
Use App\Turno;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOferta;

class OfertaController extends Controller
{
    /**
     * Mostra a lista de Ofertas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertas = Oferta::all();
        $ofertas_trashed = Oferta::onlyTrashed()->get();
        return view('ofertas.index')->with('ofertas', $ofertas)->with('ofertas_trashed', $ofertas_trashed);
    }

    /**
     * Mostra o fomulário para criar uma nova Oferta.
     *
     * @return \Illuminate\Http\Response
     */
    public function nova()
    {
        $oferta = new Oferta();
        $campi = Campus::all();
        $cursos = Curso::all();
        $modalidades = Modalidade::orderBy('id', 'asc')->get();
        $niveis_pai = Nivel::whereNull('pai_id')->get();
        $turnos = Turno::orderBy('id', 'asc')->get();
        return view('ofertas.create')
            ->with('oferta', $oferta)
            ->with('campi', $campi)
            ->with('cursos', $cursos)
            ->with('modalidades', $modalidades)
            ->with('niveis_pai', $niveis_pai)
            ->with('turnos', $turnos);
    }

    /**
     * Mostra o fomulário para editar uma Oferta já existente.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function editar(Oferta $oferta)
    {
        $oferta = Oferta::find($oferta->id);
        return view('ofertas.edit')->with('oferta', $oferta);
    }

    /**
     * Salva uma Oferta nova ou atualiza uma já existente.
     *
     * @param  \App\Http\Requests\StoreOferta  $request
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function save(StoreOferta $request, Oferta $oferta)
    {
        if (!$oferta->exists) {
            $oferta = new Oferta();
        }
        $oferta->descricao = $request->descricao;
        $oferta->coodenador_nome = $request->coordenador_nome;
        $oferta->coodenador_email = $request->coordenador_email;
        $oferta->coordenador_titulacao = $request->coordenador_titulacao;
        $oferta->carga_horaria = $request->carga_horaria;
        $oferta->duracao = $request->duracao;
        $oferta->autorizacao = $request->autorizacao;
        $oferta->nota_mec = $request->nota_mec;
        $oferta->estrutura_fisica = $request->estrutura_fisica;
        $oferta->curso_id = $request->curso_id;
        $oferta->campus_id = $request->campus_id;
        $oferta->modalidade_id = $request->modalidade_id;
        $oferta->nivel_id = $request->nivel_id;
        if ($oferta->save()) {
            $request->session()->flash('status', 'success');
            if ($request->isMethod('PUT')) {
                $request->session()->flash('message', 'Oferta atualizada com sucesso!');
            } else {
                $request->session()->flash('message', 'Oferta cadastrada com sucesso!');
            }
        } else {
            $request->session()->flash('status', 'danger');
            if ($request->isMethod('PUT')) {
                $request->session()->flash('message', 'Ocorreu um erro ao atualizar a oferta.');
            } else {
                $request->session()->flash('message', 'Ocorreu um erro ao cadastrar a oferta.');
            }

        }
        return redirect()->route('ofertas.index');
    }

    /**
     * Remove a Oferta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Oferta $oferta)
    {
        if ($oferta->delete()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Oferta enviada para a lixeira com sucesso!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao enviar a oferta para a lixeira.');
        }
        return redirect()->route('ofertas.index');
    }

    /**
     * Restaura a Oferta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $oferta = Oferta::onlyTrashed()->find($id);
        if ($oferta->restore()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Oferta restaurada com sucesso!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao restaurar a oferta.');
        }
        return redirect()->route('ofertas.index');
    }

    /**
     * Remove PERMANENTEMENTE a Oferta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $oferta = Oferta::onlyTrashed()->find($id);
        if ($oferta->forceDelete()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Oferta removida com sucesso!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao remover a oferta.');
        }
        return redirect()->route('ofertas.index');
    }
}
