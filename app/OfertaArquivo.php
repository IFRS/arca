<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaArquivo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'oferta_arquivos';

    /**
     * Obtém a Oferta do Arquivo.
     */
    public function oferta()
    {
        return $this->belongsTo('App\Oferta', 'oferta_id');
    }
}
