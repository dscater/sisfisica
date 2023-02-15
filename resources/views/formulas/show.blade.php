@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/vistas/formulas/show.css') }}">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formulas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('formulas.index') }}">Formulas</a></li>
                        <li class="breadcrumb-item active">Modificar</li>
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
                            <h3 class="card-title">Modificar Información</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row" id="contenedor_principal">
                                <div class="col-md-6">
                                    <h4>IMAGENES <small>Arrastra los pasos que creas que son los correctos y
                                            ordenalos</small></h4>
                                    <ul id="contenedor_imgs" style="margin-top:10px;">
                                        @if (isset($formula))
                                            @foreach ($pasos as $value)
                                                <li class="imagen existe ui-state-default">
                                                    <div class="img">
                                                        <img src="{{ asset('imgs/formulas/' . $value->imagen) }}"
                                                            alt="Imagen">
                                                    </div>
                                                    <div class="acciones">
                                                        <input type="hidden" name="existe_id[]" value="{{ $value->id }}">
                                                        <input type="hidden" name="nro_paso_e[]" class="nro_paso"
                                                            value="-1">
                                                        <button type="button" class="btn btn-primary btn-sm oculto remover"
                                                            data-url="{{ route('formula_imagens.destroy', $value->id) }}"><i
                                                                class="fa fa-redo-alt"></i></button>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>ARRASTRA AQUÍ LOS PASOS</h4>
                                    <form id="formPasos" action="{{route('formulas.revisar_formula', $formula->id)}}">
                                    <ul id="contenedor_pasos" class="ui-widget-content ui-state-default">
                                    </ul>
                                    </form>
                                    <div class="alert mensaje_info oculto">Hola</div>
                                    <button type="button" class="btn btn-info" id="btnRevisar"><i class="fa fa- clipboard-check"></i> REVISAR</button>
                                </div>
                            </div>
                            <a href="{{ route('formulas.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver a formulas</a>
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
    <script src="{{ asset('js/vistas/formulas/show.js') }}"></script>
@endsection
