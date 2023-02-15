<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
    protected $fillable = ['nombre'];

    public function usuario()
    {
        return $this->hasMany(User::class, 'paralelo_id');
    }
}
