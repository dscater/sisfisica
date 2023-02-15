<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class PuntuacionExtra extends Model
{
    protected $fillable = ['user_id', 'puntaje'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
