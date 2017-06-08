<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'campi';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Obtém as Ofetas do Campus.
     */
    public function ofertas()
    {
        return $this->hasMany('App\Oferta', 'campus_id');
    }
}
