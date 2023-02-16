@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if (Auth::user()->tipo == 'ADMINISTRADOR')
                        <h1 class="m-0 text-dark">Usuarios</h1>
                    @endif
                    @if (Auth::user()->tipo == 'PROFESOR')
                        <h1 class="m-0 text-dark">Estudiantes</h1>
                    @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        @if (Auth::user()->tipo == 'ADMINISTRADOR')
                            <li class="breadcrumb-item active">Usuarios</li>
                        @endif
                        @if (Auth::user()->tipo == 'PROFESOR')
                            <li class="breadcrumb-item active">Estudiantes</li>
                        @endif
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
                            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Nuevo</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (Auth::user()->tipo == 'ADMINISTRADOR')
                                <table id="example2" class="table data-table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Usuario</th>
                                            <th>Nombre</th>
                                            <th>C.I.</th>
                                            <th>Celular</th>
                                            <th>Foto</th>
                                            <th>Fecha Registro</th>
                                            <th>Tipo</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cont = 1;
                                        @endphp
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td>{{ $cont++ }}</td>
                                                <td>{{ $usuario->user->name }}</td>
                                                <td>{{ $usuario->nombre }} {{ $usuario->paterno }} {{ $usuario->materno }}
                                                </td>
                                                <td>{{ $usuario->ci }} {{ $usuario->ci_exp }}</td>
                                                <td>{{ $usuario->cel }}</td>
                                                <td><img src="{{ asset('imgs/users/' . $usuario->user->foto) }}"
                                                        alt="Foto" class="img-table"></td>
                                                <td>{{ $usuario->fecha_registro }}</td>
                                                <td>{{ $usuario->user->tipo }}</td>
                                                <td class="btns-opciones">
                                                    <a href="{{ route('users.edit', $usuario->id) }}" class="modificar"><i
                                                            class="fa fa-edit" data-toggle="tooltip" data-placement="left"
                                                            title="Modificar"></i></a>
                                                    <a href="#" data-url="{{ route('users.destroy', $usuario->user_id) }}"
                                                        data-toggle="modal" data-target="#modal-eliminar"
                                                        class="eliminar"><i class="fa fa-trash" data-toggle="tooltip"
                                                            data-placement="left" title="Eliminar"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                            @if (Auth::user()->tipo == 'PROFESOR')
                                <table id="example2" class="table data-table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>Nombre</th>
                                            <th>C.I.</th>
                                            <th>Celular</th>
                                            <th>Correo</th>
                                            <th>Foto</th>
                                            <th>Fecha Registro</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $cont = 1;
                                        @endphp
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td>{{ $cont++ }}</td>
                                                <td>{{ $usuario->nombre }} {{ $usuario->paterno }}
                                                    {{ $usuario->materno }}</td>
                                                <td>{{ $usuario->ci }} {{ $usuario->ci_exp }}</td>
                                                <td>{{ $usuario->cel }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td><img src="{{ asset('imgs/users/' . $usuario->user->foto) }}"
                                                        alt="Foto" class="img-table"></td>
                                                <td>{{ $usuario->fecha_registro }}</td>
                                                <td class="btns-opciones">
                                                    <a href="{{ route('users.edit', $usuario->id) }}" class="modificar"><i
                                                            class="fa fa-edit" data-toggle="tooltip" data-placement="left"
                                                            title="Modificar"></i></a>
                                                    <a href="#" data-url="{{ route('users.destroy', $usuario->user_id) }}"
                                                        data-toggle="modal" data-target="#modal-eliminar"
                                                        class="eliminar"><i class="fa fa-trash" data-toggle="tooltip"
                                                            data-placement="left" title="Eliminar"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
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

        @if (Auth::user()->tipo == 'ADMINISTRADOR')
            $('table.data-table').DataTable({
                columns: [
                    null,
                    null,
                    null,
                    null,
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
        @endif

        @if (Auth::user()->tipo == 'PROFESOR')
            $('table.data-table').DataTable({
                columns: [
                    null,
                    null,
                    null,
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
        @endif


        // ELIMINAR
        $(document).on('click', 'table tbody tr td.btns-opciones a.eliminar', function(e) {
            e.preventDefault();
            let usuario = $(this).parents('tr').children('td').eq(1).text();
            $('#mensajeEliminar').html(`¿Está seguro(a) de eliminar al usuario <b>${usuario}</b>?`);
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
