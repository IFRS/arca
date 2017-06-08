<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'turnos';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtém as Ofetas do Turno.
     */
    public function turnos()
    {
        return $this->belongsToMany('App\Oferta', 'ofertas_turnos', 'turno_id', 'oferta_id');
    }
}
