<?php

namespace app;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'password', 'tipo', 'foto', 'estado', 'carrera_id', 'paralelo_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function datosUsuario()
    {
        return $this->hasOne('app\DatosUsuario', 'user_id', 'id');
    }

    public function diagnostico_inicial()
    {
        return $this->hasOne(DiagnosticoInicial::class, 'user_id');
    }

    public function diagnostico_final()
    {
        return $this->hasOne(DiagnosticoFinal::class, 'user_id');
    }

    public function puntaje_extra()
    {
        return $this->hasOne(PuntuacionExtra::class, 'user_id');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function paralelo()
    {
        return $this->belongsTo(Carrera::class, 'paralelo_id');
    }

    public function partida()
    {
        return $this->hasOne(Partida::class, 'user_id');
    }
}
