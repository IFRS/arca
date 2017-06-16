<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cursos';

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($model) {
            $model->ofertas()->delete();
        });
    }

    /**
     * Obtém as Ofetas do Curso.
     */
    public function ofertas()
    {
        return $this->hasMany('App\Oferta', 'curso_id');
    }
}
