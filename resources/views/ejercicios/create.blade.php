@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/vistas/ejercicios/create.css')}}">
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
                        <li class="breadcrumb-item active">Nuevo</li>
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
                            <h3 class="card-title">Nuevo Registro</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::open(['route' => 'ejercicios.store', 'method' => 'post', 'files' => true,]) }}
                                    @include('ejercicios.form.form')
                                    <button class="btn btn-info" id="btnGuardar"><i class="fa fa-save"></i> GUARDAR</button>
                                    {{ Form::close() }}
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
    <input type="hidden" id="urlCargaPasos" value="{{ route('ejercicios.cargar_pasos') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/vistas/ejercicios/create.js') }}"></script>
@endsection
