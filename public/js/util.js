//Modal carregando
var modalCarregando = undefined;

// Adicionar csrf as requisições ajax
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Adicionar url servidor as requisições ajax
$.ajaxPrefilter(function( options ) {
    if ( !options.crossDomain ) {
        options.url = $('meta[name="contexto"]').attr('content') + options.url;
    }
});

$(document).ready(function () {
    // Mascaras
    $(".mask-cnpj").inputmask("99.999.999/9999-99");
    $(".mask-cpf").inputmask("999.999.999-99");
    $(".mask-cep").inputmask("99.999-999");
    $(".mask-data").inputmask("99/99/9999");
    $(".mask-hora").inputmask("99:99");

    // Chosen
    $(".form-control-chosen").chosen();

    modalCarregando = $('#modal-carregando');

});

// Configuracoes no plugin validator
$.validator.setDefaults({
    ignore: ":hidden:not(.form-control-chosen)",
    highlight: function(element) {
        $(element).closest('.form-control').addClass('is-invalid');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('is-invalid');
    },
    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function(error, element) {
        if ( element.is(":radio") ) {
            error.insertAfter( element.parent().parent());
        } else if (element.is("select.form-control-chosen")) {
            element.next("div.chosen-container").append(error);
        } else if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else if(element.parent('.form-control').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});
// Validação de data no formato dd/mm/yyyy
$.validator.addMethod("dateBR", function( value, element ) {
    return this.optional(element) || /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(value);
}, "Data inválida");
// Validação de hora no formato hh:mm
$.validator.addMethod("horaBR", function (value, element) {
    if (value.length != 5) return false;
    let data = value;
    let hor = data.substr(0, 2);
    let se1 = data.substr(2, 1);
    let min = data.substr(3, 2);
    if (data.length != 5 || se1 != ':' || isNaN(hor) || isNaN(min)){
        return false;
    }
    if (!((hor>=0 && hor<=23) && (min>=0 && min<=59))){
        return false;
    }
    return true;
}, "Hora inválida");
// Limpar validação
$.fn.clearValidation = function(){let v = $(this).validate();$('[name]',this).each(function(){v.successList.push(this);v.showErrors();});v.resetForm();v.reset();};
function limparForm(form) {
    form.clearValidation();
    form[0].reset();
    form.find("input").each(function (index, element) {
        $(element).removeClass('is-invalid');
    });
    form.find("input[type='hidden']:not(input[name='_csrf'])").each(function (index, element) {
        $(element).val('');
    });
    form.find("select").each(function (index, element) {
        $(element).val('');
    });
    $('.form-control-chosen').trigger("chosen:updated");
}
function enviarForm(form, funcao) {
    $.ajax({
        type: 'POST',
        data: $(form).serialize(),
        url: $(form).attr('action'),
        scriptCharset: "utf-8",
        contentType: 'application/x-www-form-urlencoded',
        beforeSend: function () {
            modalCarregando.modal('show');
        },
        complete: function () {
            modalCarregando.modal('hide');
        },
        success: function (response) {
            if (response.status === 'ok') {
                funcao(response);
                toastr.success(response.message);
            } else if(response.status === 'warning') {
                toastr.warning(response.message);
            } else {
                toastr.error(response.message);
            }
        },
        error: function (xhr, status, error) {
            modalCarregando.modal('hide');
            toastr.error("Ocorreu um nesta operação: Erro " + xhr.status);
        }
    });
}
function executaPost(url, funcao) {
    $.ajax({
        type: "POST",
        url: url,
        beforeSend: function () {
            modalCarregando.modal('show');
        },
        complete: function () {
            modalCarregando.modal('hide');
        },
        success: function(response) {
            if (response.status === 'ok') {
                funcao(response);
            } else if(response.status === 'warning') {
                toastr.warning(response.message);
            } else {
                toastr.error(response.message);
            }
        },
        error: function (xhr, status, error) {
            modalCarregando.modal('hide');
            toastr.error("Ocorreu um nesta operação: Erro " + xhr.status);
        }
    });
}
function inserirLinha(tabela, conteudoLinha) {
    tabela.find('tbody').prepend(conteudoLinha);
    atualizaQtdRegistro(1);
}
function alterarLinha(linha, conteudoLinha) {
    linha.fadeIn(1000, function () {
        linha.replaceWith(conteudoLinha);
    });
}
function apagarLinha(linha) {
    linha.fadeOut(1000, function () {
        linha.remove();
        atualizaQtdRegistro(-1);
    });
}
function atualizaQtdRegistro(variacao) {
    let qtd = $('.app-qtd-registro').data("qtd-registro");
    qtd = qtd + variacao;
    $('.app-qtd-registro').data("qtd-registro", qtd);
    let txt = (qtd > 0) ? qtd + ' registro(s) encontrado(s)' : 'Nenhum registro encontrado';
    $('.app-qtd-registro').text(txt);
}
function toDate(value) {
    return (value) ? moment(value).format("DD/MM/YYYY") : '';
}
function toHour(value) {
    return (value) ? moment(value).format("hh:mm") : '';
}
function toDateTime(value) {
    return (value) ? `${moment(value).format("DD/MM/YYYY - hh:mm")}h` : '';
}
function toDatePeriodo(inicio, fim, conector='-') {
return (inicio && fim) ? `${moment(inicio).format("DD/MM/YYYY")} ${conector} ${moment(fim).format("DD/MM/YYYY")}` : '';
}
$(document).on("click", "#btn-limpar-cache", function (event) {
    event.preventDefault();
    modalCarregando.modal('show');
    $.get("/suporte/limpar", function(response){
        modalCarregando.modal('hide');
        if ( response.status === 'ok' ) {
            toastr.success(response.message);
        }
        else {
            toastr.error( response.message);
        }
    }).fail(function() {
        modalCarregando.modal('hide');
        toastr.error('Erro de sistema ao tentar limpar o cache');
    });
});
$(document).on('change', '.numero', function (event) {
    let numero = parseInt($(this).val());
    if(!Number.isNaN(numero)) {
        $(this).val(numero);
    }
});

