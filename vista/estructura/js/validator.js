$("#form-carga").bootstrapValidator({
    message: 'Este valor no es valido',
    fields: {
        acnombre: {
            validators: {
                notEmpty: {
                    message: 'El nombre no puede ser vacio',
                }
            }
        },
        idusuario: {
            validators: {
                notEmpty: {
                    message: 'Debe seleccionar el usuario'
                }
            }
        },
        acedescripcion: {
            validators: {
                notEmpty: {
                    message: 'Debe completar el motivo'
                }
            }
        }
    }
})

$(document).on('change', 'input[type="file"]', function () {
    var fileName = this.files[0].name;
    info = fileName.split('.'); //separa el name del archivo usando como separador '.', quedando en info[0] el nombre y en info[1] el tipo
    switch (info[1]) {
        case 'jpeg': $('#imagen').attr('checked', true); break;
        case 'png': $('#imagen').attr('checked', true); break;
        case 'zip': $('#zip').attr('checked', true); break;
        case 'docx': $('#doc').attr('checked', true); break;
        case 'pdf': $('#pdf').attr('checked', true); break;
        case 'xlsx': $('#xls').attr('checked', true); break;
        default: $('#imagen').attr('checked', true); break;
    }
})

$('#input_password').keyup(function () {
    clave = $('#input_password').val();
    if ((/^[a-z]+$/i.test(clave) || /^[0-9]+$/.test(clave)) && clave.length < 6) {
        $('#fortaleza_clave').text('Password debil');
        $('#fortaleza_clave').css("color", "#ff0000");
    } else if (/^[0-9a-zA-Z]+$/.test(clave) && clave.length > 6) {
        $('#fortaleza_clave').text('Password normal');
        $('#fortaleza_clave').css("color", "#d2db00");
    }
})

$('#generarHash').on('click', function () {
    random = Math.floor((Math.random() * 1000) + 1); //Numero aleatorio entre 1 y 1000
    dias = $('#input_dias').val();
    descargas = $('#input_descargas').val();
    name = $('#input_name').val();

    if (dias == '' || descargas == '') {
        valor_hash = 9007199254740991;
    } else {
        valor_hash = random + dias * descargas;
    }

    $('#div_hash').removeClass('d-none');
    $('#link_hash').text(valor_hash);
    $('#link_hash').attr('href', "#");
})