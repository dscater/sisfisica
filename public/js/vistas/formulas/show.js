let contenedor_imgs = $('#contenedor_imgs');
let contenedor_pasos = $('#contenedor_pasos');
let btnRevisar = $('#btnRevisar');
let formPasos = $('#formPasos');
$(document).ready(function() {
    iniciaDrag();

    contenedor_pasos.on('click', '.remover', function() {
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
        contenedor_imgs.append(nueva_imagen);
        ennumeraPasos();
        iniciaDrag();
    });


    // CAMBIAR IMAGEN DEL EJERCICIO
    $('body').on('change', '#foto', function(e) {
        addImage(e);
    });

    function addImage(e) {
        var file = e.target.files[0],
            imageType = /image.*/;

        if (!file.type.match(imageType))
            return;

        var reader = new FileReader();
        reader.onload = fileOnload;
        reader.readAsDataURL(file);
    }

    function fileOnload(e) {
        $('#cancelar').show();
        $('#guardar_img').show();
        var result = e.target.result;
        $('#imagen_p').attr("src", result);
    }

    /* ***************************************
                    DRAG AND DROP
    ***************************************** */
    contenedor_pasos.droppable({
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
            contenedor_pasos.append(nuevo_paso);
            ennumeraPasos();
            inciaDragPaso();
        },
        activate: function() {},
        deactivate: function() {}
    });

    $("ul, li").disableSelection(); //para que funcione el sortable draggable

    // REVISAR LOS PASOS
    btnRevisar.click(function() {
        $.ajax({
            type: "GET",
            url: formPasos.attr('action'),
            dataType: "json",
            data: formPasos.serialize(),
            success: function(response) {
                $('.mensaje_info').removeClass('oculto');
                if (response.sw) {
                    $('.mensaje_info').removeClass('alert-danger');
                    $('.mensaje_info').addClass('alert-success');
                    $('.mensaje_info').text('Muy bien resolviste el ejercicio correctamente.');
                } else {
                    $('.mensaje_info').removeClass('alert-success');
                    $('.mensaje_info').addClass('alert-danger');
                    $('.mensaje_info').text('Los pasos no estan de forma correcta, revisa e intentalo nuevamente.');
                }
            }
        });
    });
});

function iniciaDrag() {
    $('.imagen').draggable({
        cancel: "a.ui-icon", // clicking an icon won't initiate dragging
        revert: "invalid", // when not dropped, the item will revert back to its initial position
        containment: "document",
        helper: "clone",
        cursor: "move"
    });
}

function inciaDragPaso() {
    contenedor_pasos.sortable({
        revert: true,
        update: function() {
            ennumeraPasos();
        }
    });
}

function ennumeraPasos() {
    let pasos = contenedor_pasos.children('li.paso_imagen');
    let contador_pasos = 0;
    if (pasos.length > 0) {
        btnRevisar.prop('disabled', false);
        pasos.each(function() {
            contador_pasos++;
            $(this).children('.acciones').children('input.nro_paso').val(contador_pasos);
        });
    } else {
        btnRevisar.prop('disabled', true);
    }
}