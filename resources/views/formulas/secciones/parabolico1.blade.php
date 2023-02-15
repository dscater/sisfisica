@extends('layouts.app')

@section('css')
    <style>
        .contenedor_imgs {
            overflow: auto;
            height: auto;
            display: grid;
            -ms-grid-columns: 1fr 1fr 1fr 1fr;
            -ms-grid-rows: 1fr;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr;
            grid-column-gap: 10px;
            grid-row-gap: 8px;
            align-items: center;
            font-size: 0.85em;
            border: solid 2px gray;
            padding: 10px;
            min-height: 200px;
        }

        .contenedor_imgs .imagen {
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: pointer;
            z-index: 500;
            border: solid 2px rgb(151, 151, 151);
            width: 120px;
            height: 60px;
        }

        .contenedor_imgs .imagen .img {
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid gray;
            width: 100%;
            max-width: 100%;
            height: 100%;
            max-height: 100%;
        }

        .contenedor_imgs .imagen .img img {
            height: 80px !important;
            max-width: 100%;
            max-height: 100%;
        }

        .contenedor_imgs .imagen .info {
            position: absolute;
            top: 0px;
            left: 0px;
            background: rgba(0, 0, 0, 0.808);
            color: white;
            padding: 5px;
        }

        .contenedor_imgs .imagen .acciones {
            position: absolute;
            top: 0px;
            right: 0px;
            padding: 5px;
            margin: 0px;
            width: 40px;
            height: 100%;
        }

        .contenedor_imgs .imagen .acciones button {
            height: 100%;
        }

        .el1 .img {
            height: 100%;
        }

        .el1 .img img {
            width: 100%;
            height: 100%;
            max-height: 100%;
            max-width: 100%;
        }

        .el1 {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
            margin-right: 5px;
        }

        .el2 .img {
            height: 100%;
        }

        .el2 .img img {
            width: 100%;
            height: 100%;
            max-height: 100%;
            max-width: 100%;
        }

        .el2 {
            min-width: 20px;
            min-height: 20px;
            margin-left: 5px;
        }

        .el3 .img {
            height: 100%;
        }

        .el3 .img img {
            width: 100%;
            height: 100%;
            max-height: 100%;
            max-width: 100%;
        }

        .el3 {
            min-width: 20px;
            min-height: 20px;
            display: flex;
            border-bottom: solid 2px rgb(0, 0, 0);
            width: 300px;
            justify-content: center;
            padding-bottom: 1px;
            margin-bottom: 1px;
        }

        .el4 .img {
            height: 100%;
        }

        .el4 .img img {
            width: 100%;
            height: 100%;
            max-height: 100%;
            max-width: 100%;
        }

        .el4 {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            height: 80px;
            width: 120px;
            margin: auto;
        }

        .el5 .img {
            height: 100%;
        }

        .el5 .img img {
            width: 100%;
            height: 100%;
            max-height: 100%;
            max-width: 100%;
        }

        .el5 {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 120px;
            height: 80px;
        }

        .el6 .img {
            height: 100%;
        }

        .el6 .img img {
            width: 100%;
            height: 100%;
            max-height: 100%;
            max-width: 100%;
        }

        .el6 {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 120px;
            height: 80px;
        }

        .contenedor_pasos1 {
            width: 100%;
            display: flex;
            align-items: center;
        }

    </style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formulas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right bg-white">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('formulas.index') }}">Formulas</a></li>
                        <li class="breadcrumb-item active">Resolver</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Resolver Formula</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row" id="contenedor_principal1">
                                <div class="col-md-6">
                                    <h4>Despejar la velocidad inicial <img src="{{ asset('imgs/formulas/5__Movimiento_parabolico/formula 1/Imagen2.jpg') }}"
                                            style="width:90px;"> <br> <small>Arrastra las imagenes donde crees que correspondan</small></h4>
                                    <ul id="contenedor_imgs" class="contenedor_imgs" style="margin-top:10px;">
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen2.jpg">
                                                <img src="{{ asset('imgs/formulas/5__Movimiento_parabolico/formula 1/Imagen2.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen3.jpg">
                                                <img src="{{ asset('imgs/formulas/5__Movimiento_parabolico/formula 1/Imagen3.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen4.jpg">
                                                <img src="{{ asset('imgs/formulas/5__Movimiento_parabolico/formula 1/Imagen4.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>ARRASTRA AQUÍ LOS PASOS</h4>
                                    <div class="contenedor_pasos1" id="contenedor_pasos1">
                                        <div class="el1 VI" data-id="1"></div> =
                                        <div class="el2">
                                            <div class="el3">
                                                <div class="el5 VI" data-id="2"></div>
                                            </div>
                                            <div class="el4 VI" data-id="3"></div>
                                        </div>
                                    </div>
                                    <div class="alert mensaje_info oculto mt-5"></div>
                                    <button type="button" class="btn btn-info btnRevisarVI"><i
                                            class="fa fa- clipboard-check"></i> REVISAR</button>
                                    <button type="button" class="btn btn-default btnReiniciaVI"><i
                                            class="fa fa- clipboard-check"></i> REINICIAR</button>
                                </div>
                            </div>

                            <div class="row" id="contenedor_principal2">
                                <div class="col-md-6">
                                    <h4>Despejar el tiempo <img src="{{ asset('imgs/formulas/5__Movimiento_parabolico/formula 1/Imagen4.jpg') }}"
                                            style="width:90px;"> <br> <small>Arrastra las imagenes donde crees que correspondan</small></h4>
                                    <ul id="contenedor_imgs2" class="contenedor_imgs" style="margin-top:10px;">
                                        <li class="imagen DT ui-state-default">
                                            <div class="img" data-img="Imagen4.jpg">
                                                <img src="{{ asset('imgs/formulas/5__Movimiento_parabolico/formula 1/Imagen4.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen DT ui-state-default">
                                            <div class="img" data-img="Imagen3.jpg">
                                                <img src="{{ asset('imgs/formulas/5__Movimiento_parabolico/formula 1/Imagen3.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen DT ui-state-default">
                                            <div class="img" data-img="Imagen2.jpg">
                                                <img src="{{ asset('imgs/formulas/5__Movimiento_parabolico/formula 1/Imagen2.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>ARRASTRA AQUÍ LOS PASOS</h4>
                                    <div class="contenedor_pasos1" id="contenedor_pasos2">
                                        <div class="el1 DT" data-id="1"></div> =
                                        <div class="el2">
                                            <div class="el3">
                                                <div class="el5 DT" data-id="2"></div>
                                            </div>
                                            <div class="el4 DT" data-id="3"></div>
                                        </div>
                                    </div>
                                    <div class="alert mensaje_info oculto mt-5"></div>
                                    <button type="button" class="btn btn-info btnRevisarDT"><i
                                            class="fa fa- clipboard-check"></i> REVISAR</button>
                                    <button type="button" class="btn btn-default btnReiniciaDT"><i
                                            class="fa fa- clipboard-check"></i> REINICIAR</button>
                                </div>
                            </div>

                            <a href="{{ route('formulas.index') }}" class="btn btn-primary"><i
                                    class="fa fa-arrow-left"></i> Volver a formulas</a>
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            /* VI */
            iniciaDragVI();
            inicia_dropsVI();

            let solucionVI = {
                1: 'Imagen2.jpg',
                2: 'Imagen3.jpg',
                3: 'Imagen4.jpg',
            };

            function iniciaDragVI() {
                $('.imagen.VI').draggable({
                    cancel: "a.ui-icon", // clicking an icon won't initiate dragging
                    revert: "invalid", // when not dropped, the item will revert back to its initial position
                    containment: "document",
                    helper: "clone",
                    cursor: "move"
                });
            }

            $('.btnRevisarVI').click(function() {
                let boton = $(this);
                let sw = false;
                let imgs = $('#contenedor_pasos1').find('.VI');
                imgs.each(function() {
                    let img = $(this).children('.img');
                    let id = $(this).attr('data-id');
                    if (img.length > 0) {
                        if (img.attr('data-img') == solucionVI[id]) {
                            sw = true;
                        } else {
                            sw = false;
                        return false;
                            
                        }
                    } else {
                        sw = false;
                        return false;
                        
                    }
                });
                if (sw) {
                    boton.siblings('.mensaje_info').removeClass('oculto');
                    boton.siblings('.mensaje_info').removeClass('alert-danger');
                    boton.siblings('.mensaje_info').addClass('alert-success');
                    boton.siblings('.mensaje_info').text('Muy bien lo resolviste correctamente.');
                } else {
                    boton.siblings('.mensaje_info').removeClass('oculto');
                    boton.siblings('.mensaje_info').removeClass('alert-success');
                    boton.siblings('.mensaje_info').addClass('alert-danger');
                    boton.siblings('.mensaje_info').text('Los pasos no estan de forma correcta, revisa e intentalo nuevamente.');
                console.log(sw);
                }
            });

            $('.btnReiniciaVI').click(function() {
                let imgs = $('#contenedor_pasos1').find('.VI');
                imgs.each(function() {
                    if ($(this).children('.img').length > 0) {
                        let elemento_rest =
                            `<li class="imagen VI ui-state-default">${$(this).html()}</li>`;
                        $('#contenedor_imgs').append(elemento_rest);
                        $(this).children('.img').remove();
                    }
                });
                iniciaDragVI();
                $('.mensaje_info').addClass('oculto');
            });

            function inicia_dropsVI() {
                for (let i = 1; i <= 6; i++) {
                    if (i != 2 && i != 3) {
                        $('.el' + i + '.VI').droppable({
                            accept: "#contenedor_imgs > li",
                            classes: {
                                "ui-droppable-active": "ui-state-highlight"
                            },
                            drop: function(event, ui) {
                                ui.draggable.detach();
                                if ($(this).children('.img').length > 0) {
                                    let elemento_rest =
                                        `<li class="imagen VI ui-state-default">${$(this).html()}</li>`;
                                    $('#contenedor_imgs').append(elemento_rest);
                                    iniciaDragVI();
                                }
                                let nuevo_paso = $(ui.draggable.html()).clone();
                                $(this).html(nuevo_paso);
                            },
                            activate: function() {},
                            deactivate: function() {}
                        });
                    }
                }
            }
            /* FIN VI */

            /* SENOS B */
            iniciaDragDT();
            inicia_dropsDT();

            let solucionDT = {
                1: 'Imagen4.jpg',
                2: 'Imagen3.jpg',
                3: 'Imagen2.jpg',
            };

            function iniciaDragDT() {
                $('.imagen.DT').draggable({
                    cancel: "a.ui-icon", // clicking an icon won't initiate dragging
                    revert: "invalid", // when not dropped, the item will revert back to its initial position
                    containment: "document",
                    helper: "clone",
                    cursor: "move"
                });
            }

            $('.btnRevisarDT').click(function() {
                let boton = $(this);
                let sw = false;
                let imgs = $('#contenedor_pasos2').find('.DT');
                imgs.each(function() {
                    let img = $(this).children('.img');
                    let id = $(this).attr('data-id');
                    if (img.length > 0) {
                        if (img.attr('data-img') == solucionDT[id]) {
                            sw = true;
                        } else {
                            sw = false;
                        return false;
                            
                        }
                    } else {
                        sw = false;
                        return false;
                        
                    }
                });
                if (sw) {
                    boton.siblings('.mensaje_info').removeClass('oculto');
                    boton.siblings('.mensaje_info').removeClass('alert-danger');
                    boton.siblings('.mensaje_info').addClass('alert-success');
                    boton.siblings('.mensaje_info').text('Muy bien lo resolviste correctamente.');
                } else {
                    boton.siblings('.mensaje_info').removeClass('oculto');
                    boton.siblings('.mensaje_info').removeClass('alert-success');
                    boton.siblings('.mensaje_info').addClass('alert-danger');
                    boton.siblings('.mensaje_info').text('Los pasos no estan de forma correcta, revisa e intentalo nuevamente.');
                console.log(sw);
                }
            });

            $('.btnReiniciaDT').click(function() {
                let imgs = $('#contenedor_pasos2').find('.DT');
                imgs.each(function() {
                    if ($(this).children('.img').length > 0) {
                        let elemento_rest =
                            `<li class="imagen DT ui-state-default">${$(this).html()}</li>`;
                        $('#contenedor_imgs2').append(elemento_rest);
                        $(this).children('.img').remove();
                    }
                });
                iniciaDragDT();
                $('.mensaje_info').addClass('oculto');
            });

            function inicia_dropsDT() {
                for (let i = 1; i <= 6; i++) {
                    if (i != 2 && i != 3) {
                        $('.el' + i + '.DT').droppable({
                            accept: "#contenedor_imgs2 > li",
                            classes: {
                                "ui-droppable-active": "ui-state-highlight"
                            },
                            drop: function(event, ui) {
                                ui.draggable.detach();
                                if ($(this).children('.img').length > 0) {
                                    let elemento_rest =
                                        `<li class="imagen DT ui-state-default">${$(this).html()}</li>`;
                                    $('#contenedor_imgs2').append(elemento_rest);
                                    iniciaDragDT();
                                }
                                let nuevo_paso = $(ui.draggable.html()).clone();
                                $(this).html(nuevo_paso);
                            },
                            activate: function() {},
                            deactivate: function() {}
                        });
                    }
                }
            }
            /* FIN SENOS B*/
        });
    </script>
@endsection
