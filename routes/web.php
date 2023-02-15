<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {

    return view('auth.login');
})->name('inicio');

Route::get('/clear-cache', function (){ 
    Artisan::call('config:cache');
    return "Cache is cleared";
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

    // USUARIOS
    Route::get('users', 'UserController@index')->name('users.index');

    Route::get('users/create', 'UserController@create')->name('users.create');

    Route::post('users/store', 'UserController@store')->name('users.store');

    Route::get('users/edit/{usuario}', 'UserController@edit')->name('users.edit');

    Route::put('users/update/{usuario}', 'UserController@update')->name('users.update');

    Route::delete('users/destroy/{user}', 'UserController@destroy')->name('users.destroy');

    // Configuración de cuenta
    Route::GET('users/configurar/cuenta/{user}', 'UserController@config')->name('users.config');

    // contraseña
    Route::PUT('users/configurar/cuenta/update/{user}', 'UserController@cuenta_update')->name('users.config_update');

    // foto de perfil
    Route::POST('users/configurar/cuenta/update/foto/{user}', 'UserController@cuenta_update_foto')->name('users.config_update_foto');

    // DIAGNOSTICO INICIAL
    Route::get('diagnostico_inicials', 'DiagnosticoInicialController@index')->name('diagnostico_inicials.index');

    Route::get('diagnostico_inicials/create', 'DiagnosticoInicialController@create')->name('diagnostico_inicials.create');

    Route::post('diagnostico_inicials/store', 'DiagnosticoInicialController@store')->name('diagnostico_inicials.store');

    Route::get('diagnostico_inicials/edit/{diagnostico_inicial_pregunta}', 'DiagnosticoInicialController@edit')->name('diagnostico_inicials.edit');

    Route::put('diagnostico_inicials/update/{diagnostico_inicial_pregunta}', 'DiagnosticoInicialController@update')->name('diagnostico_inicials.update');

    Route::delete('diagnostico_inicials/destroy/{diagnostico_inicial_pregunta}', 'DiagnosticoInicialController@destroy')->name('diagnostico_inicials.destroy');

    Route::get('lista_diagnosticos_inicial', 'DiagnosticoInicialController@lista_diagnosticos')->name('diagnostico_inicials.lista_diagnosticos');

    Route::get('lista_diagnosticos/reporte', 'DiagnosticoInicialController@reporte')->name('diagnostico_inicials.reporte');

    Route::get('diagnostico_inicials/estudiantes', 'DiagnosticoInicialController@estudiantes')->name('diagnostico_inicials.estudiantes');

    Route::post('diagnostico_inicials/store/diagnostico_estudiante/{user}', 'DiagnosticoInicialController@diagnostico_estudiante')->name('diagnostico_inicials.diagnostico_estudiante');

    Route::get('diagnostico_inicials/diagnostico_estudiante/{user}', 'DiagnosticoInicialController@info_diagnostico')->name('diagnostico_inicials.info_diagnostico');

    // OPCIONES-INICIAL
    Route::delete('pregunta_inicial_opcions/destroy/{pregunta_inicial_opcion}', 'PreguntaInicialOpcionController@destroy')->name('pregunta_inicial_opcions.destroy');

    // INTRODUCCION
    Route::get('introduccion/contenido/edit/{contenido}', 'IntroduccionController@edit')->name('introduccion.edit');

    Route::get('introduccion/contenido/show/{contenido}', 'IntroduccionController@show')->name('introduccion.show');

    Route::put('introduccion/update/{contenido}', 'IntroduccionController@update')->name('introduccion.update');

    // EJERCICIOS
    Route::get('ejercicios', 'EjercicioController@index')->name('ejercicios.index');

    Route::get('ejercicios/create', 'EjercicioController@create')->name('ejercicios.create');

    Route::post('ejercicios/store', 'EjercicioController@store')->name('ejercicios.store');

    Route::get('ejercicios/edit/{ejercicio}', 'EjercicioController@edit')->name('ejercicios.edit');

    Route::get('ejercicios/show/{ejercicio}', 'EjercicioController@show')->name('ejercicios.show');

    Route::put('ejercicios/update/{ejercicio}', 'EjercicioController@update')->name('ejercicios.update');

    Route::delete('ejercicios/destroy/{ejercicio}', 'EjercicioController@destroy')->name('ejercicios.destroy');

    Route::get('ejercicios/revisar_ejercicio/{ejercicio}', 'EjercicioController@revisar_ejercicio')->name('ejercicios.revisar_ejercicio');

    Route::get('ejercicios/partida', 'EjercicioController@partida')->name('ejercicios.partida');

    Route::get('ejercicios/getNivelPartida', 'EjercicioController@getNivelPartida')->name('ejercicios.getNivelPartida');

    Route::post('ejercicios/registaPartida', 'EjercicioController@registaPartida')->name('ejercicios.registaPartida');

    // EJERCICIOS
    Route::post('ejercicios/cargar_pasos', 'EjercicioImagenController@cargar_pasos')->name('ejercicios.cargar_pasos');

    Route::get('ejercicios/elimina_imagen_paso', 'EjercicioImagenController@elimina_imagen_paso')->name('ejercicios.elimina_imagen_paso');

    Route::delete('ejercicio_imagens/destroy/{ejercicio_imagen}', 'EjercicioImagenController@destroy')->name('ejercicio_imagens.destroy');

    // FORMULAS
    Route::get('formulas', 'FormulaController@index')->name('formulas.index');

    Route::get('formulas/create', 'FormulaController@create')->name('formulas.create');

    Route::post('formulas/store', 'FormulaController@store')->name('formulas.store');

    Route::get('formulas/edit/{formula}', 'FormulaController@edit')->name('formulas.edit');

    Route::get('formulas/show/{formula}', 'FormulaController@show')->name('formulas.show');

    Route::put('formulas/update/{formula}', 'FormulaController@update')->name('formulas.update');

    Route::delete('formulas/destroy/{formula}', 'FormulaController@destroy')->name('formulas.destroy');

    Route::get('formulas/revisar_formula/{formula}', 'FormulaController@revisar_formula')->name('formulas.revisar_formula');

    Route::get('formulas/resolucion/{seccion}', 'FormulaController@seccion')->name('formulas.seccion');
    // FORMULAS

    Route::post('formulas/cargar_pasos', 'FormulaImagenController@cargar_pasos')->name('formulas.cargar_pasos');

    Route::get('formulas/elimina_imagen_paso', 'FormulaImagenController@elimina_imagen_paso')->name('formulas.elimina_imagen_paso');

    Route::delete('formula_imagens/destroy/{formula_imagen}', 'FormulaImagenController@destroy')->name('formula_imagens.destroy');

    // DIAGNOSTICO FINAL
    Route::get('diagnostico_finals', 'DiagnosticoFinalController@index')->name('diagnostico_finals.index');

    Route::get('diagnostico_finals/create', 'DiagnosticoFinalController@create')->name('diagnostico_finals.create');

    Route::post('diagnostico_finals/store', 'DiagnosticoFinalController@store')->name('diagnostico_finals.store');

    Route::get('diagnostico_finals/edit/{diagnostico_final_pregunta}', 'DiagnosticoFinalController@edit')->name('diagnostico_finals.edit');

    Route::put('diagnostico_finals/update/{diagnostico_final_pregunta}', 'DiagnosticoFinalController@update')->name('diagnostico_finals.update');

    Route::delete('diagnostico_finals/destroy/{diagnostico_final_pregunta}', 'DiagnosticoFinalController@destroy')->name('diagnostico_finals.destroy');

    Route::get('lista_diagnosticos_final', 'DiagnosticoFinalController@lista_diagnosticos')->name('diagnostico_finals.lista_diagnosticos');

    Route::get('lista_diagnosticos_final/reporte', 'DiagnosticoFinalController@reporte')->name('diagnostico_finals.reporte');

    Route::get('diagnostico_finals/nuevo_diagnostico_final/{user}', 'DiagnosticoFinalController@nuevo_diagnostico_final')->name('diagnostico_finals.nuevo_diagnostico_final');

    Route::post('diagnostico_finals/store/diagnostico_estudiante/{user}', 'DiagnosticoFinalController@diagnostico_estudiante')->name('diagnostico_finals.diagnostico_estudiante');

    Route::get('diagnostico_finals/diagnostico_estudiante/{user}', 'DiagnosticoFinalController@info_diagnostico')->name('diagnostico_finals.info_diagnostico');

    // OPCIONES-INICIAL
    Route::delete('pregunta_final_opcions/destroy/{pregunta_final_opcion}', 'PreguntaFinalOpcionController@destroy')->name('pregunta_final_opcions.destroy');

    // VIDEOS
    Route::get('videos', 'VideoController@index')->name('videos.index');

    Route::get('videos/create', 'VideoController@create')->name('videos.create');

    Route::post('videos/store', 'VideoController@store')->name('videos.store');

    Route::get('videos/edit/{video}', 'VideoController@edit')->name('videos.edit');

    Route::get('videos/show', 'VideoController@show')->name('videos.show');

    Route::put('videos/update/{video}', 'VideoController@update')->name('videos.update');

    Route::delete('videos/destroy/{video}', 'VideoController@destroy')->name('videos.destroy');

    // CARRERAS
    Route::get('carreras', 'CarreraController@index')->name('carreras.index');

    Route::get('carreras/create', 'CarreraController@create')->name('carreras.create');

    Route::post('carreras/store', 'CarreraController@store')->name('carreras.store');

    Route::get('carreras/edit/{carrera}', 'CarreraController@edit')->name('carreras.edit');

    Route::get('carreras/show', 'CarreraController@show')->name('carreras.show');

    Route::put('carreras/update/{carrera}', 'CarreraController@update')->name('carreras.update');

    Route::delete('carreras/destroy/{carrera}', 'CarreraController@destroy')->name('carreras.destroy');

    // VIDEOS
    Route::get('paralelos', 'ParaleloController@index')->name('paralelos.index');

    Route::get('paralelos/create', 'ParaleloController@create')->name('paralelos.create');

    Route::post('paralelos/store', 'ParaleloController@store')->name('paralelos.store');

    Route::get('paralelos/edit/{paralelo}', 'ParaleloController@edit')->name('paralelos.edit');

    Route::get('paralelos/show', 'ParaleloController@show')->name('paralelos.show');

    Route::put('paralelos/update/{paralelo}', 'ParaleloController@update')->name('paralelos.update');

    Route::delete('paralelos/destroy/{paralelo}', 'ParaleloController@destroy')->name('paralelos.destroy');

    // PARES
    Route::get('pares', 'ParesController@index')->name('pares.index');


    // REPORTES
    Route::get('reportes', 'ReporteController@index')->name('reportes.index');

    Route::get('reportes/usuarios', 'ReporteController@usuarios')->name('reportes.usuarios');

    Route::get('reportes/estudiantes', 'ReporteController@estudiantes')->name('reportes.estudiantes');
});
