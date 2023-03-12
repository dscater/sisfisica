@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contenido de la materia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">{{ $seccion }}</li>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>{{ $seccion }}</h4>
                                    @if ($contenido->archivo && $contenido->archivo != '')
                                        <a href="{{ asset('files/' . $contenido->archivo) }}" target="_blank"><i
                                                class="fa fa-download"></i>
                                            Descargar contenido</a>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    {!! $contenido->contenido !!}</textarea>
                                </div>
                            </div>
                            <br>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    @if ($contenido->archivo)
                        <div class="card">
                            <div class="card-header">
                                <h4>PDF:</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <iframe src="{{ asset('files/' . $contenido->archivo) }}" frameborder="0" width="100%"
                                        height="500px"></iframe>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
@endsection

@section('scripts')
@endsection
