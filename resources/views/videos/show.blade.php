@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Videos</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Videos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Videos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <div id="gallery" style="display:none;">
                                        @php
                                            $cont = 1;
                                        @endphp
                                        @foreach ($videos as $video)
                                            @php
                                                if ($video->descripcion != '' && $video->descripcion != null) {
                                                    $alt = $cont++ .') '. $video->descripcion;
                                                } else {
                                                    $alt = $cont++ .') '. 'Video Física';
                                                }
                                                
                                            @endphp
                                            <img alt="{{ $alt }}" src="{{ asset('vids/video.png') }}"
                                                data-type="html5video" {{-- data-videoogv="{{ asset('vids/'.$video->video) }}" --}} {{-- data-videowebm="{{ asset('vids/'.$video->video) }}" --}}
                                                data-videomp4="{{ asset('vids/' . $video->video) }}"
                                                data-description="{{ $video->descripcion }}">

                                        @endforeach
                                    </div>
                                </div>
                            </div>
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

@section('scripts')
    <script>
        @if (session('bien'))
            mensajeNotificacion('{{ session('bien') }}','success');
        @endif

        @if (session('info'))
            mensajeNotificacion('{{ session('info') }}','info');
        @endif

        @if (session('error'))
            mensajeNotificacion('{{ session('error') }}','error');
        @endif
        jQuery("#gallery").unitegallery({
            gallery_theme: "video",
            theme_skin: "right-no-thumb"
        });
    </script>
@endsection

@endsection
