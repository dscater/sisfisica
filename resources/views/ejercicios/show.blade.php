@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/vistas/ejercicios/show.css') }}">
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
                        <li class="breadcrumb-item active">Ver Ejercicio</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Ver Ejercicio</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row" id="contenedor_principal">
                                <div class="col-md-8">
                                    <img src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio) }}" style="max-width:100%;">
                                    <h4><small>Arrastra los pasos que creas que son los correctos y
                                            ordenalos</small></h4>
                                    <ul id="contenedor_imgs" style="margin-top:10px;">
                                        @if (isset($ejercicio))
                                            @foreach ($pasos as $value)
                                                <li class="imagen">
                                                    <div class="img">
                                                        <img src="{{ asset('imgs/ejercicios/' . $value->imagen) }}"
                                                            alt="Imagen">
                                                    </div>
                                                    <div class="acciones">
                                                        <input type="hidden" name="existe_id[]" value="{{ $value->id }}">
                                                        <input type="hidden" name="nro_paso_e[]" class="nro_paso"
                                                            value="-1">
                                                        <button type="button" class="btn btn-primary btn-sm oculto remover"><i class="fa fa-redo-alt"></i></button>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h4>ARRASTRA AQUÍ LOS PASOS</h4>
                                    <form id="formPasos" action="{{route('ejercicios.revisar_ejercicio', $ejercicio->id)}}">
                                    <ul id="contenedor_pasos" class="ui-widget-content ui-state-default">
                                    </ul>
                                    </form>
                                    <div class="alert mensaje_info oculto">Hola</div>
                                    <button type="button" class="btn btn-info" id="btnRevisar"><i class="fa fa- clipboard-check"></i> REVISAR</button>
                                </div>
                            </div>
                            <a href="{{ route('ejercicios.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver a Ejercicios</a>
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
    <script src="{{ asset('js/vistas/ejercicios/show.js') }}"></script>
@endsection
