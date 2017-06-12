<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'niveis';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtém as Ofetas do Nível.
     */
    public function ofertas()
    {
        return $this->hasMany('App\Oferta', 'nivel_id');
    }
}
