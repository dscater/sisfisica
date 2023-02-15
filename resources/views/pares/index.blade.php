@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/vistas/pares/index.css')}}">
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Unidades de Medidas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Unidades de Medidas</li>
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
                        <h3 class="card-title">ENCUENTRA LAS RESPECTIVAS EQUIVALENCIAS DE LAS UNIDADES DE MEDIDA</h3>
                        <br>
                        <button type="button" id="recargar" class="btn btn-primary"><i class="fa fa-redo-alt"></i></button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                       <div class="contenedor_principal" id="contenedor_principal">
                           
                       </div>
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

@endsection
@section('scripts')
    <script src="{{asset('js/vistas/pares/index.js')}}"></script>
@endsection
