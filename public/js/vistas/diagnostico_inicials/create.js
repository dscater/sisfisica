let btnAgregaOpcion = $('#btnAgregaOpcion');
let contenedor_opciones = $('#contenedor_opciones');
let incisos = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
let btnEnviaFormulario = $('#btnEnviaFormulario');

let opcion = `<li class="elemento">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text inciso">a)</span>
                        </div>
                        <input type="text" class="form-control" name="opcion[]" placeholder="Enunciado" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="hidden" name="existe_id[]" value="0">
                                <input type="radio" name="correcto" class="correcto" value="" required>
                            </div>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text eliminar"><i class="fa fa-trash fa-sm"></i></span>
                        </div>
                    </div>
                </li>`;

$(document).ready(function() {
    realizaConteo();
    lista_incisos();

    btnAgregaOpcion.click(function() {
        let nueva_opcion = $(opcion).clone();
        contenedor_opciones.append(nueva_opcion);
        lista_incisos();
    });

    contenedor_opciones.on('click', '.eliminar', function() {
        let li = $(this).closest('li');
        if (li.hasClass('existe')) {
            let url = $(this).attr('data-url');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('#token').val() },
                type: "DELETE",
                url: url,
                data: "data",
                dataType: "json",
                success: function(response) {

                }
            });
        }
        li.remove();
        lista_incisos();
    });
});

function lista_incisos() {
    let opciones = contenedor_opciones.children('li');
    let cont = 0;
    realizaConteo();
    opciones.each(function() {
        $(this).find('input.correcto').val(cont);
        $(this).find('span.inciso').text(incisos[cont] + ') ');
        cont++;
    });
}

function realizaConteo() {
    let opciones = contenedor_opciones.children('li');
    if (opciones.length > 0) {
        btnEnviaFormulario.prop('disabled', false);
    } else {
        btnEnviaFormulario.prop('disabled', true);
    }
}