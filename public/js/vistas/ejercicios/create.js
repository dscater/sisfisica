Dropzone.autoDiscover = false; //Evitar que los elementos con clase .dropzone se creen automaticamente
let contador = 1;
let contenedor_imgs = $('#contenedor_imgs');
let contenedor_pasos = $('#contenedor_pasos');
let btnGuardar = $('#btnGuardar');
$(document).ready(function() {
    ennumeraPasos();
    iniciaDrag();
    inciaDragPaso();
    ajustarAncho();
    /****************************
            INICIO DROPZONE
    ****************************/
    var mi_dropzone = new Dropzone('#cargaArchivos', {
        acceptedFiles: 'image/*',
        url: $('#urlCargaPasos').val(),
        maxFiles: 10,
        params: {
            contador: contador
        },
        method: 'post',
        headers: { 'X-CSRF-TOKEN': $('#token').val() },
        autoProcessQueue: true, //sube la imagen automaticamente
        async: false,
        parallelUploads: 1, //envia 10 por 10 los archivos (no de forma simultanea)
        dictDefaultMessage: "<span>Haz click aquí para subir imágenes<span>",
        init: function() {
            this.on('success', function(file, resp) {
                contador++;
                $('#contenedor_imgs').append(resp.imagen);
                iniciaDrag();
                ajustarAncho();
            });
        },
    });

    mi_dropzone.on("queuecomplete", function() {
        this.removeAllFiles();
    });


    // mi_dropzone.on("complete", function(file) {
    //     mi_dropzone.removeFile(file);
    // });

    /* ELIMINAR IMAGENES */
    contenedor_imgs.on('click', '.eliminar_imagen', function() {
        let imagen = $(this).closest('.imagen');
        let url = $(this).attr('data-url');
        if (imagen.hasClass('existe')) {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('#token').val() },
                type: "DELETE",
                url: url,
                dataType: "json",
                success: function(response) {
                    imagen.remove();
                }
            });
        } else {
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    imagen.remove();
                }
            });
        }
    });

    contenedor_pasos.on('click', '.remover', function() {
        let paso_removido = $(this).parents('.paso_imagen');
        let nueva_imagen = paso_removido.clone();
        paso_removido.remove();
        nueva_imagen.removeClass('paso_imagen');
        nueva_imagen.addClass('imagen');
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
        ajustarAncho();
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

    // CAMBIAR IMAGEN DEL EJERCICIO2
    $('body').on('change', '#foto2', function(e) {
        addImage2(e);
    });

    function addImage2(e) {
        var file = e.target.files[0],
            imageType = /image.*/;

        if (!file.type.match(imageType))
            return;

        var reader = new FileReader();
        reader.onload = fileOnload2;
        reader.readAsDataURL(file);
    }

    function fileOnload2(e) {
        $('#cancelar2').show();
        $('#guardar_img2').show();
        var result = e.target.result;
        $('#imagen_p2').attr("src", result);
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
            nuevo_paso.children('.acciones').children('button').removeClass('btn-danger');
            nuevo_paso.children('.acciones').children('button').removeClass('eliminar');
            nuevo_paso.children('.acciones').children('button').addClass('btn-primary');
            nuevo_paso.children('.acciones').children('button').addClass('remover');
            nuevo_paso.children('.acciones').children('button').children('i').removeClass('fa-trash');
            nuevo_paso.children('.acciones').children('button').children('i').addClass('fa-redo-alt');
            nuevo_paso.css('width', '100%');
            contenedor_pasos.append(nuevo_paso);
            ennumeraPasos();
            inciaDragPaso();
        },
        activate: function() {},
        deactivate: function() {}
    });

    $("ul, li").disableSelection();
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
        classes: {
            "ui-sortable": "highlight"
        },
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

function cambiar() {
    var pdrs = document.getElementById('foto').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
}

function cambiar2() {
    var pdrs = document.getElementById('foto2').files[0].name;
    document.getElementById('info2').innerHTML = pdrs;
}

function ennumeraPasos() {
    let pasos = contenedor_pasos.children('li.paso_imagen');
    let contador_pasos = 0;
    if (pasos.length > 0) {
        btnGuardar.prop('disabled', false);
        pasos.each(function() {
            contador_pasos++;
            $(this).children('.acciones').children('input.nro_paso').val(contador_pasos);
        });
    } else {
        btnGuardar.prop('disabled', true);
    }
}

function ajustarAncho() {
    let imagenes = contenedor_imgs.children('li.imagen');
    if (imagenes.length > 0) {
        imagenes.each(function() {
            $(this).css('width', $(this).width());
            // $(this).css('height', '100%');
        });
    }
}