<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Formula;
use app\FormulaImagen;

class FormulaController extends Controller
{
    public function index()
    {
        $formulas = Formula::all();
        return view('formulas.index', compact('formulas'));
    }

    public function create()
    {
        return view('formulas.create');
    }

    public function store(Request $request)
    {
        $formula = new Formula();
        //obtener el archivo
        $file_imagen_formula = $request->file('imagen_formula');
        $nombre_original = $file_imagen_formula->getClientOriginalName();
        $nombre_original = str_replace(' ', '_', $nombre_original);
        $nom_imagen_formula = time() . '_' . $nombre_original;
        $file_imagen_formula->move(public_path() . "/imgs/formulas/", $nom_imagen_formula);
        $formula->imagen_formula = $nom_imagen_formula;
        $formula->save();

        $imagenes = $request->imagenes;
        $nro_paso = $request->nro_paso;
        for ($i = 0; $i < count($imagenes); $i++) {
            $nueva_imagen = new FormulaImagen();
            $nueva_imagen->formula_id = $formula->id;
            $nueva_imagen->imagen = $imagenes[$i];
            $nueva_imagen->nro_paso = $nro_paso[$i];
            $nueva_imagen->save();
        }

        return redirect()->route('formulas.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(Formula $formula)
    {
        $sin_asignar = FormulaImagen::where('formula_id', $formula->id)->where('nro_paso', -1)->get();
        $pasos = FormulaImagen::where('formula_id', $formula->id)->where('nro_paso', '>', 0)->orderBy('nro_paso', 'asc')->get();
        return view('formulas.edit', compact('formula', 'sin_asignar', 'pasos'));
    }

    public function update(Formula $formula, Request $request)
    {
        if ($request->hasFile('imagen_formula')) {
            // antiguo
            $antiguo = $formula->imagen_formula;
            if ($antiguo != 'formula_default.png') {
                \File::delete(public_path() . '/imgs/formulas/' . $antiguo);
            }
            //obtener el archivo
            $file_imagen_formula = $request->file('imagen_formula');
            $nombre_original = $file_imagen_formula->getClientOriginalName();
            $nombre_original = str_replace(' ', '_', $nombre_original);
            $nom_imagen_formula = time() . '_' . $nombre_original;
            $file_imagen_formula->move(public_path() . "/imgs/formulas/", $nom_imagen_formula);
            $formula->imagen_formula = $nom_imagen_formula;
        }
        $formula->save();

        if ($request->existe_id) {
            $existe_id = $request->existe_id;
            $nro_paso_e = $request->nro_paso_e;
            for ($i = 0; $i < count($existe_id); $i++) {
                $existe = FormulaImagen::find($existe_id[$i]);
                $existe->nro_paso = $nro_paso_e[$i];
                $existe->save();
            }
        }

        if ($request->imagenes) {
            $imagenes = $request->imagenes;
            $nro_paso = $request->nro_paso;
            for ($i = 0; $i < count($imagenes); $i++) {
                $nueva_imagen = new FormulaImagen();
                $nueva_imagen->formula_id = $formula->id;
                $nueva_imagen->imagen = $imagenes[$i];
                $nueva_imagen->nro_paso = $nro_paso[$i];
                $nueva_imagen->save();
            }
        }

        return redirect()->route('formulas.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(Formula $formula)
    {
        $pasos = FormulaImagen::where('formula_id', $formula->id)->get();
        return view('formulas.show', compact('formula', 'pasos'));
    }

    public function destroy(Formula $formula)
    {
        $imagenes = $formula->pasos;
        foreach ($imagenes as $value) {
            \File::delete(public_path() . '/imgs/formulas/' . $value->imagen);
            $value->delete();
        }
        \File::delete(public_path() . '/imgs/formulas/' . $formula->imagen);
        $formula->delete();
        return redirect()->route('formulas.index')->with('bien', 'Registro eliminado correctamente');
    }

    public function revisar_formula(Formula $formula, Request $request){
        $pasos = FormulaImagen::where('formula_id', $formula->id)->where('nro_paso', '>', 0)->orderBy('nro_paso', 'asc')->get();
        $nro_pasos = count($pasos);
        if(isset($request->existe_id)){
            $existe_id = $request->existe_id;
            $nro_paso_e = $request->nro_paso_e;
            $nro_pasos_enviados = count($existe_id);
            if ($nro_pasos == $nro_pasos_enviados) {
                $sw_correcto = true;
                for ($i = 0; $i < $nro_pasos_enviados; $i++) {
                    $formula_imagen = FormulaImagen::find($existe_id[$i]);
                    if ((int)$nro_paso_e[$i] == (int)$formula_imagen->nro_paso) {
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

    public function seccion($seccion){
        $seccion = 'formulas.secciones.'.$seccion;
        return view($seccion);
    }
}
