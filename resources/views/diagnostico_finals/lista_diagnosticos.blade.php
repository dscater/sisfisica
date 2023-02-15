@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Diagnóstico Final</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Lista de Diagnósticos Realizados</li>
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
                            {{-- <h3 class="card-title"></h3> --}}
                            <a href="#" data-toggle="modal" data-target="#m_reporte" class="btn btn-primary"><i
                                    class="fa fa-plus"></i> Exportar</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table data-table table-bordered table-hover"
                                width="max-width:100%!important;">
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre(s)</th>
                                        <th>Cédula de Identidad</th>
                                        <th>Diagnóstico Final</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @foreach ($diagnostico_finals as $diagnostico_final)
                                        <tr>
                                            <td>{{ $cont++ }}</td>
                                            <td>{{ $diagnostico_final->user->datosUsuario->nombre }}
                                                {{ $diagnostico_final->user->datosUsuario->paterno }}
                                                {{ $diagnostico_final->user->datosUsuario->materno }}</td>
                                            <td>{{ $diagnostico_final->user->datosUsuario->ci }}
                                                {{ $diagnostico_final->user->datosUsuario->ci_exp }}</td>
                                            <td>{{ $diagnostico_final->user->diagnostico_final->puntaje }}/{{ $diagnostico_final->user->diagnostico_final->total }}
                                            </td>
                                            <td>{{ date('d/m/Y', strtotime($diagnostico_final->user->diagnostico_final->fecha_registro)) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

    @include('diagnostico_finals.modal.m_reporte')

@section('scripts')
    <script>
        @if (session('bien'))
            mensajeNotificacion('{{ session('bien') }}','success');
        @endif

        @if (session('info'))
            mensajeNotificacion('{{ session('info') }}','info');
        @endif

        @if (session('error'))
            mensajeNotificacion('{{ session('error') }}','error');
        @endif

        $('table.data-table').DataTable({
            columns: [
                null,
                null,
                null,
                null,
                null,
            ],
            scrollCollapse: true,
            language: lenguaje,
            pageLength: 25
        });
    </script>
@endsection

@endsection
