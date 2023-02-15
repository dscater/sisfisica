<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\EjecucionGasto;
use app\DiagnosticoInicial;
use app\DiagnosticoInicialPregunta;
use app\PreguntaInicialOpcion;
use app\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class DiagnosticoInicialController extends Controller
{
    public function index()
    {
        $diagnostico_inicials = DiagnosticoInicialPregunta::all();
        return view('diagnostico_inicials.index', compact('diagnostico_inicials'));
    }

    public function create()
    {
        return view('diagnostico_inicials.create');
    }

    public function store(Request $request)
    {
        $request['resp'] = 0;
        $nueva_pregunta = DiagnosticoInicialPregunta::create(array_map('mb_strtoupper', $request->except('imagen', 'opcion', 'existe_id')));
        if ($request->hasFile('imagen')) {
            //obtener el archivo
            $file_imagen = $request->file('imagen');
            $extension = "." . $file_imagen->getClientOriginalExtension();
            $nom_imagen = $nueva_pregunta->id . '_' . time() . $extension;
            $file_imagen->move(public_path() . "/imgs/preguntas/", $nom_imagen);
            $nueva_pregunta->imagen = $nom_imagen;
            $nueva_pregunta->save();
        }
        // opciones
        $opcion = $request->opcion;
        $correcto = $request->correcto;
        for ($i = 0; $i < count($opcion); $i++) {
            $nueva_opcion = PreguntaInicialOpcion::create([
                'dip_id' => $nueva_pregunta->id,
                'opcion' => $opcion[$i],
                'correcto' => 0
            ]);
            if ($i == $correcto) {
                $nueva_pregunta->resp = $nueva_opcion->id;
                $nueva_pregunta->save();
                $nueva_opcion->correcto = 1;
                $nueva_opcion->save();
            }
        }

        return redirect()->route('diagnostico_inicials.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(DiagnosticoInicialPregunta $diagnostico_inicial_pregunta)
    {
        $opciones = PreguntaInicialOpcion::where('dip_id', $diagnostico_inicial_pregunta->id)->orderBy('id', 'asc')->get();
        $incisos = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
        return view('diagnostico_inicials.edit', compact('diagnostico_inicial_pregunta', 'opciones', 'incisos'));
    }

    public function update(DiagnosticoInicialPregunta $diagnostico_inicial_pregunta, Request $request)
    {
        $diagnostico_inicial_pregunta->update(array_map('mb_strtoupper', $request->except('existe_id', 'opcion_e', 'opcion')));
        if ($request->hasFile('imagen')) {

            //obtener el archivo
            $file_imagen = $request->file('imagen');
            $extension = "." . $file_imagen->getClientOriginalExtension();
            $nom_imagen = $diagnostico_inicial_pregunta->id . '_' . time() . $extension;
            $file_imagen->move(public_path() . "/imgs/preguntas/", $nom_imagen);
            $diagnostico_inicial_pregunta->imagen = $nom_imagen;
            $diagnostico_inicial_pregunta->save();
        }
        // opciones
        $opcion = $request->opcion;
        $existe_id = $request->existe_id;
        $correcto = $request->correcto;
        for ($i = 0; $i < count($opcion); $i++) {
            if ($existe_id[$i] != 0) {
                $nueva_opcion = PreguntaInicialOpcion::find($existe_id[$i]);
                $nueva_opcion->update([
                    'opcion' => $opcion[$i],
                    'correcto' => 0
                ]);
            } else {
                $nueva_opcion = PreguntaInicialOpcion::create([
                    'dip_id' => $diagnostico_inicial_pregunta->id,
                    'opcion' => $opcion[$i],
                    'correcto' => 0
                ]);
            }
            if ($i == $correcto) {
                $diagnostico_inicial_pregunta->resp = $nueva_opcion->id;
                $diagnostico_inicial_pregunta->save();
                $nueva_opcion->correcto = 1;
                $nueva_opcion->save();
            }
        }

        return redirect()->route('diagnostico_inicials.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(DiagnosticoInicial $diagnostico_inicial)
    {
        return 'mostrar diagnostico_inicial';
    }

    public function destroy(DiagnosticoInicialPregunta $diagnostico_inicial_pregunta)
    {
        foreach ($diagnostico_inicial_pregunta->opciones as $value) {
            $value->delete();
        }
        $diagnostico_inicial_pregunta->delete();
        return redirect()->route('diagnostico_inicials.index')->with('bien', 'Registro eliminado correctamente');
    }

    /* DIAGNOSTICO ESTUDIANTES */
    public function diagnostico_estudiante(User $user, Request $request)
    {
        $preguntas = $request->preguntas;
        $correctos = 0;
        $errores = 0;
        $total = 0;
        for ($i = 0; $i < count($preguntas); $i++) {
            if (isset($request['p-' . $preguntas[$i]])) {
                $diagnostico_inicial_pregunta = DiagnosticoInicialPregunta::find($preguntas[$i]);
                $respuesta = $request['p-' . $preguntas[$i]];
                if ((int)$diagnostico_inicial_pregunta->resp == (int)$respuesta) {
                    $correctos++;
                } else {
                    $errores++;
                }
            } else {
                $errores++;
            }
            $total++;
        }

        DiagnosticoINicial::create([
            'user_id' => $user->id,
            'puntaje' => $correctos,
            'total' => $total,
            'fecha_registro' => date('Y-m-d'),
        ]);

        return redirect()->route('home')->with('bien', 'Tú Diagnostico Inicial se registro correctamente');
    }

    public function info_diagnostico(User $user)
    {
        $diagnostico_inicial = $user->diagnostico_inicial;
        return view('diagnostico_inicials.diagnostico_estudiantes', compact('user', 'diagnostico_inicial'));
    }

    public function lista_diagnosticos()
    {
        if (Auth::user()->tipo == 'PROFESOR') {
            $diagnostico_inicials = DiagnosticoInicial::select('diagnostico_inicials.*')
                ->join('users', 'users.id', '=', 'diagnostico_inicials.user_id')
                ->where('users.carrera_id', Auth::user()->carrera_id)
                ->where('users.paralelo_id', Auth::user()->paralelo_id)
                ->orderBy('created_at', 'desc')->get();
        } else {
            $diagnostico_inicials = DiagnosticoInicial::orderBy('created_at', 'desc')->get();
        }
        return view('diagnostico_inicials.lista_diagnosticos', compact('diagnostico_inicials'));
    }

    public function reporte(Request $request)
    {
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $diagnostico_inicials = DiagnosticoInicial::whereBetween('fecha_registro', [$fecha_ini, $fecha_fin])->orderBy('created_at', 'desc')->get();

        $pdf = PDF::loadView('diagnostico_inicials.reporte', compact('diagnostico_inicials'))->setPaper('letter', 'portrait');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('DiagnosticoInicial.pdf');
    }
}
