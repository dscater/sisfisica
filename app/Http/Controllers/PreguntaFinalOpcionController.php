<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\PreguntaFinalOpcion;

class PreguntaFinalOpcionController extends Controller
{
    public function destroy(PreguntaFinalOpcion $pregunta_final_opcion)
    {
        $pregunta = $pregunta_final_opcion->pregunta;
        if ($pregunta->correcto == $pregunta_final_opcion->id) {
            $pregunta->correcto = 0;
            $pregunta->save();
        }
        $pregunta_final_opcion->delete();
        return response()->JSON(['sw' => true]);
    }
}
