<?php

namespace app\Http\Controllers;

use app\PreguntaInicialOpcion;
use Illuminate\Http\Request;

class PreguntaInicialOpcionController extends Controller
{
    public function destroy(PreguntaInicialOpcion $pregunta_inicial_opcion)
    {
        $pregunta = $pregunta_inicial_opcion->pregunta;
        if ($pregunta->correcto == $pregunta_inicial_opcion->id) {
            $pregunta->correcto = 0;
            $pregunta->save();
        }
        $pregunta_inicial_opcion->delete();
        return response()->JSON(['sw' => true]);
    }
}
