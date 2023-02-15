<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\DiagnosticoFinal;
use app\DiagnosticoFinalPregunta;
use app\PreguntaFinalOpcion;
use app\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class DiagnosticoFinalController extends Controller
{
    public function index()
    {
        $diagnostico_finals = DiagnosticoFinalPregunta::all();
        return view('diagnostico_finals.index', compact('diagnostico_finals'));
    }

    public function create()
    {
        return view('diagnostico_finals.create');
    }

    public function store(Request $request)
    {
        $request['resp'] = 0;
        $nueva_pregunta = DiagnosticoFinalPregunta::create(array_map('mb_strtoupper', $request->except('imagen', 'opcion', 'existe_id')));
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
            $nueva_opcion = PreguntaFinalOpcion::create([
                'dfp_id' => $nueva_pregunta->id,
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

        return redirect()->route('diagnostico_finals.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(DiagnosticoFinalPregunta $diagnostico_final_pregunta)
    {
        $opciones = PreguntaFinalOpcion::where('dfp_id', $diagnostico_final_pregunta->id)->orderBy('id', 'asc')->get();
        $incisos = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
        return view('diagnostico_finals.edit', compact('diagnostico_final_pregunta', 'opciones', 'incisos'));
    }

    public function update(DiagnosticoFinalPregunta $diagnostico_final_pregunta, Request $request)
    {
        $diagnostico_final_pregunta->update(array_map('mb_strtoupper', $request->except('existe_id', 'opcion_e', 'opcion')));
        if ($request->hasFile('imagen')) {

            //obtener el archivo
            $file_imagen = $request->file('imagen');
            $extension = "." . $file_imagen->getClientOriginalExtension();
            $nom_imagen = $diagnostico_final_pregunta->id . '_' . time() . $extension;
            $file_imagen->move(public_path() . "/imgs/preguntas/", $nom_imagen);
            $diagnostico_final_pregunta->imagen = $nom_imagen;
            $diagnostico_final_pregunta->save();
        }
        // opciones
        $opcion = $request->opcion;
        $existe_id = $request->existe_id;
        $correcto = $request->correcto;
        for ($i = 0; $i < count($opcion); $i++) {
            if ($existe_id[$i] != 0) {
                $nueva_opcion = PreguntaFinalOpcion::find($existe_id[$i]);
                $nueva_opcion->update([
                    'opcion' => $opcion[$i],
                    'correcto' => 0
                ]);
            } else {
                $nueva_opcion = PreguntaFinalOpcion::create([
                    'dfp_id' => $diagnostico_final_pregunta->id,
                    'opcion' => $opcion[$i],
                    'correcto' => 0
                ]);
            }
            if ($i == $correcto) {
                $diagnostico_final_pregunta->resp = $nueva_opcion->id;
                $diagnostico_final_pregunta->save();
                $nueva_opcion->correcto = 1;
                $nueva_opcion->save();
            }
        }

        return redirect()->route('diagnostico_finals.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(DiagnosticoFinal $diagnostico_final)
    {
        return 'mostrar diagnostico_final';
    }

    public function destroy(DiagnosticoFinalPregunta $diagnostico_final_pregunta)
    {
        foreach ($diagnostico_final_pregunta->opciones as $value) {
            $value->delete();
        }
        $diagnostico_final_pregunta->delete();
        return redirect()->route('diagnostico_finals.index')->with('bien', 'Registro eliminado correctamente');
    }

    /* DIAGNOSTICO ESTUDIANTES */
    public function nuevo_diagnostico_final(User $user)
    {
        $incisos = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
        // $preguntas = DiagnosticoFinalPregunta::orderByRaw('random()')->take(10)->get();//postgresql
        $preguntas = DiagnosticoFinalPregunta::inRandomOrder()->limit(10)->get(); //mysql
        return view('diagnostico_finals.diagnostico', compact('user', 'preguntas', 'incisos'));
    }

    public function diagnostico_estudiante(User $user, Request $request)
    {
        $preguntas = $request->preguntas;
        $correctos = 0;
        $errores = 0;
        $total = 0;
        for ($i = 0; $i < count($preguntas); $i++) {
            if (isset($request['p-' . $preguntas[$i]])) {
                $diagnostico_final_pregunta = DiagnosticoFinalPregunta::find($preguntas[$i]);
                $respuesta = $request['p-' . $preguntas[$i]];
                if ((int)$diagnostico_final_pregunta->resp == (int)$respuesta) {
                    $correctos++;
                } else {
                    $errores++;
                }
            } else {
                $errores++;
            }
            $total++;
        }

        if ($user->diagnostico_final) {
            $user->diagnostico_final->update([
                'puntaje' => $correctos,
                'total' => $total,
                'fecha_registro' => date('Y-m-d'),
            ]);
        } else {
            DiagnosticoFinal::create([
                'user_id' => $user->id,
                'puntaje' => $correctos,
                'total' => $total,
                'fecha_registro' => date('Y-m-d'),
            ]);
        }

        return redirect()->route('diagnostico_finals.info_diagnostico', $user->id)->with('bien', 'Tú Diagnostico Final se registro correctamente');
    }

    public function info_diagnostico(User $user)
    {
        $diagnostico_final = $user->diagnostico_final;
        if (!$diagnostico_final) {
            $diagnostico_final = new DiagnosticoFinal(['puntaje' => 0, 'total' => 0, 'fecha_registro' => null]);
        }
        return view('diagnostico_finals.diagnostico_estudiantes', compact('user', 'diagnostico_final'));
    }

    public function lista_diagnosticos()
    {
        if (Auth::user()->tipo == 'PROFESOR') {
            $diagnostico_finals = DiagnosticoFinal::select('diagnostico_finals.*')
                ->join('users', 'users.id', '=', 'diagnostico_finals.user_id')
                ->where('users.carrera_id', Auth::user()->carrera_id)
                ->where('users.paralelo_id', Auth::user()->paralelo_id)
                ->orderBy('created_at', 'desc')->get();
        } else {
            $diagnostico_finals = DiagnosticoFinal::orderBy('created_at', 'desc')->get();
        }
        return view('diagnostico_finals.lista_diagnosticos', compact('diagnostico_finals'));
    }

    public function reporte(Request $request)
    {
        $fecha_ini = $request->fecha_ini;
        $fecha_fin = $request->fecha_fin;
        $diagnostico_finals = DiagnosticoFinal::whereBetween('fecha_registro', [$fecha_ini, $fecha_fin])->orderBy('created_at', 'desc')->get();

        $pdf = PDF::loadView('diagnostico_finals.reporte', compact('diagnostico_finals'))->setPaper('letter', 'portrait');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('DiagnosticoFinal.pdf');
    }
}
