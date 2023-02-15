<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\User;
use app\Carrera;

class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras'));
    }

    public function create()
    {
        return view('carreras.create');
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        Carrera::create(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('carreras.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    public function update(Carrera $carrera, Request $request)
    {
        $carrera->update(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('carreras.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(Carrera $carrera)
    {
        return 'mostrar carrera';
    }

    public function destroy(Carrera $carrera)
    {
        $comprueba = User::where('carrera_id', $carrera->id)->get()->first();
        if ($comprueba) {
            return redirect()->route('carreras.index')->with('error', 'Error! No se puede eliminar el registro porque esta siendo utilizado');
        }
        $carrera->delete();
        return redirect()->route('carreras.index')->with('bien', 'Registro eliminado correctamente');
    }
}
