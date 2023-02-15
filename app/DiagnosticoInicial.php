<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class DiagnosticoInicial extends Model
{
    protected $fillable = [
        'user_id', 'puntaje', 'total',
        'fecha_registro',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
