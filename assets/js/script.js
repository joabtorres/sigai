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
if (document.nFormCCA) {
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


    $(document).ready(function () {
        if (typeof setor_id !== 'undefined') {
            if (setor_id !== null) {
                if (typeof id_usuario !== 'undefined') {
                    if (id_usuario !== null) {
                        selectSetor(setor_id, id_usuario);
                    }
                } else {
                    selectSetor(setor_id);
                }
            }
        }
    });
    function selectSetor(setor_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iUsuario").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "cca/getusuarios", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("setor_id=" + setor_id);
    }
    function selectSetor(setor_id, user_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iUsuario").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "cca/getusuarios", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("setor_id=" + setor_id + "&id_user=" + user_id);
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

function valida_formUsuario() {
    form = document.nFormUsuario;
    if (null_or_empty("iSetor")
            || null_or_empty("iNome")
            || null_or_empty("iUsuario")
            || null_or_empty("iEmail")
            || null_or_empty("iSenha")
            || null_or_empty("iRepetirSenha"))
    {
        $(form).addClass('was-validated');
        console.log(form);
    }

}
function valida_formUsuarioEdit() {
    form = document.nFormUsuario;
    if (null_or_empty("iSetor")
            || null_or_empty("iNome")
            || null_or_empty("iUsuario")
            || null_or_empty("iEmail"))
    {
        $(form).addClass('was-validated');
        console.log(form);
    }

}
function valida_formEmpresa() {
    form = document.nFormEmpresa;
    if (null_or_empty("iNome")
            || null_or_empty("iAbrevicao")
            || null_or_empty("iEndereco")
            || null_or_empty("iCEP")
            || null_or_empty("iCNPJ")
            || null_or_empty("iTelefone")
            || null_or_empty("iEmail"))
    {
        $(form).addClass('was-validated');
        console.log(form);
    }

}
function readURLEmpresa(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#iImgEmpresa").attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
;

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
        $("#viewImagem-1").attr('src', base_url + 'assets/imagens/user.png');
        if ($("#iImagem-user").val() !== null) {
            $("#iImagem-user").val(null);
        }
    };
}