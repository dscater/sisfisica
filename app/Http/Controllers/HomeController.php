<?php

namespace app\Http\Controllers;

use app\CargoCuenta;
use app\DatosUsuario;
use app\DiagnosticoFinal;
use app\DiagnosticoInicialPregunta;
use app\EjecucionGasto;
use app\Ejercicio;
use app\Formula;
use app\Funcionario;
use app\Herramienta;
use app\MaterialObra;
use app\Obra;
use app\PuntuacionExtra;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use app\User;
use app\RecepcionDocumento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = count(User::select('users.*')
            ->join('datos_usuarios', 'datos_usuarios.user_id', '=', 'users.id')
            ->where('users.estado', 1)
            ->where('users.tipo', 'ADMINISTRADOR')
            ->get());

        $profesores = count(User::select('users.*')
            ->join('datos_usuarios', 'datos_usuarios.user_id', '=', 'users.id')
            ->where('users.estado', 1)
            ->where('users.tipo', 'PROFESOR')
            ->get());

        $estudiantes = count(User::select('users.*')
            ->join('datos_usuarios', 'datos_usuarios.user_id', '=', 'users.id')
            ->where('users.estado', 1)
            ->where('users.tipo', 'ESTUDIANTE')
            ->get());

        if (Auth::user()->tipo == 'ESTUDIANTE') {
            // comprobar si ya realizo el diagnostico inicial
            if (!Auth::user()->diagnostico_inicial) {
                $user = Auth::user();
                $incisos = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
                // $preguntas = DiagnosticoInicialPregunta::orderByRaw('random()')->take(10)->get();//postgresql
                $preguntas = DiagnosticoInicialPregunta::inRandomOrder()->limit(10)->get(); //mysql
                return view('diagnostico_inicials.diagnostico', compact('user', 'preguntas', 'incisos'));
            }
            $diagnostico_final = Auth::user()->diagnostico_final;
            if (!$diagnostico_final) {
                $diagnostico_final = new DiagnosticoFinal(['puntaje' => 0, 'total' => 0, 'fecha_registro' => null]);
            }
            $diagnostico_inicial = Auth::user()->diagnostico_inicial;

            $puntaje_extra = Auth::user()->puntaje_extra;
            if (!$puntaje_extra) {
                $puntaje_extra = new PuntuacionExtra(['puntaje' => 0]);
            }
            $diagnostico_inicial = Auth::user()->diagnostico_inicial;
            return view('home', compact('diagnostico_inicial', 'diagnostico_final', 'puntaje_extra'));
        }
        if (Auth::user()->tipo == 'PROFESOR') {
            $ejercicios = count(Ejercicio::all());
            $formulas = count(Formula::all());
            $estudiantes = DatosUsuario::select('datos_usuarios.*')
                ->join('users', 'users.id', '=', 'datos_usuarios.user_id')
                ->where('users.estado', 1)
                ->where('users.tipo', 'ESTUDIANTE')
                ->where('users.carrera_id', Auth::user()->carrera_id)
                ->where('users.paralelo_id', Auth::user()->paralelo_id)
                ->get();
            return view('home', compact('ejercicios', 'formulas', 'estudiantes'));
        }

        return view('home', compact('usuarios', 'profesores', 'estudiantes'));
    }
}
