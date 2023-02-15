@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/diagnostico.css') }}">
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">DIAGNOSTICO FINAL</h2>
                        </div>
                        <!-- /.card-header -->
                        {{ Form::open(['route' => ['diagnostico_finals.diagnostico_estudiante', Auth::user()->id], 'method' => 'post', 'id' => 'formDiagnostico', 'files' => true]) }}
                        <div class="card-body">
                            <h4>LEE LOS ENUNCIADOS/PREGUNTAS Y SELECCIONA LA RESPUESTA CORRECTA</h4>
                            @php
                                $cont = 1;
                            @endphp
                            @foreach ($preguntas as $pregunta)
                                <div class="row">
                                    <input type="hidden" name="preguntas[]" value="{{$pregunta->id}}">
                                    <div class="col-md-12">
                                        <label>{{ $cont++ }}) {{ $pregunta->pregunta }}</label>
                                        @if($pregunta->imagen != '' && $pregunta->imagen != null)
                                        <br>
                                            <img src="{{asset('imgs/preguntas/'.$pregunta->imagen)}}" class="imagen" alt="Imagen">
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        @php
                                            $inciso = 0;
                                        @endphp
                                        <ul class="opciones list-unstyled">
                                            @foreach ($pregunta->opciones as $opcion)
                                                <li>
                                                    <label><input type="radio" name="p-{{ $pregunta->id }}" value="{{ $opcion->id }}" class="respuesta"
                                                            required>{{ $incisos[$inciso] }}) {{ $opcion->opcion }}</label>
                                                </li>
                                                @php
                                                    $inciso++;
                                                @endphp
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            <button type="button" class="btn btn-info" id="btnEnviaFormulario"><i
                                    class="fa fa-save"></i> ENVIAR RESPUESTAS</button>
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
    @include('modal.confirma_envio')
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#btnEnviaFormulario').click(function(e) {
                e.preventDefault();
                $('#m_confirma_envio').modal('toggle');
            });

            $('#btnEnvia').click(function() {
                $('#formDiagnostico').submit();
            });

            $('.opciones').on('click', 'li', function() {
                let opciones = $(this).closest('ul');
                opciones.children('li').removeClass('seleccionado');;
                $(this).addClass('seleccionado');;
            });
        });
    </script>
@endsection
