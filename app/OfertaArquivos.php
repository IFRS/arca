<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaArquivos extends Model
{
    protected $fillable = ['nome', 'arquivo', 'oferta_id'];

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
