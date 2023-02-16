<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $fillable = [
        "user_id", "estado", "t_mins", "t_segs", "nivel_actual", "nro_ejercicio",
        "actual", "puntaje", "contador", "correctos_nivel", "jugados", "pasos",
        "pasos_arrastrados",
    ];
}
