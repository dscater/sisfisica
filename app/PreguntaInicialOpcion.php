<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class PreguntaInicialOpcion extends Model
{
    protected $fillable = ['dip_id', 'opcion', 'correcto'];

    public function pregunta()
    {
        return $this->belongsTo(DiagnosticoInicialPregunta::class, 'dip_id');
    }
}
