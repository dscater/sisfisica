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

        .el2.V0 {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
            margin-right: 5px;
        }

        .el3.DA {
            border-bottom: solid 2px;
            margin-top: 2px;
            margin-bottom: 2px;
            min-width: 20px;
            min-height: 20px;
            width: 450px;
            margin-right: 5px;
        }

        .el5.V0 {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
            margin-right: 5px;
        }

        .el6.V0 {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
            margin-right: 5px;
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

        .el4.VI {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
            margin:0px;
        }

        .el5.VI {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
        }


        .el7.VI {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 120px;
        }

        .el8.VI {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 120px;
        }

        .el9.VI {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 120px;
        }

        .el10 {
            min-width: 20px;
            min-height: 20px;
            display: flex;
            width: 100%;
            justify-content: center;
        }

        .el4.VA {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
        }

        .el5.VA {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
        }

        .el6.VA {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
        }


        .el7.VA {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
        }

        .el8.VA {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
        }

        .el9.VA {
            border: solid 1px;
            min-width: 20px;
            min-height: 20px;
            width: 80px;
            height: 90px;
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
                            <div class="row" id="contenedor_principal2">
                                <div class="col-md-6">
                                    <h4>Despejar la velocidad inicial <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen28.gif') }}"
                                            style="width:90px;"> <br> <small>Arrastra las imagenes donde crees que
                                            correspondan</small></h4>
                                    <ul id="contenedor_imgs2" class="contenedor_imgs" style="margin-top:10px;">
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen28.gif">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen28.gif') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen27.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen27.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen34.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen34.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen30.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen30.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen29.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen29.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen31.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen31.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VI ui-state-default">
                                            <div class="img" data-img="Imagen32.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen32.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>ARRASTRA AQUÍ LOS PASOS</h4>
                                    <div class="contenedor_pasos1" id="contenedor_pasos2">
                                        <div class="el1 VI" data-id="1"></div> =
                                        <div class="el2">
                                            <div class="el3">
                                                <div class="el6 VI" data-id="2"></div>
                                                <div class="el7 VI" data-id="3"></div>
                                                <div class="el8 VI" data-id="4"></div>
                                                <div class="el9 VI" data-id="5"></div>
                                            </div>
                                            <div class="el10">
                                                <div class="el4 VI" data-id="6"></div>
                                                <div class="el5 VI" data-id="7"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert mensaje_info oculto mt-5"></div>
                                    <button type="button" class="btn btn-info btnRevisarVI"><i
                                            class="fa fa- clipboard-check"></i> REVISAR</button>
                                    <button type="button" class="btn btn-default btnReiniciaVI"><i
                                            class="fa fa- clipboard-check"></i> REINICIAR</button>
                                </div>
                            </div>

                            <div class="row" id="contenedor_principal3">
                                <div class="col-md-6">
                                    <h4>Despejar la velocidad inicial <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen30.jpg') }}"
                                            style="width:90px;"> <br> <small>Arrastra las imagenes donde crees que
                                            correspondan</small></h4>
                                    <ul id="contenedor_imgs3" class="contenedor_imgs" style="margin-top:10px;">
                                        <li class="imagen VA ui-state-default">
                                            <div class="img" data-img="Imagen30.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen30.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VA ui-state-default">
                                            <div class="img" data-img="Imagen27.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen27.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VA ui-state-default">
                                            <div class="img" data-img="Imagen34.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen34.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VA ui-state-default">
                                            <div class="img" data-img="Imagen31.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen31.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VA ui-state-default">
                                            <div class="img" data-img="Imagen28.gif">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen28.gif') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VA ui-state-default">
                                            <div class="img" data-img="Imagen32.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen32.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                        <li class="imagen VA ui-state-default">
                                            <div class="img" data-img="Imagen29.jpg">
                                                <img src="{{ asset('imgs/formulas/4__Caida_libre/formula 2/Imagen29.jpg') }}"
                                                    alt="Imagen">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>ARRASTRA AQUÍ LOS PASOS</h4>
                                    <div class="contenedor_pasos1" id="contenedor_pasos3">
                                        <div class="el1 VA" data-id="1"></div> =
                                        <div class="el2">
                                            <div class="el3 DA">
                                                <div class="el6 VA" data-id="2"></div>
                                                <div class="el7 VA" data-id="3"></div>
                                                <div class="el8 VA" data-id="4"></div>
                                                <div class="el9 VA" data-id="5"></div>
                                                <div class="el5 VA" data-id="6"></div>
                                            </div>
                                            <div class="el4 VA" data-id="7"></div>
                                        </div>
                                    </div>
                                    <div class="alert mensaje_info oculto mt-5"></div>
                                    <button type="button" class="btn btn-info btnRevisarVA"><i
                                            class="fa fa- clipboard-check"></i> REVISAR</button>
                                    <button type="button" class="btn btn-default btnReiniciaVA"><i
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
                1: 'Imagen28.gif',
                2: 'Imagen27.jpg',
                3: 'Imagen34.jpg',
                4: 'Imagen30.jpg',
                5: 'Imagen29.jpg',
                6: 'Imagen31.jpg',
                7: 'Imagen32.jpg',
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
                let imgs = $('#contenedor_pasos2').find('.VI');
                imgs.each(function() {
                    let img = $(this).children('.img');
                    let id = $(this).attr('data-id');
                    if (img.length > 0) {
                        console.log(img.attr('data-img'));
                        console.log(solucionVI[id]);
                        console.log('-----------------------------------------');
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
                    boton.siblings('.mensaje_info').text(
                        'Los pasos no estan de forma correcta, revisa e intentalo nuevamente.');
                    console.log(sw);
                }
            });

            $('.btnReiniciaVI').click(function() {
                let imgs = $('#contenedor_pasos2').find('.VI');
                imgs.each(function() {
                    if ($(this).children('.img').length > 0) {
                        let elemento_rest =
                            `<li class="imagen VI ui-state-default">${$(this).html()}</li>`;
                        $('#contenedor_imgs2').append(elemento_rest);
                        $(this).children('.img').remove();
                    }
                });
                iniciaDragVI();
                $('.mensaje_info').addClass('oculto');
            });

            function inicia_dropsVI() {
                for (let i = 1; i <= 10; i++) {
                    if (i != 2 && i != 3 && i != 10) {
                        $('.el' + i + '.VI').droppable({
                            accept: "#contenedor_imgs2 > li",
                            classes: {
                                "ui-droppable-active": "ui-state-highlight"
                            },
                            drop: function(event, ui) {
                                ui.draggable.detach();
                                if ($(this).children('.img').length > 0) {
                                    let elemento_rest =
                                        `<li class="imagen VI ui-state-default">${$(this).html()}</li>`;
                                    $('#contenedor_imgs2').append(elemento_rest);
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
            /* FIN VI*/

            /* VA */
            iniciaDragVA();
            inicia_dropsVA();

            let solucionVA = {
                1: 'Imagen30.jpg',
                2: 'Imagen27.jpg',
                3: 'Imagen34.jpg',
                4: 'Imagen31.jpg',
                5: 'Imagen28.gif',
                6: 'Imagen32.jpg',
                7: 'Imagen29.jpg',
            };

            function iniciaDragVA() {
                $('.imagen.VA').draggable({
                    cancel: "a.ui-icon", // clicking an icon won't initiate dragging
                    revert: "invalid", // when not dropped, the item will revert back to its initial position
                    containment: "document",
                    helper: "clone",
                    cursor: "move"
                });
            }

            $('.btnRevisarVA').click(function() {
                let boton = $(this);
                let sw = false;
                let imgs = $('#contenedor_pasos3').find('.VA');
                imgs.each(function() {
                    let img = $(this).children('.img');
                    let id = $(this).attr('data-id');
                    if (img.length > 0) {
                        console.log(img.attr('data-img'));
                        console.log(solucionVA[id]);
                        console.log('-----------------------------------------');
                        if (img.attr('data-img') == solucionVA[id]) {
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
                    boton.siblings('.mensaje_info').text(
                        'Los pasos no estan de forma correcta, revisa e intentalo nuevamente.');
                    console.log(sw);
                }
            });

            $('.btnReiniciaVA').click(function() {
                let imgs = $('#contenedor_pasos3').find('.VA');
                imgs.each(function() {
                    if ($(this).children('.img').length > 0) {
                        let elemento_rest =
                            `<li class="imagen VA ui-state-default">${$(this).html()}</li>`;
                        $('#contenedor_imgs3').append(elemento_rest);
                        $(this).children('.img').remove();
                    }
                });
                iniciaDragVA();
                $('.mensaje_info').addClass('oculto');
            });

            function inicia_dropsVA() {
                for (let i = 1; i <= 10; i++) {
                    if (i != 2 && i != 3) {
                        $('.el' + i + '.VA').droppable({
                            accept: "#contenedor_imgs3 > li",
                            classes: {
                                "ui-droppable-active": "ui-state-highlight"
                            },
                            drop: function(event, ui) {
                                ui.draggable.detach();
                                if ($(this).children('.img').length > 0) {
                                    let elemento_rest =
                                        `<li class="imagen VA ui-state-default">${$(this).html()}</li>`;
                                    $('#contenedor_imgs3').append(elemento_rest);
                                    iniciaDragVA();
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
            /* FIN VA*/
        });
    </script>
@endsection
