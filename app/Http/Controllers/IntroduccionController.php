<?php

namespace app\Http\Controllers;

use app\Introduccion;
use Illuminate\Http\Request;

class IntroduccionController extends Controller
{
    public function edit($seccion)
    {
        $contenido = Introduccion::where('seccion', $seccion)->first();
        return view('introduccion.edit', compact('contenido', 'seccion'));
    }

    public function update($seccion, Request $request)
    {
        $contenido = Introduccion::where('seccion', $seccion)->first();
        $contenido->contenido = $request->contenido;

        if ($request->hasFile("archivo")) {
            $antiguo = $contenido->archivo;
            \File::delete(public_path() . "/files/" . $antiguo);
            $archivo = $request->file("archivo");
            $extension = $archivo->getClientOriginalExtension();
            $nombre_archivo = $contenido->id . time() . "." . $extension;
            $contenido->archivo = $nombre_archivo;
            $archivo->move(public_path() . "/files/", $nombre_archivo);
        }

        $contenido->save();
        return redirect()->route('introduccion.edit', $contenido->seccion)->with('bien', 'Actualización exitosa');
    }

    public function show($seccion)
    {
        $contenido = Introduccion::where('seccion', $seccion)->first();
        return view('introduccion.show', compact('contenido', 'seccion'));
    }

    public function menu_contenido()
    {
        return view('introduccion.menu_contenido');
    }
}
