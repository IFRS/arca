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

    /**
     * Obtém os Níveis filhos.
     */
    public function filhos()
    {
        $filhos = $this->hasMany('App\Nivel', 'pai_id');
        foreach ($filhos as $filho) {
            $filho->pai = $this;
        }
        return $filhos;
    }

    /**
     * Obtém o Nível pai.
     */
    public function pai()
    {
        $pai = $this->belongsTo('App\Nivel', 'pai_id');
        if (isset($pai->filhos)) {
            $pai->filhos->merge($pai);
        }
        return $pai;
    }
}
