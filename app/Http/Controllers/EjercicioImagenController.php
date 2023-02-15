<?php

namespace app\Http\Controllers;

use app\Ejercicio;
use app\EjercicioImagen;
use Illuminate\Http\Request;

class EjercicioImagenController extends Controller
{
    public function cargar_pasos(Request $request)
    {
        //obtener el archivo
        $file = $request->file('file');
        // $extension = "." . $file->getClientOriginalExtension();
        $nombre_original = $file->getClientOriginalName();
        $nombre_original = str_replace(' ', '_', $nombre_original);
        $nom_file = time() . '_' . $nombre_original;
        $file->move(public_path() . "/imgs/ejercicios/", $nom_file);
        if (file_exists(public_path() . '/imgs/ejercicios/' . $nom_file)) {
            $imagen = '<li class="imagen ui-state-default">
                                <div class="img">
                                    <img src="' . asset('imgs/ejercicios/' . $nom_file) . '" alt="Imagen">
                                </div>
                                <div class="acciones">
                                    <input type="hidden" name="imagenes[]" value="' . $nom_file . '">
                                    <input type="hidden" name="nro_paso[]" class="nro_paso" value="-1">
                                    <button type="button" class="btn btn-danger btn-sm eliminar_imagen" data-url="' . route('ejercicios.elimina_imagen_paso') . '?nom_file=' . $nom_file . '"><i class="fa fa-trash"></i></button>
                                </div>
                            </li>';
            return response()->JSON([
                'sw' => true,
                'imagen' => $imagen,
            ]);
        }
        return response()->JSON(['sw' => false]);
    }

    public function elimina_imagen_paso(Request $request)
    {
        \File::delete(public_path() . '/imgs/ejercicios/' . $request->nom_file);
        return response()->JSON([
            'sw' => true,
        ]);
    }

    public function destroy(EjercicioImagen $ejercicio_imagen){
        \File::delete(public_path() . '/imgs/ejercicios/' . $ejercicio_imagen->imagen);
        $ejercicio_imagen->delete();
        return response()->JSON([
            'sw' => true,
        ]);
    }
}
