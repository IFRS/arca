<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modalidades';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtém as Ofetas da Modalidade.
     */
    public function ofertas()
    {
        return $this->hasMany('App\Oferta', 'modalidade_id');
    }
}
