<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use app\DatosUsuario;
use app\DerivarDocumento;
use app\RecepcionDocumento;
use app\User;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index()
    {
        $recepcion_documentos = RecepcionDocumento::where('status', 1)->get();
        return view('reportes.index', compact('recepcion_documentos'));
    }

    public function usuarios(Request $request)
    {
        $filtro = $request->filtro;

        $usuarios = DatosUsuario::select('datos_usuarios.*', 'users.id as user_id', 'users.name as usuario', 'users.tipo', 'users.foto')
            ->join('users', 'users.id', '=', 'datos_usuarios.user_id')
            ->where('users.estado', 1)
            ->orderBy('datos_usuarios.nombre', 'ASC')
            ->get();

        if ($filtro != 'todos') {
            switch ($filtro) {
                case 'tipo':
                    $tipo = $request->tipo;
                    if ($tipo != 'todos') {

                        $usuarios = DatosUsuario::select('datos_usuarios.*', 'users.id as user_id', 'users.name as usuario', 'users.tipo', 'users.foto')
                            ->join('users', 'users.id', '=', 'datos_usuarios.user_id')
                            ->where('users.estado', 1)
                            ->where('users.tipo', $tipo)
                            ->orderBy('datos_usuarios.nombre', 'ASC')
                            ->get();
                    }
                    break;
            }
        }

        $pdf = PDF::loadView('reportes.usuarios', compact('usuarios'))->setPaper('letter', 'landscape');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('Usuarios.pdf');
    }

    public function estudiantes(Request $request)
    {
        if (Auth::user()->tipo ==  'PROFESOR') {
            $estudiantes = DatosUsuario::select('datos_usuarios.*')
                ->join('users', 'users.id', '=', 'datos_usuarios.user_id')
                ->where('users.estado', 1)
                ->where('users.tipo', 'ESTUDIANTE')
                ->where('users.carrera_id', Auth::user()->carrera_id)
                ->where('users.paralelo_id', Auth::user()->paralelo_id)
                ->get();
        } else {
            $estudiantes = DatosUsuario::select('datos_usuarios.*')
                ->join('users', 'users.id', '=', 'datos_usuarios.user_id')
                ->where('users.estado', 1)
                ->where('users.tipo', 'ESTUDIANTE')
                ->get();
        }

        $pdf = PDF::loadView('reportes.estudiantes', compact('estudiantes'))->setPaper('letter', 'landscape');
        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));

        return $pdf->stream('Estudiantes.pdf');
    }
}
