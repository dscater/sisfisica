let t_mins = 5;
let t_segs = 1;

let nivel_actual = 1;
let nro_ejercicio = 1;
let actual = 0;

let txt_nivel = $('#txt_nivel');
let txt_tiempo = $('#txt_tiempo');
let txt_puntaje = $('#txt_puntaje');
let puntaje = 0;
let contador = 0;
let correctos_nivel = 0;
let contador_tiempo = null;
$(document).ready(function() {
    var audio = new Audio($('#public_path').val() + 'fondo.mp3');
    audio.volume = 0.5;
    audio.play();

    contador_tiempo = setInterval(iniciaConteo, 1000);
    nuevo();

    // FUNCION PARA VOLVER LAS IMAGENES AL CONTENEDOR INICIAL
    $(document).on('click', '.remover', function() {
        let paso_removido = $(this).parents('.paso_imagen');
        paso_removido.remove();
        let nueva_imagen = paso_removido.clone();
        nueva_imagen.removeClass('paso_imagen');
        nueva_imagen.addClass('imagen');
        nueva_imagen.children('.acciones').children('button').addClass('oculto');
        nueva_imagen.children('.acciones').children('button').removeClass('btn-primary');
        nueva_imagen.children('.acciones').children('button').addClass('btn-danger');
        nueva_imagen.children('.acciones').children('button').removeClass('remover');
        nueva_imagen.children('.acciones').children('button').addClass('eliminar_imagen');
        nueva_imagen.children('.acciones').children('button').children('i').removeClass('fa-redo-alt');
        nueva_imagen.children('.acciones').children('button').children('i').addClass('fa-trash');
        nueva_imagen.children('.acciones').children('input.nro_paso').val('-1');
        $('#contenedor_imgs').append(nueva_imagen);
        ennumeraPasos();
        iniciaDrag();
        inciaDragPaso();
        ajustarAncho();
    });

    // REVISAR LOS PASOS
    $(document).on('click', '#btnRevisar', function() {
        $(this).prop('disabled', true);
        revisaEjercicio();
    });

    // SALTAR EJERCICIO
    $(document).on('click', '#btnSaltar', function() {
        $('#m_confirma_salto').modal('show');
    });
    $(document).on('click', '#btnConfirmaSalto', function() {
        saltarEjercicio();
        $('#m_confirma_salto').modal('hide');
    });

    // TERMINAR EJERCICIO
    $('#btnTerminarPartida').click(function(e) {
        e.preventDefault();
        $('#m_confirma_terminar_partida').modal('show');
    });
    $('#btnConfirmaTerminar').click(function(e) {
        e.preventDefault();
        enviaPuntaje();
        $('#m_confirma_terminar_partida').modal('hide');
    });
});

// FUNCION PARA INICIAR EL MOVIMIENTO DE ELEMENTOS
function iniciaDrag() {
    $('.imagen').draggable({
        cancel: "a.ui-icon", // clicking an icon won't initiate dragging
        revert: "invalid", // when not dropped, the item will revert back to its initial position
        containment: "document",
        helper: "clone",
        cursor: "move"
    });
}

// FUNCION PARA INICIAR EL DROP(SOLTAR) DE LOS ELEMENTOS
function iniciaDrop() {
    /* ***************************************
                    DRAG AND DROP
    ***************************************** */
    $('#contenedor_pasos').droppable({
        accept: "#contenedor_imgs > li",
        classes: {
            "ui-droppable-active": "ui-state-highlight"
        },
        drop: function(event, ui) {
            ui.draggable.detach();
            let nuevo_paso = $(ui.draggable).clone();
            nuevo_paso.addClass('paso_imagen');
            nuevo_paso.removeClass('imagen');
            nuevo_paso.children('.acciones').children('button').removeClass('oculto');
            nuevo_paso.children('.acciones').children('button').removeClass('btn-danger');
            nuevo_paso.children('.acciones').children('button').removeClass('eliminar');
            nuevo_paso.children('.acciones').children('button').addClass('btn-primary');
            nuevo_paso.children('.acciones').children('button').addClass('remover');
            nuevo_paso.children('.acciones').children('button').children('i').removeClass('fa-trash');
            nuevo_paso.children('.acciones').children('button').children('i').addClass('fa-redo-alt');
            nuevo_paso.css('width', '100%');
            $('#contenedor_pasos').append(nuevo_paso);
            ennumeraPasos();
            inciaDragPaso();
        },
        activate: function() {},
        deactivate: function() {}
    });

    $("ul, li").disableSelection(); //para que funcione el sortable draggable
}


// INICIAR MOVIMIENTO DE LOS ELEMENTOS PASOS
function inciaDragPaso() {
    $('#contenedor_pasos').sortable({
        revert: true,
        delay: 10,
        dropOnEmpty: false,
        update: function() {
            ennumeraPasos();
        },
        change: function(event, ui) {
            $(this).css('background', '#def5e5');
            let el = $(this);
            setTimeout(function() {
                el.css('background', 'white');
            }, 1000);
        }
    });
    $("ul, li").disableSelection();
}

function ennumeraPasos() {
    let pasos = $('#contenedor_pasos').children('li.paso_imagen');
    let contador_pasos = 0;
    if (pasos.length > 0) {
        $('#btnRevisar').prop('disabled', false);
        pasos.each(function() {
            contador_pasos++;
            $(this).children('.acciones').children('input.nro_paso').val(contador_pasos);
        });
    } else {
        $('#btnRevisar').prop('disabled', true);
    }
}

// FUNCION PARA OBTENER UN NUEVO EJERCICIO
function nuevo() {
    $.ajax({
        type: "GET",
        url: $('#urlGetNivel').val(),
        data: {
            nivel: nivel_actual,
            actual: actual
        },
        dataType: "json",
        success: function(response) {
            actual = response.actual;
            $('#contenedor_principal').html(response.html);
            iniciaDrag();
            iniciaDrop();
            ennumeraPasos();
            ajustarAncho();
        }
    });
}

// FUNCION PARA REINICIAR CONTEO
function reiniciaConteo() {
    t_mins = 1;
    t_segs = 59;
}

// FUNCION PARA INICIAR CONTEO
function iniciaConteo() {
    t_segs--;
    let sw = true;
    if (t_segs < 0) {
        t_segs = 59;
        if (t_mins > 0) {
            t_mins--;
        } else {
            if (correctos_nivel > 1) {
                nro_ejercicio = 2;
                avanza();
            } else {
                sw = false;
                clearInterval(contador_tiempo);
                enviaPuntaje();
            }
        }
    }
    if (sw) {
        if (t_segs < 10) {
            txt_tiempo.text(`${t_mins}:0${t_segs}`);
        } else {
            txt_tiempo.text(`${t_mins}:${t_segs}`);
        }
    }
}

// FUNCION PARA REVISAR EJERCICIO
function revisaEjercicio() {
    $.ajax({
        type: "GET",
        url: $('#formPasos').attr('action'),
        dataType: "json",
        data: $('#formPasos').serialize(),
        success: function(response) {
            $('.mensaje_info').removeClass('oculto');
            if (response.sw) {
                $('.mensaje_info').removeClass('alert-danger');
                $('.mensaje_info').addClass('alert-success');
                $('.mensaje_info').text('Muy bien resolviste el ejercicio correctamente.');
                setTimeout(function() {
                    correctos_nivel++;
                    avanza();
                    $('#btnRevisar').prop('disabled', false);
                    puntaje = puntaje + 10;
                    txt_puntaje.text(puntaje);
                }, 1000);
            } else {
                $('#btnRevisar').prop('disabled', false);
                $('.mensaje_info').removeClass('alert-success');
                $('.mensaje_info').addClass('alert-danger');
                $('.mensaje_info').text('Error, los pasos no fueron los correctos.');
            }
        }
    });
}

// FUNCION PARA ENVIAR EL PUNTAJE FINAL DE LA PARTIDA
function enviaPuntaje() {
    $.ajax({
        headers: { 'x-csrf-token': $('#token').val() },
        type: "POST",
        url: $('#urlGuardaPartida').val(),
        data: {
            puntaje: puntaje
        },
        dataType: "json",
        success: function(response) {
            mensajeNotificacion('La partida se registro correctamente', 'success');
            $('#contenedorPrincipalPartida').addClass('oculto');
            $('#reiniciarPartida').removeClass('oculto');
        }
    });
}

function saltarEjercicio() {
    avanza();
}

// FUNCION PARA AVANZAR AL SGTE. EJERCICIO
function avanza() {
    if (nivel_actual <= 3) {
        if (nro_ejercicio < 2) {
            nro_ejercicio++;
            nuevo();
        } else {
            reiniciaConteo();
            nro_ejercicio = 1;
            nivel_actual++;
            var audio = new Audio($('#public_path').val() + 'lvl.m4a');
            audio.play();
            nuevo();
        }
        if (nivel_actual == 4) {
            enviaPuntaje();
        }
    } else {
        enviaPuntaje();
    }
    if (nivel_actual <= 3) {
        txt_nivel.text(nivel_actual + `- ${nro_ejercicio}`);
    }
}

function ajustarAncho() {
    let imagenes = $('#contenedor_imgs').children('li.imagen');
    if (imagenes.length > 0) {
        imagenes.each(function() {
            $(this).css('width', $(this).width());
            // $(this).css('height', '100%');
        });
    }
}