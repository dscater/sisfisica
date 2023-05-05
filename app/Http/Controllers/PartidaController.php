<?php

namespace app\Http\Controllers;

use app\Partida;
use app\PuntuacionExtra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartidaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $puntuacion_extra = PuntuacionExtra::where("user_id", $user->id)->get()->first();

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

            if (!$puntuacion_extra) {
                $puntuacion_extra = PuntuacionExtra::create([
                    "user_id" => $user->id,
                    "puntaje" => 0
                ]);
            }
            $puntuacion_extra->puntaje = $puntuacion_extra->puntaje + (float)$partida->puntaje;
        } else {
            $puntaje_adicional = (float)$request->puntaje - $partida->puntaje;
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

            if (!$puntuacion_extra) {
                $puntuacion_extra = PuntuacionExtra::create([
                    "user_id" => $user->id,
                    "puntaje" => 0
                ]);
                $puntuacion_extra->puntaje = $puntuacion_extra->puntaje + (float)$partida->puntaje;
            }else{
                if($puntaje_adicional > 0){
                $puntuacion_extra->puntaje = $puntuacion_extra->puntaje + (float)$puntaje_adicional;
                }
            }
        }
        $puntuacion_extra->save();

        return response()->JSON([
            "sw" => true,
            "partida" => $partida
        ]);
    }
}
