@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/vistas/ejercicios/partida.css') }}">
@endsection

@section('content')
    <div class="content-header" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" >
                    <h1 class="m-0">Ejercicios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item" ><a href="{{ route('ejercicios.index') }}">Ejercicios</a></li>
                        <li class="breadcrumb-item active">Partida</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content" >
        <div class="container-fluid"  >
            <div class="row"  >
                <div class="col-12" >
                    <div class="card"  >
                        <div class="card-header" >
                            <h3 class="card-title" >Partida </h3>
                            <a href="#" data-toggle="modal" data-target="#m_ayuda" class="btn btn-danger" style="position: absolute; right:10px; bottom:5px;">Ayuda</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" id="contenedorPrincipalPartida" >
                            <div class="row" id="cont_puntajes" >
                                <div class="col-md-4 texto_partida">
                                    NIVEL: <span id="txt_nivel">1 - 1</span>
                                </div>
                                <div class="col-md-4 texto_partida">
                                    TIEMPO: <span id="txt_tiempo">0:00</span>
                                </div>
                                <div class="col-md-4 texto_partida">
                                    PUNTAJE: <span id="txt_puntaje">0</span>
                                </div>
                            </div>
                            <div class="row" id="contenedor_principal">

                            </div>
                            <button type="button" id="btnTerminarPartida" class="btn btn-primary"><i
                                    class="fa fa-flag-alt"></i> Terminar Partida</a>
                        </div>
                        <div class="row oculto" id="reiniciarPartida">
                            <div class="col-md-12 puerta2">
                                <a href="{{ route('ejercicios.partida') }}"><img src="{{ asset('imgs/2.png') }}" alt=""></a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <input type="hidden" id="urlGetNivel" value="{{ route('ejercicios.getNivelPartida') }}">
    <input type="hidden" id="urlGuardaPartida" value="{{ route('ejercicios.registaPartida') }}">

    <div class="modal fade" id="m_confirma_salto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmar Salto de Ejercicio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>¿ESTAS SEGURO(A) DE SALTAR EL EJERCICIO?</b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No, cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnConfirmaSalto">Si, saltar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="m_confirma_terminar_partida">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmar Terminar Partida</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>¿ESTAS SEGURO(A) DE TERMINAR LA PARTIDA?</b>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">No, cancelar</button>
                    <button type="button" class="btn btn-outline-light" id="btnConfirmaTerminar">Si, terminar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="m_ayuda">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Ayuda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{asset('imgs/Pasos_resolver.jpg')}}" style="max-width:100%;">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
@endsection
@section('scripts')
    <script src="{{ asset('js/vistas/ejercicios/partida.js') }}"></script>

    <script>
    </script>
@endsection
