@extends('layouts.login')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<link rel="stylesheet"  href="{{asset('css/estilos.css')}}">
@endsection

@section('content')

 <audio src="{{asset('imgs/login.mp3')}}" autoplay="autoplay"></audio>


 <div id="particles-js" style=" background: url('imgs/4f.jpg'); background-size: cover; " ></div>


<div class="login-box">
   
    <div class="login-logo">
        <img src="{{asset('imgs/logo.png')}}" alt="Logo">
    </div>
    <!-- /.login-logo -->
    <div class="card">

        
        <div class="card-body login-card-body">
            <p class="login-box-msg text-white">Inicia Sesión</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" autofocus placeholder="Usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user text-white"></span>
                        </div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" style="display:block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock text-white"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" style="display:block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-default btn-block bg-blue">Acceder</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
        </div>
             <script src="js/particles.min.js" ></script>
             <script src="js/app.js" ></script>
   
        <!-- /.login-card-body -->
    </div>
</div>


<!-- /.login-box -->
@endsection
