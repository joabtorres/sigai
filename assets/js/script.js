/**
 * @author Joab Torres Alencar
 * @description classes para tratamento de preenchimento de campos
 */
$(document).ready(function () {
    $('.input-data').mask("99/99/9999");
    $('.input-data-complete').mask("99/99/9999 99:99:99");
    $('.input-cpf').mask("999.999.999-99");
});
$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});
$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
$("[data-hide]").on("click", function () {
    $("#alert-msg").toggle().addClass('oculta');
});

function null_or_empty(str) {
    var v = document.getElementById(str).value;
    return v == null || v == "";
}

function valida_formCCA() {
    form = document.nFormCCA;
    if (null_or_empty("iSetor")
            || null_or_empty("iUsuario")
            || null_or_empty("iAssunto")
            || null_or_empty("iDescricao"))
    {
        $(form).addClass('was-validated');
        console.log(form);
    }

}

function valida_formChamado() {
    form = document.nFormCCAChamado;
    if (null_or_empty("iSetor")
            || null_or_empty("iData")
            || null_or_empty("iDescricao"))
    {
        $(form).addClass('was-validated');
        console.log(form);
    }

}


/**
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
 */

if (document.getElementById("container-usuario-form")) {
    /**
     * @author Joab Torres <joabtorres1508@gmail.com>
     * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
     */
    readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var num = input.name.replace("tImagem-", "");
            reader.onload = function (e) {
                $("#viewImagem-" + num).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
    /**
     * @author Joab Torres <joabtorres1508@gmail.com>
     * @description Este codigo abaixo é responsável para fazer o carregamento da imagem setada pelo usuário ao muda a foto do perfil
     */
    readDefaultURL = function () {
        var valor = $('input[name=nSexo]:checked').val();
        $("#viewImagem-1").attr('src', base_url+'assets/imagens/user.png');
        if ($("#iImagem-user").val() !== null) {
            $("#iImagem-user").val(null);
        }
    };
}