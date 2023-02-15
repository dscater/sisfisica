<div class="col-md-7">
    <img src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio) }}" style="max-width:100%;">
    @if($ejercicio->imagen_ejercicio2 !='' && $ejercicio->imagen_ejercicio2 != NULL)
    <img id="imagen_p2" src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio2) }}" alt="Imagen"  style="max-width:100%;" />
    @endif
    <h4><small>Arrastra los pasos que creas que son los correctos y ordenalos</small></h4>
    <ul id="contenedor_imgs" style="margin-top:10px;">
        @if (isset($ejercicio))
            @foreach ($pasos as $value)
                <li class="imagen">
                    <div class="img">
                        <img src="{{ asset('imgs/ejercicios/' . $value->imagen) }}" alt="Imagen">
                    </div>
                    <div class="acciones">
                        <input type="hidden" name="existe_id[]" value="{{ $value->id }}">
                        <input type="hidden" name="nro_paso_e[]" class="nro_paso" value="-1">
                        <button type="button" class="btn btn-primary btn-sm oculto remover"><i
                                class="fa fa-redo-alt"></i></button>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>
<div class="col-md-5">
    <h4>ARRASTRA AQUÍ LOS PASOS</h4>
    <form id="formPasos" action="{{ route('ejercicios.revisar_ejercicio', $ejercicio->id) }}">
        <ul id="contenedor_pasos" class="ui-widget-content ui-state-default">
        </ul>
    </form>
    <div class="alert mensaje_info oculto"></div>
    <button type="button" class="btn btn-info" id="btnRevisar"><i class="fa fa-check"></i>
        REVISAR</button>

        {{-- <button type="button" class="btn btn-default" id="btnSaltar"><i class="fa fa-arrow-right"></i>
        SALTAR EJERCICIO</button> --}}
</div>
