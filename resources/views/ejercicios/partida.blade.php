@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/vistas/ejercicios/partida.css') }}">
    <style>
        #contenedorPrincipalPartida {
            background-image: url('{{ asset('imgs/iconoc/fondos/fondo1.png') }}')
        }

        .niveles .nivel {
            background-image: url("{{ asset('imgs/partida/inicio/Imagen30.png') }}");
            background-repeat: no-repeat;
            background-size: contain;
            background-position-x: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 15px;
            width: 800px;
        }
    </style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ejercicios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ejercicios.index') }}">Ejercicios</a></li>
                        <li class="breadcrumb-item active">Partida</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body pt-1" id="contenedorPrincipalPartida">
                            <div class="row">
                                <div class="col-md-12 tex-center d-flex justify-content-center">
                                    <a href="#" data-toggle="modal" data-target="#m_ayuda" class="btnAyuda"
                                        style="">
                                        <img src="{{ asset('imgs/partida/ayuda.png') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="row" id="cont_puntajes">
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
                        <div class="card-body oculto"
                            style="background: url('imgs/partida/inicio/fondo.png'); background-size: cover;"
                            id="reiniciarPartida">
                            <div class="row niveles">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img src="{{ asset('imgs/partida/inicio/contenido.png') }}" height="100px"
                                                alt="Contenido">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <div class="nivel">
                                                <img src="{{ asset('imgs/partida/inicio/vectores.png') }}" alt=""
                                                    class="img1" height="200px">

                                                <a href="{{ route('ejercicios.partida') }}?nivel=1" class="boton">
                                                    <img src="{{ asset('imgs/partida/inicio/nivel1.png') }}" alt=""
                                                        height="80px">
                                                </a>
                                                <img src="{{ asset('imgs/partida/inicio/cinematica.png') }}" alt=""
                                                    class="img2" height="200px">
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <div class="nivel">
                                                <img src="{{ asset('imgs/partida/inicio/dinamica.png') }}" alt=""
                                                    class="img1" height="200px">

                                                <a href="{{ route('ejercicios.partida') }}?nivel=2" class="boton">
                                                    <img src="{{ asset('imgs/partida/inicio/nivel2.png') }}" alt=""
                                                        height="80px">
                                                </a>
                                                <img src="{{ asset('imgs/partida/inicio/trabajoenergia.png') }}"
                                                    alt="" class="img2" height="200px">
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <div class="nivel">
                                                <img src="{{ asset('imgs/partida/inicio/mecanica.png') }}" alt=""
                                                    class="img1" height="200px">

                                                <a href="{{ route('ejercicios.partida') }}?nivel=3" class="boton">
                                                    <img src="{{ asset('imgs/partida/inicio/nivel3.png') }}" alt=""
                                                        height="80px">
                                                </a>
                                                <img src="{{ asset('imgs/partida/inicio/gravitacion.png') }}"
                                                    alt="" class="img2" height="200px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <input type="hidden" id="urlInicio" value="{{ route('ejercicios.index') }}">
    <input type="hidden" id="valor_nivel" value="{{ $nivel }}">
    <input type="hidden" id="urlImgsPartida" value="{{ asset('imgs/partida') }}">
    <input type="hidden" id="urlGetNivel" value="{{ route('ejercicios.getNivelPartida') }}">
    <input type="hidden" id="urlRegistraPartida" value="{{ route('ejercicios.registaPartida') }}">
    <input type="hidden" id="urlGuardaPartida" value="{{ route('partidas.store') }}">

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
                <div class="modal-body">
                    <img src="{{ asset('imgs/partida/ayuda.png') }}" height="90px" alt=""></a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <img src="{{ asset('imgs/Pasos_resolver.jpg') }}" style="max-width:100%;">
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

    @include('ejercicios.modal.nivel')
@endsection
@section('scripts')
    <script src="{{ asset('js/vistas/ejercicios/partida.js') }}"></script>

    <script></script>
@endsection
