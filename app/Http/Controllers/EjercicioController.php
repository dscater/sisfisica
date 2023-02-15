<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Ejercicio;
use app\EjercicioImagen;
use app\PuntuacionExtra;
use Illuminate\Support\Facades\Auth;

class EjercicioController extends Controller
{
    public function index()
    {
        $ejercicios = Ejercicio::all();
        return view('ejercicios.index', compact('ejercicios'));
    }

    public function create()
    {
        return view('ejercicios.create');
    }

    public function store(Request $request)
    {
        $ejercicio = new Ejercicio();
        //obtener el archivo
        $file_imagen_ejercicio = $request->file('imagen_ejercicio');
        $nombre_original = $file_imagen_ejercicio->getClientOriginalName();
        $nombre_original = str_replace(' ', '_', $nombre_original);
        $nom_imagen_ejercicio = time() . '_' . $nombre_original;
        $file_imagen_ejercicio->move(public_path() . "/imgs/ejercicios/", $nom_imagen_ejercicio);
        $ejercicio->nivel = $request->nivel;
        $ejercicio->imagen_ejercicio = $nom_imagen_ejercicio;

        if ($request->hasFile('imagen_ejercicio2')) {
            //obtener el archivo
            $file_foto = $request->file('imagen_ejercicio2');
            $nom_imagen_ejercicio2 = '2_' . time() . '_' . $nombre_original;
            $file_foto->move(public_path() . "/imgs/ejercicios/", $nom_imagen_ejercicio2);
            $ejercicio->imagen_ejercicio2 = $nom_imagen_ejercicio2;
        }

        $ejercicio->save();

        $imagenes = $request->imagenes;
        $nro_paso = $request->nro_paso;
        for ($i = 0; $i < count($imagenes); $i++) {
            $nueva_imagen = new EjercicioImagen();
            $nueva_imagen->ejercicio_id = $ejercicio->id;
            $nueva_imagen->imagen = $imagenes[$i];
            $nueva_imagen->nro_paso = $nro_paso[$i];
            $nueva_imagen->save();
        }

        return redirect()->route('ejercicios.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(Ejercicio $ejercicio)
    {
        $sin_asignar = EjercicioImagen::where('ejercicio_id', $ejercicio->id)->where('nro_paso', -1)->get();
        $pasos = EjercicioImagen::where('ejercicio_id', $ejercicio->id)->where('nro_paso', '>', 0)->orderBy('nro_paso', 'asc')->get();
        return view('ejercicios.edit', compact('ejercicio', 'sin_asignar', 'pasos'));
    }

    public function update(Ejercicio $ejercicio, Request $request)
    {
        if ($request->hasFile('imagen_ejercicio')) {
            // antiguo
            $antiguo = $ejercicio->imagen_ejercicio;
            if ($antiguo != 'ejercicio_default.png') {
                \File::delete(public_path() . '/imgs/ejercicios/' . $antiguo);
            }
            //obtener el archivo
            $file_imagen_ejercicio = $request->file('imagen_ejercicio');
            $nombre_original = $file_imagen_ejercicio->getClientOriginalName();
            $nombre_original = str_replace(' ', '_', $nombre_original);
            $nom_imagen_ejercicio = time() . '_' . $nombre_original;
            $file_imagen_ejercicio->move(public_path() . "/imgs/ejercicios/", $nom_imagen_ejercicio);
            $ejercicio->imagen_ejercicio = $nom_imagen_ejercicio;
        }

        if ($request->hasFile('imagen_ejercicio2')) {
            // antiguo
            $antiguo = $ejercicio->imagen_ejercicio2;
            if ($antiguo != 'ejercicio_default.png') {
                \File::delete(public_path() . '/imgs/ejercicios/' . $antiguo);
            }
            //obtener el archivo
            $file_imagen_ejercicio2 = $request->file('imagen_ejercicio2');
            $nombre_original = $file_imagen_ejercicio2->getClientOriginalName();
            $nombre_original = str_replace(' ', '_', $nombre_original);
            $nom_imagen_ejercicio2 = '2_' . time() . '_' . $nombre_original;
            $file_imagen_ejercicio2->move(public_path() . "/imgs/ejercicios/", $nom_imagen_ejercicio2);
            $ejercicio->imagen_ejercicio2 = $nom_imagen_ejercicio2;
        }
        
        $ejercicio->nivel = $request->nivel;
        $ejercicio->save();

        if ($request->existe_id) {
            $existe_id = $request->existe_id;
            $nro_paso_e = $request->nro_paso_e;
            for ($i = 0; $i < count($existe_id); $i++) {
                $existe = EjercicioImagen::find($existe_id[$i]);
                $existe->nro_paso = $nro_paso_e[$i];
                $existe->save();
            }
        }

        if ($request->imagenes) {
            $imagenes = $request->imagenes;
            $nro_paso = $request->nro_paso;
            for ($i = 0; $i < count($imagenes); $i++) {
                $nueva_imagen = new EjercicioImagen();
                $nueva_imagen->ejercicio_id = $ejercicio->id;
                $nueva_imagen->imagen = $imagenes[$i];
                $nueva_imagen->nro_paso = $nro_paso[$i];
                $nueva_imagen->save();
            }
        }

        return redirect()->route('ejercicios.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(Ejercicio $ejercicio)
    {
        $pasos = EjercicioImagen::where('ejercicio_id', $ejercicio->id)->get();
        return view('ejercicios.show', compact('ejercicio', 'pasos'));
    }

    public function destroy(Ejercicio $ejercicio)
    {
        $imagenes = $ejercicio->pasos;
        foreach ($imagenes as $value) {
            \File::delete(public_path() . '/imgs/ejercicios/' . $value->imagen);
            $value->delete();
        }
        \File::delete(public_path() . '/imgs/ejercicios/' . $ejercicio->imagen);
        $ejercicio->delete();
        return redirect()->route('ejercicios.index')->with('bien', 'Registro eliminado correctamente');
    }

    public function revisar_ejercicio(Ejercicio $ejercicio, Request $request)
    {
        $pasos = EjercicioImagen::where('ejercicio_id', $ejercicio->id)->where('nro_paso', '>', 0)->orderBy('nro_paso', 'asc')->get();
        $nro_pasos = count($pasos);
        if (isset($request->existe_id)) {
            $existe_id = $request->existe_id;
            $nro_paso_e = $request->nro_paso_e;
            $nro_pasos_enviados = count($existe_id);
            if ($nro_pasos == $nro_pasos_enviados) {
                $sw_correcto = true;
                for ($i = 0; $i < $nro_pasos_enviados; $i++) {
                    $ejercicio_imagen = EjercicioImagen::find($existe_id[$i]);
                    if ((int)$nro_paso_e[$i] == (int)$ejercicio_imagen->nro_paso) {
                        $sw_correcto = true;
                    } else {
                        $sw_correcto = false;
                        break;
                    }
                }
                return response()->JSON(['sw' => $sw_correcto]);
            }
        }
        return response()->JSON(['sw' => false]);
    }

    public function partida()
    {
        return view('ejercicios.partida');
    }

    public function getNivelPartida(Request $request)
    {
        do {
            $ejercicio = Ejercicio::where('nivel', $request->nivel)->inRandomOrder()->first();
        } while ($ejercicio->id == $request->actual);

        $pasos = EjercicioImagen::where('ejercicio_id', $ejercicio->id)->inRandomOrder()->get();
        // $pasos = EjercicioImagen::where('ejercicio_id', $ejercicio->id)->get();

        $html = view('ejercicios.ejercicio_render', compact('ejercicio', 'pasos'))->render();
        return response()->JSON([
            'sw' => true,
            'html' => $html,
            'actual' => $ejercicio->id
        ]);
    }

    public function registaPartida(Request $request)
    {
        $user = Auth::user();
        $existe = PuntuacionExtra::where('user_id', $user->id)->first();
        if ($existe) {
            $existe->puntaje = (int)$existe->puntaje + (int)$request->puntaje;
            $existe->save();
        } else {
            PuntuacionExtra::create([
                'user_id' => $user->id,
                'puntaje' => $request->puntaje
            ]);
        }
        return response()->JSON([
            'sw' => true,
        ]);
    }
}
