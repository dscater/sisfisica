<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class PreguntaFinalOpcion extends Model
{
    protected $fillable = ['dfp_id', 'opcion', 'correcto'];

    public function pregunta()
    {
        return $this->belongsTo(DiagnosticoFinalPregunta::class, 'dfp_id');
    }
}
