<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Curso;
use App\Http\Resources\Curso as CursoResource;
use App\Nivel;
use App\Http\Resources\Nivel as NivelResource;
use App\Turno;
use App\Http\Resources\Turno as TurnoResource;
use App\OfertaArquivo;
use App\Http\Resources\Arquivo as ArquivoResource;

class Oferta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            //'created_at' => (string) $this->created_at,
            //'updated_at' => (string) $this->updated_at,
            'nome' => $this->nome,
            'descricao' => (string) $this->descricao,
            'coordenador_nome' => (string) $this->coordenador_nome,
            'coordenador_email' => (string) $this->coordenador_email,
            'coordenador_titulacao' => (string) $this->coordenador_titulacao,
            'carga_horaria' => (string) $this->carga_horaria,
            'duracao' => (string) $this->duracao,
            'autorizacao' => (string) $this->autorizacao,
            'nota_mec' => (string) $this->nota_mec,
            'estrutura_fisica' => (string) $this->estrutura_fisica,
            'curso' => new CursoResource($this->whenLoaded('curso')),
            'campus' => $this->whenLoaded('campus'),
            'modalidade' => $this->modalidade->nome,
            'nivel' => new NivelResource($this->nivel),
            'turnos' => TurnoResource::collection($this->turnos),
            'arquivos' => ArquivoResource::collection($this->whenLoaded('arquivos'))
        ];
    }
}
