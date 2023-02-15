<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = ['nombre'];

    public function usuario()
    {
        return $this->hasMany(DatosUsuario::class, 'carrera_id');
    }
}
