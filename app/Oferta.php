<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ofertas';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Obtém o Curso da Ofeta.
     */
    public function curso()
    {
        return $this->belongsTo('App\Curso', 'curso_id');
    }

    /**
     * Obtém o Campus da Ofeta.
     */
    public function campus()
    {
        return $this->belongsTo('App\Campus', 'campus_id');
    }

    /**
     * Obtém os Turnos da Ofeta.
     */
    public function turnos()
    {
        return $this->belongsToMany('App\Turno', 'ofertas_turnos', 'oferta_id', 'turno_id');
    }

    /**
     * Obtém a Modalidade da Ofeta.
     */
    public function modalidade()
    {
        return $this->belongsTo('App\Modalidade', 'modalidade_id');
    }

    /**
     * Obtém o Nível da Ofeta.
     */
    public function nivel()
    {
        return $this->belongsTo('App\Nivel', 'nivel_id');
    }
}
