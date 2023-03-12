@extends('layouts.app')

@section('css')
    <style>
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
                    <h1 class="m-0 text-dark">Contenido de la materia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Menú del contenido</li>
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
                        <div class="card-body"
                            style="background: url('/imgs/partida/inicio/fondo.png'); background-size: cover;">
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
                                                <a href="{{route("introduccion.show","Vectores")}}"><img src="{{ asset('imgs/partida/inicio/vectores.png') }}" alt=""
                                                    class="img1" height="200px"></a>
                                                <a href="{{route("introduccion.show","Movimiento rectilíneo")}}"><img src="{{ asset('imgs/partida/inicio/cinematica.png') }}" alt=""
                                                    class="img2" height="200px"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <div class="nivel">
                                                <a href="{{route("introduccion.show","Dinámica lineal")}}"><img src="{{ asset('imgs/partida/inicio/dinamica.png') }}" alt=""
                                                    class="img1" height="200px"></a>
                                                <a href="{{route("introduccion.show","Trabajo y energía")}}"><img src="{{ asset('imgs/partida/inicio/trabajoenergia.png') }}"
                                                    alt="" class="img2" height="200px"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <div class="nivel">
                                                <a href="{{route("introduccion.show","Movimiento circular")}}"><img src="{{ asset('imgs/partida/inicio/mecanica.png') }}" alt=""
                                                    class="img1" height="200px"></a>
                                                <a href="{{route("introduccion.show","Gravitación universal")}}"><img src="{{ asset('imgs/partida/inicio/gravitacion.png') }}"
                                                    alt="" class="img2" height="200px"></a>
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
@endsection
@section('scripts')
@endsection
