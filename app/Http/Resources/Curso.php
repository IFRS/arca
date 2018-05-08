<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Oferta;
use App\Http\Resources\Oferta as OfertaResource;

class Curso extends JsonResource
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
            'apresentacao' => $this->apresentacao,
            'atuacao' => $this->atuacao,
            'ofertas' => OfertaResource::collection($this->whenLoaded('ofertas'))
        ];
    }
}
