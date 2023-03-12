<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Ejercicio;
use app\EjercicioImagen;
use app\Partida;
use app\PuntuacionExtra;
use Illuminate\Support\Facades\Auth;

class EjercicioController extends Controller
{
    public function index()
    {
        $ejercicios = Ejercicio::all();

        $partida_guardada = Partida::where("user_id", Auth::user()->id)
            ->where("estado", "GUARDADO")
            ->get()
            ->last();

        return view('ejercicios.index', compact('ejercicios', 'partida_guardada'));
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

    public function partida(Request $request)
    {
        $nivel = 1;
        $partida_guardada = null;
        if (isset($request->nuevo)) {
            if (Auth::user()->tipo == 'ESTUDIANTE') {
                Auth::user()->partida()->update([
                    "estado" => "TERMINADO"
                ]);
            }
        }

        if (isset($request->nivel)) {
            $nivel = $request->nivel;
            $partida_guardada = Partida::where("user_id", Auth::user()->id)
                ->where("estado", "GUARDADO")
                ->get()
                ->last();
            if ($partida_guardada) {
                $partida_guardada->estado = "TERMINADO";
                $partida_guardada->save();
            }
        }
        return view('ejercicios.partida', compact("nivel", "partida_guardada"));
    }

    public function getNivelPartida(Request $request)
    {
        $carga_partida = $request->carga_partida;
        $partida_guardada = Partida::where("user_id", Auth::user()->id)
            ->where("estado", "GUARDADO")
            ->get()
            ->last();

        if ($partida_guardada && $partida_guardada->actual > 0 && $carga_partida == 1) {

            $ejercicio = Ejercicio::find($partida_guardada->actual);

            $html = view('ejercicios.ejercicio_cargado_render', compact('ejercicio', 'partida_guardada'))->render();

            return response()->JSON([
                'sw' => true,
                "sw_carga_partida" => true,
                'html' => $html,
                "t_mins" => $partida_guardada->t_mins,
                "t_segs" => $partida_guardada->t_segs,
                "nivel_actual" => $partida_guardada->nivel_actual,
                "nro_ejercicio" => $partida_guardada->nro_ejercicio,
                "actual" => $partida_guardada->actual,
                "puntaje" => $partida_guardada->puntaje,
                "contador" => $partida_guardada->contador,
                "correctos_nivel" => $partida_guardada->correctos_nivel,
                "jugados" => explode(",", $partida_guardada->jugados),
            ]);
        } else {
            $jugados = $request->jugados;
            do {
                $total_ejercicios_nivel = count(Ejercicio::where('nivel', $request->nivel)->get());

                $ejercicio = Ejercicio::where('nivel', $request->nivel)
                    ->whereNotIn("id", $jugados)
                    ->inRandomOrder()
                    ->first();
                if (!$ejercicio) {
                    $ejercicio = Ejercicio::where('nivel', $request->nivel)
                        ->inRandomOrder()
                        ->first();
                }
            } while ($ejercicio->id == $request->actual && $total_ejercicios_nivel > 1);

            $pasos = EjercicioImagen::where('ejercicio_id', $ejercicio->id)->inRandomOrder()->get();
            // $pasos = EjercicioImagen::where('ejercicio_id', $ejercicio->id)->get();

            $html = view('ejercicios.ejercicio_render', compact('ejercicio', 'pasos'))->render();
            return response()->JSON([
                'sw' => true,
                "sw_carga_partida" => false,
                'html' => $html,
                'actual' => $ejercicio->id,
            ]);
        }
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

        $partida = Partida::where("user_id", $user->id)->get()->first();
        $partida->estado = "TERMINADO";
        $partida->save();

        return response()->JSON([
            'sw' => true,
        ]);
    }
}
