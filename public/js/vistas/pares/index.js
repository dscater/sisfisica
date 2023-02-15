let contenedor_principal = $('#contenedor_principal');
let total_pares = 15;
let encontrados = 0;
let activo = 0;

let array_elementos = [
    `<div class="elemento" data-el="0"> 1 Km.</div>`,
    `<div class="elemento" data-el="1"> 1000 M.</div>`,

    `<div class="elemento" data-el="2"> 1 Cm.</div>`,
    `<div class="elemento" data-el="3"> 10 mm.</div>`,

    `<div class="elemento" data-el="4"> 1 M.</div>`,
    `<div class="elemento" data-el="5"> 100 cm.</div>`,

    `<div class="elemento" data-el="6"> 1 Pie.</div>`,
    `<div class="elemento" data-el="7"> 12 Pulgadas.</div>`,

    `<div class="elemento" data-el="8"> 1 pulgada.</div>`,
    `<div class="elemento" data-el="9"> 2,54 cm.</div>`,

    `<div class="elemento" data-el="10"> 1 yarda.</div>`,
    `<div class="elemento" data-el="11"> 91,44 cm.</div>`,

    `<div class="elemento" data-el="12"> 1 Legua.</div>`,
    `<div class="elemento" data-el="13"> 5 Km.</div>`,

    `<div class="elemento" data-el="14"> 1 Kg.</div>`,
    `<div class="elemento" data-el="15"> 1000 Gr.</div>`,

    `<div class="elemento" data-el="16"> 1 libra.</div>`,
    `<div class="elemento" data-el="17"> 453,5 g.</div>`,

    `<div class="elemento" data-el="18"> 1 m3</div>`,
    `<div class="elemento" data-el="19"> 1000 l.</div>`,

    `<div class="elemento" data-el="20"> 1 N.</div>`,
    `<div class="elemento" data-el="21"> 10^5 dina.</div>`,

    `<div class="elemento" data-el="22"> 1 Kw.</div>`,
    `<div class="elemento" data-el="23"> 1000 W.</div>`,

    `<div class="elemento" data-el="24"> 1 t métrica</div>`,
    `<div class="elemento" data-el="25"> 1000 kg.</div>`,

    `<div class="elemento" data-el="26"> 1 Kgr.</div>`,
    `<div class="elemento" data-el="27"> 9,8 N.</div>`,

    `<div class="elemento" data-el="28"> 1 barril</div>`,
    `<div class="elemento" data-el="29"> 159 L.</div>`,
];

let pares = ['01', '23', '45', '67', '89', '1011', '1213', '1415', '1617', '1819', '2021', '2223', '2425', '2627', '2829', '10', '32', '54', '76', '98', '1110', '1312', '1514', '1716', '1918', '2120', '2322', '2524', '2726', '2928'];
$(document).ready(function() {
    carga();
    $('#recargar').click(carga);
    contenedor_principal.on('click', '.elemento', function() {
        let elemento_actual = $(this);
        if (!elemento_actual.hasClass('encontrado')) {
            if (activo == 1) {
                activo = 1;
                if (elemento_actual.hasClass('activado')) {
                    elemento_actual.removeClass('activado');
                    activo = 0;
                } else {
                    // VERIFICAR PAR
                    let actual_activo = $('#contenedor_principal .elemento.activado');
                    let data_el1 = actual_activo.attr('data-el');
                    let data_el2 = elemento_actual.attr('data-el');
                    console.log(data_el1 + '' + data_el2);
                    console.log(pares.indexOf(data_el1 + '' + data_el2) + " XX");
                    if (pares.indexOf(data_el1 + '' + data_el2) > -1) {
                        actual_activo.removeClass('activado');
                        actual_activo.addClass('encontrado');
                        elemento_actual.addClass('encontrado');
                        activo = 0;
                    }
                }
            } else if (activo == 0) {
                // PONER ESTADO ACTIVO
                console.log('asdasdasdasd');
                elemento_actual.addClass('activado');
                activo = 1;
            }
        }
        console.log(activo);
        return;
    });
});

function carga() {
    array_elementos = array_elementos.sort(function() {
        return Math.random() - 0.5
    });
    contenedor_principal.html('Cargando...');
    let elementos_cargados = ``;
    for (let i = 0; i < array_elementos.length; i++) {
        elementos_cargados += array_elementos[i];
    }
    contenedor_principal.html(elementos_cargados);
}

function encuentra_par() {

}