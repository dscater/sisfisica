@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    @if(Auth::user()->tipo == 'ADMINISTRADOR')
                <h1 class="m-0 text-dark">Usuarios</h1>
                @endif
                @if(Auth::user()->tipo == 'PROFESOR')
                <h1 class="m-0 text-dark">Estudiantes</h1>
                @endif
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        @if(Auth::user()->tipo == 'ADMINISTRADOR')
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                        @endif
                        @if(Auth::user()->tipo == 'PROFESOR')
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Estudiantes</a></li>
                        @endif
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
                        {{ Form::open(['route' => 'users.store', 'method' => 'post', 'files' => true]) }}
                        <div class="card-body">
                            @include('users.form.form')
                            <button class="btn btn-info"><i class="fa fa-save"></i> GUARDAR</button>
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
@endsection
