/**
 * @author Joab Torres Alencar
 * @description classes para tratamento de preenchimento de campos
 */
$(document).ready(function () {
    $('.select2-js').select2({
        width: '100%'
    });
    $('.input-data').mask("99/99/9999");
    $('.input-dias').mask("999");
    $('.input-data-complete').mask("99/99/9999 99:99:99");
    $('.input-cpf').mask("999.999.999-99");

    $(".date_serach").datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: 'dd/mm/yy'
    });

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

    $("[data-hide]").on("click", function () {
        $("#alert-msg").toggle().addClass('oculta');
    });
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});



function null_or_empty(str) {
    var v = document.getElementById(str).value;
    return v == null || v == "";
}
//form do chamado ti
if (document.nFormCCA) {
    function valida_formCCA() {
        form = document.nFormCCA;
        if (null_or_empty("iSetor")
                || null_or_empty("iUsuario")
                || null_or_empty("iAssunto")
                || null_or_empty("iDescricao"))
        {
            $(form).addClass('was-validated');

        } else {
            form.submit();
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
        console.log(setor_id);
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iUsuario").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "ti/getusuarios", true);
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
        xhttp.open("POST", base_url + "ti/getusuarios", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("setor_id=" + setor_id + "&id_user=" + user_id);
    }
}
if (document.formCCASearch) {
    function selectSetor(setor_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iUsuario").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "ti/getusuariossearch", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("setor_id=" + setor_id);
    }
}
//form do historico do chamado
if (document.nFormCCAChamado) {
    function valida_formChamado() {
        form = document.nFormCCAChamado;
        if (null_or_empty("iSetor")
                || null_or_empty("iData")
                || null_or_empty("iDescricao"))
        {
            $(form).addClass('was-validated');
        } else {
            form.submit();
        }

    }
}
//form do protocolo anexo
if (document.nFormProtocoloAnexo) {
    function valida_formChamado() {
        form = document.nFormProtocoloAnexo;
        if (null_or_empty("iDescricao")
                || null_or_empty("iAnexo"))
        {
            $(form).addClass('was-validated');
        } else {
            form.submit();
        }

    }
}
//form de tramitacao
if (document.nFormTramitacao) {
    function valida_formTramitacao() {
        form = document.nFormTramitacao;
        if (null_or_empty("iSetorRemetente")
                || null_or_empty("iUsuarioRemetente")
                || null_or_empty("iSetorDestinatario")
                || null_or_empty("iUsuarioDestinatario")
                || null_or_empty("iData"))
        {
            $(form).addClass('was-validated');
        } else {
            form.submit();
        }

    }
    function selectSetorRemetente(setor_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iUsuarioRemetente").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "tramitacao/getusuarios", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("setor_id=" + setor_id);
    }

    function selectSetorDestinatario(setor_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iUsuarioDestinatario").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "tramitacao/getusuarios", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("setor_id=" + setor_id);
    }
}
//form do usuario
if (document.nFormUsuario) {
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
        } else {
            form.submit();
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
        } else {
            form.submit();
        }
    }
}
//form da empresa
if (document.nFormEmpresa) {
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
        } else {
            form.submit();
        }

    }
    //carrega a imagem da logo da empresa
    function readURLEmpresa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#iImgEmpresa").attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
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
        $("#viewImagem-1").attr('src', base_url + 'assets/imagens/user.png');
        if ($("#iImagem-user").val() !== null) {
            $("#iImagem-user").val(null);
        }
    };
}
if (document.nFormCOFISCDenuncia) {
    /*
     * Google mapas
     */
    var geocoder;
    var map;
    var marker;
    function initialize() {
        if (document.getElementById("cLatitude").value != '' && document.getElementById("cLongitude").value != '') {
            var latlng = new google.maps.LatLng(document.getElementById("cLatitude").value, document.getElementById("cLongitude").value);
        } else {
            var latlng = new google.maps.LatLng(-1.2955583054409823, -47.91926629129639);
        }
        var options = {
            zoom: 14,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("viewMapa"), options);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
            map: map,
            draggable: true
        });
        marker.setPosition(latlng);

        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#cEndereco').val(results[0].formatted_address);
                        $('#cLatitude').val(marker.getPosition().lat());
                        $('#cLongitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
    }

    function loadScriptGoogleMapsAPI() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&callback=initialize';
        document.body.appendChild(script);
    }

    function carregarNoMapa(endereco) {
        geocoder.geocode({'address': endereco + ', Brasil', 'region': 'BR'}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    $('#cEndereco').val(results[0].formatted_address);
                    $('#cLatitude').val(latitude);
                    $('#cLongitude').val(longitude);
                    var location = new google.maps.LatLng(latitude, longitude);
                    marker.setPosition(location);
                    map.setCenter(location);
                    map.setZoom(16);
                }
            }
        });
    }
    loadScriptGoogleMapsAPI();
    $(document).ready(function () {
        $("#btnEndereco").click(function () {
            if ($(this).val() !== "")
                carregarNoMapa($("#txtEndereco").val());
        });
        $("#cEndereco").blur(function () {
            if ($(this).val() !== "")
                carregarNoMapa($(this).val());
        });
    });
    function selectTipoDenuncia(tipo_protocolo) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iTipoDocumento").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "fisc/get_tipo_documento", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("protocolo_id=" + tipo_protocolo);
    }

    function selectBairro(cidade_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iBairro").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "fisc/get_bairro", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cidade_id=" + cidade_id);
    }

    function validarFormCOFISCDenuncia() {
        var form = document.nFormCOFISCDenuncia;
        if (null_or_empty("iData")
                || null_or_empty("iTipoProtocolo")
                || null_or_empty("iTipoDocumento")
                || null_or_empty("iOrigem")
                || null_or_empty("iNumeroProtocolo")
                || null_or_empty("iAnoProtocolo")
                || null_or_empty("iTecnico")
                || null_or_empty("iStatus")
                || null_or_empty("iTipoDenuncia")
                || null_or_empty("iDenunciado")
                || null_or_empty("iCidade")
                || null_or_empty("iBairro"))
        {
            $(form).addClass('was-validated');
        } else {
            form.submit();
        }
    }
}

if (document.nFormCOFISCSolicitacao) {
    /*
     * Google mapas
     */
    var geocoder;
    var map;
    var marker;
    function initialize() {
        if (document.getElementById("cLatitude").value != '' && document.getElementById("cLongitude").value != '') {
            var latlng = new google.maps.LatLng(document.getElementById("cLatitude").value, document.getElementById("cLongitude").value);
        } else {
            var latlng = new google.maps.LatLng(-1.2955583054409823, -47.91926629129639);
        }
        var options = {
            zoom: 14,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("viewMapa"), options);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
            map: map,
            draggable: true
        });
        marker.setPosition(latlng);

        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#cEndereco').val(results[0].formatted_address);
                        $('#cLatitude').val(marker.getPosition().lat());
                        $('#cLongitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
    }

    function loadScriptGoogleMapsAPI() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&callback=initialize';
        document.body.appendChild(script);
    }

    function carregarNoMapa(endereco) {
        geocoder.geocode({'address': endereco + ', Brasil', 'region': 'BR'}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    $('#cEndereco').val(results[0].formatted_address);
                    $('#cLatitude').val(latitude);
                    $('#cLongitude').val(longitude);
                    var location = new google.maps.LatLng(latitude, longitude);
                    marker.setPosition(location);
                    map.setCenter(location);
                    map.setZoom(16);
                }
            }
        });
    }
    loadScriptGoogleMapsAPI();
    $(document).ready(function () {
        $("#btnEndereco").click(function () {
            if ($(this).val() !== "")
                carregarNoMapa($("#txtEndereco").val());
        });
        $("#cEndereco").blur(function () {
            if ($(this).val() !== "")
                carregarNoMapa($(this).val());
        });
    });
    function selectTipoDenuncia(tipo_protocolo) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iTipoDocumento").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "fisc/get_tipo_documento", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("protocolo_id=" + tipo_protocolo);
    }

    function selectBairro(cidade_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iBairro").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "fisc/get_bairro", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cidade_id=" + cidade_id);
    }

    function validarFormCOFISCSolicitacao() {
        var form = document.nFormCOFISCSolicitacao;
        if (null_or_empty("iData")
                || null_or_empty("iTipoProtocolo")
                || null_or_empty("iTipoDocumento")
                || null_or_empty("iOrigem")
                || null_or_empty("iNumeroProtocolo")
                || null_or_empty("iAnoProtocolo")
                || null_or_empty("iTipoDenuncia")
                || null_or_empty("iSolicitante")
                || null_or_empty("iCidade")
                || null_or_empty("iBairro"))
        {
            $(form).addClass('was-validated');
        } else {
            form.submit();
        }
    }
}

if (document.formSearhCofisc) {
    function selectTipoDenuncia(tipo_protocolo) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iTipoDocumento").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "fisc/get_search_tipo_documento", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("protocolo_id=" + tipo_protocolo);
    }

    function selectBairro(cidade_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iBairro").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "fisc/get_bairro", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cidade_id=" + cidade_id);
    }
}

if (document.nFormProtocolo) {
    function valida_formProtocolo() {
        form = document.nFormProtocolo;
        if (null_or_empty("iTipo")
                || null_or_empty("iObjetivo")
                || null_or_empty("iNumeroProtocolo")
                || null_or_empty("iData")
                || null_or_empty("iInteressado")
                || null_or_empty("iNFolhas")
                || null_or_empty("iAssunto"))
        {
            $(form).addClass('was-validated');

        } else {
            form.submit();
        }

    }
    function selectTipoProtocolo(tipo_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iObjetivo").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "protocolo/get_tipo_protocolo", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("tipo_id=" + tipo_id);
    }

    function selectBairro(cidade_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iBairro").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "protocolo/get_bairro", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cidade_id=" + cidade_id);
    }

    /*
     * Google mapas
     */
    var geocoder;
    var map;
    var marker;
    function initialize() {
        if (document.getElementById("cLatitude").value != '' && document.getElementById("cLongitude").value != '') {
            var latlng = new google.maps.LatLng(document.getElementById("cLatitude").value, document.getElementById("cLongitude").value);
        } else {
            var latlng = new google.maps.LatLng(-1.2955583054409823, -47.91926629129639);
        }
        var options = {
            zoom: 14,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById("viewMapa"), options);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
            map: map,
            draggable: true
        });
        marker.setPosition(latlng);

        google.maps.event.addListener(marker, 'drag', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#cEndereco').val(results[0].formatted_address);
                        $('#cLatitude').val(marker.getPosition().lat());
                        $('#cLongitude').val(marker.getPosition().lng());
                    }
                }
            });
        });
    }

    function loadScriptGoogleMapsAPI() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&callback=initialize';
        document.body.appendChild(script);
    }

    function carregarNoMapa(endereco) {
        geocoder.geocode({'address': endereco + ', Brasil', 'region': 'BR'}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    $('#cEndereco').val(results[0].formatted_address);
                    $('#cLatitude').val(latitude);
                    $('#cLongitude').val(longitude);
                    var location = new google.maps.LatLng(latitude, longitude);
                    marker.setPosition(location);
                    map.setCenter(location);
                    map.setZoom(16);
                }
            }
        });
    }
    loadScriptGoogleMapsAPI();
    $(document).ready(function () {
        $("#btnEndereco").click(function () {
            if ($(this).val() !== "")
                carregarNoMapa($("#txtEndereco").val());
        });
        $("#cEndereco").blur(function () {
            if ($(this).val() !== "")
                carregarNoMapa($(this).val());
        });
    });
}

if (document.formPROTOCOLOSearch) {
    function selectTipoProtocolo(tipo_id) {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("iObjetivo").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", base_url + "protocolo/get_tipo_protocoloSerach", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("tipo_id=" + tipo_id);
    }
}

if (document.getElementById('viewMapa2')) {
    function initialize() {
        if ((typeof latitude !== "undefined") && (typeof longitude !== "undefined")) {
            var latlng = new google.maps.LatLng(latitude, longitude);
        } else {
            var latlng = new google.maps.LatLng(-1.2955583054409823, -47.91926629129639);
        }
        var options = {
            zoom: 14,
            center: latlng,
        };
        map = new google.maps.Map(document.getElementById("viewMapa2"), options);
        marker = new google.maps.Marker({
            map: map
        });
        marker.setPosition(latlng);
    }
    function loadScriptGoogleMapsAPI() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&callback=initialize';
        document.body.appendChild(script);
    }
    loadScriptGoogleMapsAPI();
}