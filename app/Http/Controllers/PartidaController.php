<?php

namespace app\Http\Controllers;

use app\Partida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartidaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $partida = Partida::where("user_id", $user->id)->get()->first();
        if (!$partida) {
            $partida = Partida::create([
                "user_id" => $user->id,
                "estado" => "GUARDADO",
                "t_mins" => $request->t_mins,
                "t_segs" => $request->t_segs,
                "nivel_actual" => $request->nivel_actual,
                "nro_ejercicio" => $request->nro_ejercicio,
                "actual" => $request->actual,
                "puntaje" => $request->puntaje,
                "contador" => $request->contador,
                "correctos_nivel" => $request->correctos_nivel,
                "jugados" => implode(",", $request->jugados),
                "pasos" => $request->pasos,
                "pasos_arrastrados" => $request->pasos_arrastrados,

            ]);
        } else {
            $partida->update([
                "estado" => "GUARDADO",
                "t_mins" => $request->t_mins,
                "t_segs" => $request->t_segs,
                "nivel_actual" => $request->nivel_actual,
                "nro_ejercicio" => $request->nro_ejercicio,
                "actual" => $request->actual,
                "puntaje" => $request->puntaje,
                "contador" => $request->contador,
                "correctos_nivel" => $request->correctos_nivel,
                "jugados" => implode(",", $request->jugados),
                "pasos" => $request->pasos,
                "pasos_arrastrados" => $request->pasos_arrastrados,

            ]);
        }

        return response()->JSON([
            "sw" => true,
            "partida" => $partida
        ]);
    }
}
