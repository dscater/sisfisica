@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="content-header"  >
    <div class="container-fluid" >
        <div class="row mb-2" >
            <div class="col-sm-6" >
                <h1 class="m-0 text-dark" >Ejercicios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                    <li class="breadcrumb-item active">Ejercicios</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content" >
    <div class="container-fluid" >
        <div class="row" >
            <div class="col-12">
                <div class="card" style=" background: url('imgs/f6.jpg'); background-size: cover; " >
                    <div class="card-header" >
                        @if(Auth::user()->tipo != 'ESTUDIANTE')
                        <a href="{{route('ejercicios.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Nuevo</a>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Auth::user()->tipo == 'ESTUDIANTE')
                        <div class="row" id="reiniciarPartida">
                            <div class="col-md-12 puerta2">
                                <a href="{{ route('ejercicios.partida') }}"><img src="{{ asset('imgs/2.png') }}" alt=""></a>
                            </div>
                        </div>
                        @else
                        <table id="example2" class="table data-table table-bordered table-hover" style="max-width:100%!important;">
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
                                @foreach($ejercicios as $ejercicio)
                                <tr>
                                    <td>{{$ejercicio->nivel}}</td>
                                    <td class="centreado"><img src="{{asset('imgs/ejercicios/'.$ejercicio->imagen_ejercicio)}}" alt="" style="height:100px;"></td>
                                    <td class="centreado"><img src="{{asset('imgs/ejercicios/'.$ejercicio->imagen_ejercicio2)}}" alt="" style="height:100px;"></td>
                                    <td class="btns-opciones">
                                        <a href="{{route('ejercicios.show',$ejercicio->id)}}" class="ir-evaluacion"><i class="fa fa-clipboard-check" data-toggle="tooltip" data-placement="left" title="Resolver"></i></a>
                                        @if(Auth::user()->tipo != 'ESTUDIANTE')
                                        <a href="{{route('ejercicios.edit',$ejercicio->id)}}" class="modificar"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="Modificar"></i></a>
                                        <a href="#" data-url="{{route('ejercicios.destroy',$ejercicio->id)}}" data-toggle="modal" data-target="#modal-eliminar" class="eliminar"><i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="Eliminar"></i></a>
                                        @endif
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
    @if(session('bien'))
    mensajeNotificacion('{{session('bien')}}','success');
    @endif

    @if(session('info'))
    mensajeNotificacion('{{session('info')}}','info');
    @endif

    @if(session('error'))
    mensajeNotificacion('{{session('error')}}','error');
    @endif

     $('table.data-table').DataTable({
        columns : [
            null,
            null,
            null,
            {width:"10%"},
        ],
        scrollCollapse: true,
        language: lenguaje,
        pageLength:25
    });

    // ELIMINAR
    $(document).on('click','table tbody tr td.btns-opciones a.eliminar',function(e){
        e.preventDefault();
        let ejercicio = $(this).parents('tr').children('td').eq(1).text();
        $('#mensajeEliminar').html(`¿Está seguro(a) de eliminar al registro <b>${ejercicio}</b>?`);
        let url = $(this).attr('data-url');
        console.log($(this).attr('data-url'));
        $('#formEliminar').prop('action',url);
    });

    $('#btnEliminar').click(function(){
        $('#formEliminar').submit();
    });

</script>
@endsection

@endsection
