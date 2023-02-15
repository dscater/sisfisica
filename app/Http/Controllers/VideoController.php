<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\EjecucionGasto;
use app\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $nuevo_video = new Video();
        $nuevo_video->descripcion = mb_strtoupper($request->descripcion);
        //obtener el archivo
        $file_video = $request->file('video');
        $nombre_original = $file_video->getClientOriginalName();
        $nombre_original = str_replace(' ', '_', $nombre_original);
        $nom_video = time() . '_' . $nombre_original;
        $file_video->move(public_path() . "/vids/", $nom_video);
        $nuevo_video->video = $nom_video;
        $nuevo_video->save();
        return redirect()->route('videos.index')->with('bien', 'Registro registrado con éxito');
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Video $video, Request $request)
    {
        $video->descripcion = mb_strtoupper($request->descripcion);
        //obtener el archivo
        if ($request->hasFile('video')) {
            \File::delete(public_path() . '/vids/' . $video->video);

            $file_video = $request->file('video');
            $nombre_original = $file_video->getClientOriginalName();
            $nombre_original = str_replace(' ', '_', $nombre_original);
            $nom_video = time() . '_' . $nombre_original;
            $file_video->move(public_path() . "/vids/", $nom_video);
            $video->video = $nom_video;
        }
        $video->save();
        return redirect()->route('videos.index')->with('bien', 'Registro modificado con éxito');
    }

    public function show(Video $video)
    {
        $videos = Video::all();
        return view('videos.show', compact('videos'));
    }

    public function destroy(Video $video)
    {
        \File::delete(public_path() . '/vids/' . $video->video);
        $video->delete();
        return redirect()->route('videos.index')->with('bien', 'Registro eliminado correctamente');
    }
}
