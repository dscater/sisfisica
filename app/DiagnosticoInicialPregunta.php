<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class DiagnosticoInicialPregunta extends Model
{
    protected $fillable = ['pregunta', 'imagen', 'resp'];

    public function opciones()
    {
        return $this->hasMany(PreguntaInicialOpcion::class, 'dip_id');
    }
}
