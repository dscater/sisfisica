<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    protected $fillable = ['imagen_formula'];

    public function pasos()
    {
        return $this->hasMany(FormulaImagen::class, 'formula_id');
    }
}
