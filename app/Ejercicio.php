<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $fillable = ['nivel', 'imagen_ejercicio','imagen_ejercicio2'];

    public function pasos()
    {
        return $this->hasMany(EjercicioImagen::class, 'ejercicio_id');
    }
}
