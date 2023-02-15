<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Nombre*</label>
            {{ Form::text('nombre', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Paterno*</label>
            {{ Form::text('paterno', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Materno</label>
            {{ Form::text('materno', null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>C.I.*</label>
            {{ Form::number('ci', null, ['class' => 'form-control', 'required']) }}
            @if ($errors->has('ci'))
                <span class="invalid-feedback" style="color:red;display:block" role="alert">
                    <strong>{{ $errors->first('ci') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label>Expedido*</label>
            {{ Form::select('ci_exp',['' => 'Seleccione...','LP' => 'LA PAZ','CB' => 'COCHABAMBA','SC' => 'SANTA CRUZ','PT' => 'POTOSI','OR' => 'ORURO','CH' => 'CHUQUISACA','TJ' => 'TARIJA','BN' => 'BENI','PD' => 'PANDO',],null,['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Correo*</label>
            {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
            @if ($errors->has('email'))
                <span class="invalid-feedback" style="color:red;display:block" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Celular*</label>
            {{ Form::text('cel', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            @if (isset($usuario))
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            @else
                <label>Foto*</label>
                <input type="file" name="foto" class="form-control" required>
            @endif
        </div>
    </div>
    @if(Auth::user()->tipo == 'ADMINISTRADOR')
    <div class="col-md-3">
        <div class="form-group">
            <label>Tipo Usuario*</label>
            {{ Form::select('tipo', ['' => 'Seleccione...', 'ADMINISTRADOR' => 'ADMINISTRADOR', 'PROFESOR' => 'PROFESOR', 'ESTUDIANTE' => 'ESTUDIANTE'], isset($usuario) ? $usuario->user->tipo : null, ['class' => 'form-control', 'required', 'id' => 'tipo']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Carrera*</label>
            {{ Form::select('carrera_id', $array_carreras, isset($usuario) ? $usuario->user->carrera_id : null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Paralelo*</label>
            {{ Form::select('paralelo_id', $array_paralelos, isset($usuario) ? $usuario->user->paralelo_id : null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    @else
    <input type="hidden" name="tipo" value="ESTUDIANTE">
    <input type="hidden" name="carrera_id" value="{{Auth::user()->carrera_id}}">
    <input type="hidden" name="paralelo_id" value="{{Auth::user()->paralelo_id}}">
    @endif
    
</div>
