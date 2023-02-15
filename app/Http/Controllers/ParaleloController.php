<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\User;
use app\Paralelo;

class ParaleloController extends Controller
{
    public function index()
    {
        $paralelos = Paralelo::all();
        return view('paralelos.index', compact('paralelos'));
    }

    public function create()
    {
        return view('paralelos.create');
    }

    public function store(Request $request)
    {
        $request['fecha_registro'] = date('Y-m-d');
        Paralelo::create(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('paralelos.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(Paralelo $paralelo)
    {
        return view('paralelos.edit', compact('paralelo'));
    }

    public function update(Paralelo $paralelo, Request $request)
    {
        $paralelo->update(array_map('mb_strtoupper', $request->all()));
        return redirect()->route('paralelos.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(Paralelo $paralelo)
    {
        return 'mostrar paralelo';
    }

    public function destroy(Paralelo $paralelo)
    {
        $comprueba = User::where('paralelo_id', $paralelo->id)->get()->first();
        if ($comprueba) {
            return redirect()->route('paralelos.index')->with('error', 'Error! No se puede eliminar el registro porque esta siendo utilizado');
        }
        $paralelo->delete();
        return redirect()->route('paralelos.index')->with('bien', 'Registro eliminado correctamente');
    }
}
