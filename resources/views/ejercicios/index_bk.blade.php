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
                    <h1 class="m-0 text-dark">Ejercicios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Ejercicios</li>
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
                        @if (Auth::user()->tipo != 'ESTUDIANTE')
                            <div class="card-header">
                                <a href="{{ route('ejercicios.create') }}" class="btn btn-info"><i class="fa fa-plus"></i>
                                    Nuevo</a>
                            </div>
                        @endif
                        <!-- /.card-header -->
                        @if (Auth::user()->tipo == 'ESTUDIANTE')
                            <div class="card-body"
                                style="background: url('imgs/partida/inicio/fondo.png'); background-size: cover;">
                                <div class="row niveles">
                                    <div class="col-md-12">
                                        @if ($partida_guardada)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <img src="{{ asset('imgs/partida/mascota/Imagen25.png') }}"
                                                        alt="" height="120px">
                                                    <a href="{{ route('ejercicios.partida') }}"
                                                        class="btn boton_forms btn-lg">CONTINUAR CON LA PARTIDA ANTERIOR <i
                                                            class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <img src="{{ asset('imgs/partida/inicio/contenido.png') }}" height="100px"
                                                    alt="Contenido">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center">
                                                <div class="nivel">
                                                    <img src="{{ asset('imgs/partida/inicio/vectores.png') }}"
                                                        alt="" class="img1" height="200px">

                                                    <a href="{{ route('ejercicios.partida') }}?nivel=1" class="boton">
                                                        <img src="{{ asset('imgs/partida/inicio/nivel1.png') }}"
                                                            alt="" height="80px">
                                                    </a>
                                                    <img src="{{ asset('imgs/partida/inicio/cinematica.png') }}"
                                                        alt="" class="img2" height="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex justify-content-center">
                                                <div class="nivel">
                                                    <img src="{{ asset('imgs/partida/inicio/dinamica.png') }}"
                                                        alt="" class="img1" height="200px">

                                                    <a href="{{ route('ejercicios.partida') }}?nivel=2" class="boton">
                                                        <img src="{{ asset('imgs/partida/inicio/nivel2.png') }}"
                                                            alt="" height="80px">
                                                    </a>
                                                    <img src="{{ asset('imgs/partida/inicio/trabajoenergia.png') }}"
                                                        alt="" class="img2" height="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-4 d-flex justify-content-center">
                                                <div class="nivel">
                                                    <img src="{{ asset('imgs/partida/inicio/mecanica.png') }}"
                                                        alt="" class="img1" height="200px">

                                                    <a href="{{ route('ejercicios.partida') }}?nivel=3" class="boton">
                                                        <img src="{{ asset('imgs/partida/inicio/nivel3.png') }}"
                                                            alt="" height="80px">
                                                    </a>
                                                    <img src="{{ asset('imgs/partida/inicio/gravitacion.png') }}"
                                                        alt="" class="img2" height="200px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <table id="example2" class="table data-table table-bordered table-hover"
                                    style="max-width:100%!important;">
                                    <thead>
                                        <tr>
                                            <th>Nivel</th>
                                            <th>Ejercicio</th>
                                            <th>Segunda Imagen</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cont = 1;
                                        @endphp
                                        @foreach ($ejercicios as $ejercicio)
                                            <tr>
                                                <td>{{ $ejercicio->nivel }}</td>
                                                <td class="centreado"><img
                                                        src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio) }}"
                                                        alt="" style="height:100px;"></td>
                                                <td class="centreado"><img
                                                        src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio2) }}"
                                                        alt="" style="height:100px;"></td>
                                                <td class="btns-opciones">
                                                    <a href="{{ route('ejercicios.show', $ejercicio->id) }}"
                                                        class="ir-evaluacion"><i class="fa fa-clipboard-check"
                                                            data-toggle="tooltip" data-placement="left"
                                                            title="Resolver"></i></a>
                                                    @if (Auth::user()->tipo != 'ESTUDIANTE')
                                                        <a href="{{ route('ejercicios.edit', $ejercicio->id) }}"
                                                            class="modificar"><i class="fa fa-edit" data-toggle="tooltip"
                                                                data-placement="left" title="Modificar"></i></a>
                                                        <a href="#"
                                                            data-url="{{ route('ejercicios.destroy', $ejercicio->id) }}"
                                                            data-toggle="modal" data-target="#modal-eliminar"
                                                            class="eliminar"><i class="fa fa-trash" data-toggle="tooltip"
                                                                data-placement="left" title="Eliminar"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>

    @include('modal.eliminar')

@section('scripts')
    <script>
        @if (session('bien'))
            mensajeNotificacion('{{ session('bien') }}', 'success');
        @endif

        @if (session('info'))
            mensajeNotificacion('{{ session('info') }}', 'info');
        @endif

        @if (session('error'))
            mensajeNotificacion('{{ session('error') }}', 'error');
        @endif

        $('table.data-table').DataTable({
            columns: [
                null,
                null,
                null,
                {
                    width: "10%"
                },
            ],
            scrollCollapse: true,
            language: lenguaje,
            pageLength: 25
        });

        // ELIMINAR
        $(document).on('click', 'table tbody tr td.btns-opciones a.eliminar', function(e) {
            e.preventDefault();
            let ejercicio = $(this).parents('tr').children('td').eq(1).text();
            $('#mensajeEliminar').html(`¿Está seguro(a) de eliminar al registro <b>${ejercicio}</b>?`);
            let url = $(this).attr('data-url');
            console.log($(this).attr('data-url'));
            $('#formEliminar').prop('action', url);
        });

        $('#btnEliminar').click(function() {
            $('#formEliminar').submit();
        });
    </script>
@endsection

@endsection
