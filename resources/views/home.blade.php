@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" >
                <div class="col-sm-6" >
                    <h1 class="m-0">Inicio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" >
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style=" background: url('imgs/f3.jpeg'); background-size: cover; " >
        <div class="container-fluid">

            @if (Auth::user()->tipo == 'ADMINISTRADOR')
                @include('includes.home.home_admin')
            @endif
            @if (Auth::user()->tipo == 'PROFESOR')
                @include('includes.home.home_profesor')
            @endif
            @if (Auth::user()->tipo == 'ESTUDIANTE')
                @include('includes.home.home_estudiante')
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 style="font-weight:bold;text-align:center;">SISTEMA DE TUTOR PARA FÍSICA - "SISFISICA"</h2>
                            <h3 style="text-align:center;">¡BIENVENID@ {{(Auth::user()->datosUsuario)? Auth::user()->datosUsuario->nombre.' '.Auth::user()->datosUsuario->paterno.' '.Auth::user()->datosUsuario->materno:Auth::user()->name}}!</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.row -->
            @if (Auth::user()->tipo == 'ESTUDIANTE')
            <div class="row justify-content-center contenedor_menu_est" style="background-image:url('imgs/fondomenu.jpg')!important; background-size:cover;">
                <div class="col-md-2 puerta1"><a href="{{ route('introduccion.menu_contenido') }}"><img src="{{asset('imgs/1.png')}}" alt=""></a></div>
                <div class="col-md-2 puerta2"><a href="{{route('ejercicios.partida')}}"><img src="{{asset('imgs/2.png')}}" alt=""></a></div>
                <div class="col-md-2 puerta3"><a href="{{route('formulas.index')}}"><img src="{{asset('imgs/3.png')}}" alt=""></a></div>
            </div>
            @endif

            @if(Auth::user()->tipo == 'PROFESOR')
            <div class="row">
                <div class="col-md-12">
                    <div class="card"> 
                        <div class="card-header">
                            <h4>LISTA DE ESTUDIANTES</h4>
                            <a href="{{route('reportes.estudiantes')}}" class="btn btn-primary" target="_blank"><i class="fa fa-file-pdf"></i> Exportar</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Nombre(s) y Apellidos</th>
                                    <th>Diagnóstico Inicial</th>
                                    <th>Diagnóstico Final</th>
                                    <th>Puntuación Extra</th>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @foreach ($estudiantes as $estudiante)
                                        <tr>
                                            <td>{{ $cont++ }}</td>
                                            <td>{{ $estudiante->nombre }} {{ $estudiante->paterno }} {{ $estudiante->materno }}</td>
                                            <td class="centreado">{{ $estudiante->user->diagnostico_inicial? $estudiante->user->diagnostico_inicial->total:'0'  }}</td>
                                            <td class="centreado">{{ $estudiante->user->diagnostico_final? $estudiante->user->diagnostico_final->total:'0'  }}</td>
                                            <td class="centreado">{{ $estudiante->user->puntaje_extra? $estudiante->user->puntaje_extra->puntaje:'0'  }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    {{-- <input type="hidden" value="{{ route('reportes.cantidad_documentos') }}" id="urlInfoGrafico"> --}}
@endsection

@section('scripts')
<script>
    @if(session('bien'))
    mensajeNotificacion('{{session('bien')}}','success');
    @endif

    @if(session('info'))
    mensajeNotificacion('{{session('info')}}','info');
    @endif

    @if(session('error'))
    mensajeNotificacion('{{session('error')}}','error');
    @endif
</script>
@endsection
