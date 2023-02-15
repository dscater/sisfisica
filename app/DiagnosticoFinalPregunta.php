<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class DiagnosticoFinalPregunta extends Model
{
    protected $fillable = ['pregunta', 'imagen', 'resp'];

    public function opciones()
    {
        return $this->hasMany(PreguntaFinalOpcion::class, 'dfp_id');
    }
}
