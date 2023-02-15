@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Diagnóstico Inicial</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Diagnóstico Inicial</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- /.card-header -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                        <div class="info-box-content" style="text-align:center">
                            <span class="info-box-text">Resultado del Diagnóstico</span>
                            <span class="info-box-number"
                                style="font-size:1.4em;">{{ $diagnostico_inicial->puntaje }}/{{ $diagnostico_inicial->total }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fa fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Fecha de Registro</span>
                            <span
                                class="info-box-number">{{ date('d/m/Y', strtotime($diagnostico_inicial->fecha_registro)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        </div>
    </section>
@endsection
@section('scripts')
@endsection
