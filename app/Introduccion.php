<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Introduccion extends Model
{
    protected $fillable = [
        "seccion", "contenido", "archivo"
    ];
}
