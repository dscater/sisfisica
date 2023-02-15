<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class FormulaImagen extends Model
{
    protected $fillable = [
        'formula_id', 'imagen', 'nro_paso',
    ];

    public function formula()
    {
        return $this->belongsTo(Formula::class, 'formula_id');
    }
}
