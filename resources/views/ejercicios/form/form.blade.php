<div class="row">
    <div class="col-md-6">
        <div class="form-grop mb-2">
            <label>Seleccione el nivel*</label>
            {{ Form::select('nivel', ['' => 'Seleccione...', '1' => 'Nivel 1', '2' => 'Nivel 2', '3' => 'Nivel 3'], null, ['class' => 'form-control', 'required']) }}
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="archivos">
                        <span id="info"></span>
                        <label for="foto" class="subir">
                            <span>Subir imagen del ejercicio*</span>
                        </label>
                        <input type="file" name="imagen_ejercicio" id="foto" accept="image/*" onchange='cambiar()'
                            {{ isset($ejercicio) ? '' : 'required' }}>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="image-area">
                                @if (isset($ejercicio))
                                    <img id="imagen_p" src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio) }}"
                                        alt="Imagen" />
                                @else
                                    <img id="imagen_p" src="{{ asset('imgs/ejercicios/ejercicio_default.png') }}"
                                        alt="Imagen" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div id="vista_imagen">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="archivos">
                        <span id="info2"></span>
                        <label for="foto2" class="subir">
                            <span>Subir segunda imagen</span>
                        </label>
                        <input type="file" name="imagen_ejercicio2" id="foto2" accept="image/*" onchange='cambiar2()'
                            {{ isset($ejercicio) ? '' : '' }}>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="image-area">
                                @if (isset($ejercicio))
                                    @if($ejercicio->imagen_ejercicio2 !='' && $ejercicio->imagen_ejercicio2 != NULL)
                                    <img id="imagen_p2" src="{{ asset('imgs/ejercicios/' . $ejercicio->imagen_ejercicio2) }}" alt="Imagen" />
                                    @else
                                    <img id="imagen_p2" src="{{ asset('imgs/ejercicios/ejercicio_default.png') }}" alt="Imagen" />
                                    @endif
                                @else
                                    <img id="imagen_p2" src="{{ asset('imgs/ejercicios/ejercicio_default.png') }}" alt="Imagen" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div id="vista_imagen2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h4>Cargar Imagenes Aquí</h4>
        <div class="dropzone" id="cargaArchivos"></div>
    </div>
</div>
<br>
<div class="row" id="contenedor_principal">
    <div class="col-md-6">
        <h4>IMAGENES CARGADAS</h4>
        <ul id="contenedor_imgs" style="margin-top:10px;">
            @if (isset($ejercicio))
                @foreach ($sin_asignar as $value)
                    <li class="imagen existe ui-state-default">
                        <div class="img">
                            <img src="{{ asset('imgs/ejercicios/' . $value->imagen) }}" alt="Imagen">
                        </div>
                        <div class="acciones">
                            <input type="hidden" name="existe_id[]" value="{{ $value->id }}">
                            <input type="hidden" name="imagenes_e[]" value="{{ $value->imagen }}">
                            <input type="hidden" name="nro_paso_e[]" class="nro_paso" value="-1">
                            <button type="button" class="btn btn-danger btn-sm eliminar_imagen"
                                data-url="{{ route('ejercicio_imagens.destroy', $value->id) }}"><i
                                    class="fa fa-trash"></i></button>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="col-md-6">
        <h4>ARRASTRA AQUÍ LOS PASOS</h4>
        <ul id="contenedor_pasos" class="ui-widget-content ui-state-default">
            @if (isset($ejercicio))
                @foreach ($pasos as $value)
                    <li class="paso_imagen existe ui-state-default">
                        <div class="img">
                            <img src="{{ asset('imgs/ejercicios/' . $value->imagen) }}" alt="Imagen">
                        </div>
                        <div class="acciones">
                            <input type="hidden" name="existe_id[]" value="{{ $value->id }}">
                            <input type="hidden" name="imagenes_e[]" value="{{ $value->imagen }}">
                            <input type="hidden" name="nro_paso_e[]" class="nro_paso"
                                value="{{ $value->nro_paso }}">
                            <button type="button" class="btn btn-primary btn-sm remover"
                                data-url="{{ route('ejercicio_imagens.destroy', $value->id) }}"><i
                                    class="fa fa-redo-alt"></i></button>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
