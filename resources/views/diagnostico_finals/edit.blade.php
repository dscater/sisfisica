@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/vistas/diagnostico_finals/create.css')}}">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Diagnóstico Final</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('diagnostico_finals.index') }}">Diagnóstico Final</a></li>
                        <li class="breadcrumb-item active">Modificar</li>
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
                            <h3 class="card-title">Modificar Información</h3>
                        </div>
                        <!-- /.card-header -->
                        {{ Form::model($diagnostico_final_pregunta, ['route' => ['diagnostico_finals.update', $diagnostico_final_pregunta->id], 'method' => 'put', 'files' => true]) }}
                        <div class="card-body">
                            @include('diagnostico_finals.form.form')
                            <button class="btn btn-info"><i class="fa fa-update"></i> ACTUALIZAR</button>
                        </div>
                        {{ Form::close() }}
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
<script src="{{asset('js/vistas/diagnostico_finals/create.js')}}"></script>
@endsection
