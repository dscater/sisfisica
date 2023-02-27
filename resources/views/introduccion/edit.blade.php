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
                        {{ Form::open(['route' => ['introduccion.update', $seccion], 'method' => 'put', 'files' => true]) }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>{{ $seccion }}</h4>
                                    <div class="form-group">
                                        <label>Cargar pdf: </label>
                                        <input type="file" name="archivo">
                                        @if ($contenido->archivo && $contenido->archivo != '')
                                            <a href="{{ asset('files/' . $contenido->archivo) }}" target="_blank"><i
                                                    class="fa fa-download"></i> Descargar contenido</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="contenido" id="summernote">{{ $contenido->contenido }}</textarea>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-info" id="btnEnviaFormulario"><i class="fa fa-save"></i>
                                ACTUALIZAR</button>
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
    <script>
        @if (session('bien'))
            mensajeNotificacion('{{ session('bien') }}', 'success');
        @endif
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 500
            });
            var html = $('#summernote').summernote('code');
            console.log(html);
        });
    </script>
@endsection
