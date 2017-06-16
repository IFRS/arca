<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cursos';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($model) {
            $model->ofertas()->delete();
        });

        self::restored(function($model) {
            $model->ofertas()->restore();
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
