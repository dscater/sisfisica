@extends('layouts.app')

@section('css')
    <style>
        .contenedor_formulas {
            background: #333F50;
        }

        .btn_formula {
            border-radius: 30px;
            padding: 10px;
            text-align: center;
            min-width: 200px;
            display: inline-block;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 19px;
        }

        .bg1 {
            background: #79B84F;
            color: #ffffff;
        }

        .bg2 {
            background: #FFCC05;
            color: #1F4E79;
        }

        .bg3 {
            background: #63A6E2;
            color: #ffffff;
        }

        .bg4 {
            background: #FF0505;
            color: #ffffff;
        }

        .bg5 {
            background: #5D8C3B;
            color: #ffffff;
        }
    </style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Formulas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Formulas</li>
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
                        {{-- <div class="card-header">
                            @if (Auth::user()->tipo != 'ESTUDIANTE')
                                <a href="{{route('formulas.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Nuevo</a>
                            @endif
                        </div> --}}
                        <!-- /.card-header -->
                        @if (Auth::user()->tipo != 'ESTUDIANTE')
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover"
                                    style="max-width:100%!important;">
                                    <thead>
                                        <tr>
                                            <th>Formula</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cont = 1;
                                        @endphp
                                        <tr>
                                            <td class="centreado">Vectores</td>
                                            <td class="btns-opciones">
                                                <a href="{{ route('formulas.seccion', 'vectores1') }}"
                                                    class="ir-evaluacion"><i class="fa fa-clipboard-check"
                                                        data-toggle="tooltip" data-placement="left"
                                                        title="Resolver"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="centreado">Movimiento rectilíneo</td>
                                            <td class="btns-opciones">
                                                <a href="{{ route('formulas.seccion', 'rectilineo1') }}"
                                                    class="ir-evaluacion"><i class="fa fa-clipboard-check"
                                                        data-toggle="tooltip" data-placement="left"
                                                        title="Resolver"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="centreado">Movimiento en plano</td>
                                            <td class="btns-opciones">
                                                <a href="{{ route('formulas.seccion', 'plano1') }}" class="ir-evaluacion"><i
                                                        class="fa fa-clipboard-check" data-toggle="tooltip"
                                                        data-placement="left" title="Resolver"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="centreado">Caída libre</td>
                                            <td class="btns-opciones">
                                                <a href="{{ route('formulas.seccion', 'libre1') }}" class="ir-evaluacion"><i
                                                        class="fa fa-clipboard-check" data-toggle="tooltip"
                                                        data-placement="left" title="Resolver"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="centreado">Movimiento parabólico</td>
                                            <td class="btns-opciones">
                                                <a href="{{ route('formulas.seccion', 'parabolico1') }}"
                                                    class="ir-evaluacion"><i class="fa fa-clipboard-check"
                                                        data-toggle="tooltip" data-placement="left"
                                                        title="Resolver"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="centreado">Movimiento circular</td>
                                            <td class="btns-opciones">
                                                <a href="{{ route('formulas.seccion', 'circular1') }}"
                                                    class="ir-evaluacion"><i class="fa fa-clipboard-check"
                                                        data-toggle="tooltip" data-placement="left"
                                                        title="Resolver"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="card-body contenedor_formulas">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <span class="btn_formula bg1">Vectores</span>
                                                <a href="{{ route('formulas.seccion', 'vectores1') }}"
                                                    class="ir-evaluacion"><img src="{{ asset('imgs/btn_ir.png') }}"
                                                        height="60px" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <span class="btn_formula bg2">Movimiento rectilíneo</span>
                                                <a href="{{ route('formulas.seccion', 'rectilineo1') }}"
                                                    class="ir-evaluacion"><img src="{{ asset('imgs/btn_ir.png') }}"
                                                        height="60px" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <span class="btn_formula bg3">Movimiento en plano</span>
                                                <a href="{{ route('formulas.seccion', 'plano1') }}"
                                                    class="ir-evaluacion"><img src="{{ asset('imgs/btn_ir.png') }}"
                                                        height="60px" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <span class="btn_formula bg4">Caída libre</span>
                                                <a href="{{ route('formulas.seccion', 'libre1') }}"
                                                    class="ir-evaluacion"><img src="{{ asset('imgs/btn_ir.png') }}"
                                                        height="60px" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <span class="btn_formula bg5">Movimiento parabólico</span>
                                                <a href="{{ route('formulas.seccion', 'parabolico1') }}"
                                                    class="ir-evaluacion"><img src="{{ asset('imgs/btn_ir.png') }}"
                                                        height="60px" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <span class="btn_formula bg1">Movimiento circular</span>
                                                <a href="{{ route('formulas.seccion', 'circular1') }}"
                                                    class="ir-evaluacion"><img src="{{ asset('imgs/btn_ir.png') }}"
                                                        height="60px" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            let formula = $(this).parents('tr').children('td').eq(1).text();
            $('#mensajeEliminar').html(`¿Está seguro(a) de eliminar al registro <b>${formula}</b>?`);
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
