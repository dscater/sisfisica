<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Descripcion</label>
            <input type="text" name="descripcion" value="{{ isset($video) ? $video->descripcion : '' }}"
                class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Seleccionar Video*</label>
            <input type="file" name="video" id="vid" class="form-control file_multi_video"
                {{ isset($video) ? '' : 'required' }}>
        </div>
    </div>
    <div class="col-md-6">
        <label>Vista Previa</label>
        <video width="" style="width: 100%" controls>
            <source src="{{ isset($video) ? asset('vids/' . $video->video) : '' }}" id="video_here">
        </video>
        <div id="info"></div>
    </div>
</div>
