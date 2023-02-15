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
        $contenido->save();
        return redirect()->route('introduccion.edit',$contenido->seccion)->with('bien','Actualización exitosa');
    }

    public function show($seccion)
    {
        $contenido = Introduccion::where('seccion', $seccion)->first();
        return view('introduccion.show', compact('contenido', 'seccion'));
    }
}
