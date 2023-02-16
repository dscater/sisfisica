<div class="col-md-7">
    <img src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio) }}" style="max-width:100%;">
    @if($ejercicio->imagen_ejercicio2 !='' && $ejercicio->imagen_ejercicio2 != NULL)
    <img id="imagen_p2" src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio2) }}" alt="Imagen"  style="max-width:100%;" />
    @endif
    <h4><small>Arrastra los pasos que creas que son los correctos y ordenalos</small></h4>
    <ul id="contenedor_imgs" style="margin-top:10px;">
        {!! $partida_guardada->pasos !!}
    </ul>
</div>
<div class="col-md-5 contenedor_pasos_principal">
    <h4>ARRASTRA AQUÍ LOS PASOS</h4>
    <form id="formPasos" action="{{ route('ejercicios.revisar_ejercicio', $ejercicio->id) }}">
        <ul id="contenedor_pasos" class="ui-widget-content ui-state-default">
            {!! $partida_guardada->pasos_arrastrados !!}
        </ul>
    </form>
    <div class="alert mensaje_info oculto mt-1 mb-1"></div>
    <button type="button" class="btn btn-info mb-3 btn-block btn-flat" id="btnRevisar"><i class="fa fa-check"></i>
        REVISAR</button>

        {{-- <button type="button" class="btn btn-default" id="btnSaltar"><i class="fa fa-arrow-right"></i>
        SALTAR EJERCICIO</button> --}}
</div>
