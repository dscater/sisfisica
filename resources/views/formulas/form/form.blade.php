<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="archivos">
                <span id="info"></span>
                <label for="foto" class="subir">
                    <span>Subir imagen de la formula</span>
                </label>
                <input type="file" name="imagen_formula" id="foto" accept="image/*" onchange='cambiar()' {{isset($formula)? '':'required'}}>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="image-area">
                        @if(isset($formula))
                        <img id="imagen_p" src="{{ asset('imgs/formulas/'.$formula->imagen_formula) }}" alt="Imagen" />
                        @else
                        <img id="imagen_p" src="{{ asset('imgs/formulas/formula_default.png') }}" alt="Imagen" />
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
        <h4>Cargar Imagenes Aquí</h4>
        <div class="dropzone" id="cargaArchivos"></div>
    </div>
</div>
<br>
<div class="row" id="contenedor_principal">
    <div class="col-md-6">
        <h4>IMAGENES CARGADAS</h4>
        <ul id="contenedor_imgs" style="margin-top:10px;">
            @if(isset($formula))
                @foreach ($sin_asignar as $value)
                    <li class="imagen existe ui-state-default">
                        <div class="img">
                            <img src="{{ asset('imgs/formulas/' . $value->imagen) }}" alt="Imagen">
                        </div>
                        <div class="acciones">
                            <input type="hidden" name="existe_id[]" value="{{ $value->id }}">
                            <input type="hidden" name="imagenes_e[]" value="{{ $value->imagen }}">
                            <input type="hidden" name="nro_paso_e[]" class="nro_paso" value="-1">
                            <button type="button" class="btn btn-danger btn-sm eliminar_imagen" data-url="{{ route('formula_imagens.destroy',$value->id) }}"><i class="fa fa-trash"></i></button>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="col-md-6">
        <h4>ARRASTRA AQUÍ LOS PASOS</h4>
        <ul id="contenedor_pasos" class="ui-widget-content ui-state-default">
            @if(isset($formula))
                @foreach($pasos as $value)
                <li class="paso_imagen existe ui-state-default">
                    <div class="img">
                        <img src="{{ asset('imgs/formulas/' . $value->imagen) }}" alt="Imagen">
                    </div>
                    <div class="acciones">
                        <input type="hidden" name="existe_id[]" value="{{ $value->id }}">
                        <input type="hidden" name="imagenes_e[]" value="{{ $value->imagen }}">
                        <input type="hidden" name="nro_paso_e[]" class="nro_paso" value="{{$value->nro_paso}}">
                        <button type="button" class="btn btn-primary btn-sm remover" data-url="{{ route('formula_imagens.destroy',$value->id) }}"><i class="fa fa-redo-alt"></i></button>
                    </div>
                </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
