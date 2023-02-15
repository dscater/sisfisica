<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Pregunta*</label>
            {{ Form::textarea('pregunta', null, ['class' => 'form-control', 'rows' => '2', 'required']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Imagen (opcional)</label>
            {{ Form::file('imagen', null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<h4>Opciones <button type="button" class="btn btn-primary btn-sm" id="btnAgregaOpcion"><i class="fa fa-plus"></i>
        Agregar opción</button></h4>
<div class="row">
    <div class="col-md-12">
        <ul class="list-unstyled" id="contenedor_opciones">
            @if (isset($diagnostico_inicial_pregunta))
                @php
                    $cont = 0;
                @endphp
                @foreach ($opciones as $key => $value)
                    <li class="elemento existe">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text inciso">{{ $incisos[$key] }})</span>
                            </div>
                            <input type="text" class="form-control" name="opcion[]" value="{{ $value->opcion }}"
                                placeholder="Enunciado" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="hidden" name="existe_id[]" value="{{$value->id}}">
                                    <input type="radio" name="correcto" class="correcto" value="" {{($value->correcto > 0)? 'checked':''}} required>
                                </div>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text eliminar"
                                    data-url="{{ route('pregunta_inicial_opcions.destroy', $value->id) }}"><i
                                        class="fa fa-trash fa-sm"></i></span>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
