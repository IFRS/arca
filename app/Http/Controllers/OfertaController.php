<?php

namespace App\Http\Controllers;

use App\Oferta;
use App\Campus;
use App\Curso;
use App\Modalidade;
use App\Nivel;
use App\Turno;
use App\OfertaArquivo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOferta;
use App\Http\Requests\StoreOfertaArquivo;
use Illuminate\Support\Facades\Storage;

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
        $campi = Campus::all();
        $cursos = Curso::all();
        $modalidades = Modalidade::orderBy('id', 'asc')->get();
        $niveis_pai = Nivel::whereNull('pai_id')->get();
        $turnos = Turno::orderBy('id', 'asc')->get();
        return view('ofertas.edit')
            ->with('oferta', $oferta)
            ->with('campi', $campi)
            ->with('cursos', $cursos)
            ->with('modalidades', $modalidades)
            ->with('niveis_pai', $niveis_pai)
            ->with('turnos', $turnos);
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
        $oferta->coordenador_nome = $request->coordenador_nome;
        $oferta->coordenador_email = $request->coordenador_email;
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
            $turnos_sync = $oferta->turnos()->sync($request->turnos_ids);

            $request->session()->flash('status', 'success');
            if ($request->isMethod('PUT')) {
                $request->session()->flash('message', 'Oferta atualizada com sucesso!');
            } else {
                $request->session()->flash('message', 'Oferta cadastrada com sucesso!');
            }

            if (!$turnos_sync) {
                $request->session()->flash('status', 'warning');
                if ($request->isMethod('PUT')) {
                    $request->session()->flash('message', 'Oferta atualizada, porém ocorreu um erro ao salvar os turnos. Por favor, edite novamente.');
                } else {
                    $request->session()->flash('message', 'Oferta cadastrada, porém ocorreu um erro ao salvar os turnos. Por favor, edite a oferta.');
                }
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
     * Mostra os arquivos de uma Oferta já existente e o formulário para adição de um novo arquivo.
     *
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function arquivos(Oferta $oferta)
    {
        $oferta = Oferta::find($oferta->id);
        return view('ofertas.arquivos')
            ->with('oferta', $oferta);
    }

    /**
     * Salva um Arquivo novo.
     *
     * @param  \App\Http\Requests\StoreOfertaArquivo  $request
     * @param  \App\Oferta  $oferta
     * @return \Illuminate\Http\Response
     */
    public function upload(StoreOfertaArquivo $request, Oferta $oferta)
    {
        if ($request->hasFile('arquivo')) {
            $filename = $request->arquivo->store('arquivos');

            $arquivo = new OfertaArquivo();
            $arquivo->nome = $request->arquivo_titulo;
            $arquivo->arquivo = $filename;
            $arquivo->oferta_id = $oferta->id;

            if ($arquivo->save()) {
                $request->session()->flash('status', 'success');
                $request->session()->flash('message', 'Arquivo enviado com sucesso!');
            } else {
                $request->session()->flash('status', 'danger');
                $request->session()->flash('message', 'Ocorreu um erro ao enviar o arquivo.');
            }
        }

        return redirect()->route('ofertas.arquivos', $oferta->id);
    }

    /**
     * Remove PERMANENTEMENTE a Oferta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfertaArquivo  $arquivo
     * @return \Illuminate\Http\Response
     */
    public function arquivo_destroy(Request $request, Oferta $oferta, OfertaArquivo $arquivo)
    {
        $filename = $arquivo->arquivo;

        if ($arquivo->delete()) {
            Storage::delete($filename);
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Arquivo excluido com sucesso!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao excluir o arquivo.');
        }

        return redirect()->route('ofertas.arquivos', $oferta->id);
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
