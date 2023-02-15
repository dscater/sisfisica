<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class EjercicioImagen extends Model
{
    protected $fillable = [
        'ejercicio_id', 'imagen', 'nro_paso',
    ];

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class, 'ejercicio_id');
    }
}
