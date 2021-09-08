<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Nova Denúncia</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> Fiscalização</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo BASE_URL ?>fisc_denuncia/cadastro"><i class="fas fa-plus-square"></i> Nova Denúncia</a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->

    </div>
    <div class="row">
        <div class="col">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
            </div>
        </div>
    </div>
    <!--<div class="row">-->
    <!--fim row-->
    <div class="row">
        <div class="col">
            <form method="POST" action="<?php echo BASE_URL ?>fisc_denuncia/cadastro" enctype="multipart/form-data" autocomplete="off"  name="nFormCOFISCDenuncia">
                <input type="hidden" name="nId" value="<?php echo!empty($arrayCad['denuncia']['id']) ? $arrayCad['denuncia']['id'] : 0; ?>"/>
                <section class="card bg-light border-success mb-4">
                    <header class="card-header bg-success">
                        <h1 class="card-title h5 my-1"><i class="fas fa-file-alt"></i> Tramitação</h1>
                    </header>
                    <article class="card-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for='iVincular'>Vincular protocolo de tramitação: <small class="text-success"> --- Utilize esta opção quando for vincular a denuncia a um protocolo da tramitação</small> </label><br/>
                                <select class="custom-select select2-js" name="nTramitacao" id="iVincular">
                                    <?php
                                    if (!isset($arrayCad['protocolo']['tramitacao'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione um protocolo (ação opcional)</option>';
                                    }
                                    echo '<option value="0" >Não vincula a protocolo de tramitação</option>';
                                    foreach ($protocolos as $indice) {
                                        if (isset($arrayCad['protocolo']['tramitacao']) && $indice['id'] == $arrayCad['protocolo']['tramitacao']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">Protocolo: ' . $indice['numero_protocolo'] . ' - Interessado: ' . $indice['interessado'] . ' - Data: ' . $this->formatDateView($indice['data']) . ' - Objetivo do Pedido: ' . $indice['objetivo'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">Protocolo: ' . $indice['numero_protocolo'] . ' - Interessado: ' . $indice['interessado'] . ' - Data: ' . $this->formatDateView($indice['data']) . ' - Objetivo do Pedido: ' . $indice['objetivo'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o processo a ser vinculado</div>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="card bg-light border-success">
                    <header class="card-header bg-success">
                        <h1 class="card-title h5 my-1"><i class="fas fa-file-alt"></i> Dados do Protocolo</h1>
                    </header>
                    <article class="card-body">
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for='iData'>Data do Protocolo: *</label><br/>
                                <input type="text" name="nData"  class="form-control date_serach" id="iData" placeholder="Exemplo: dd/mm/aaaa" value="<?php echo!empty($arrayCad['protocolo']['data_protocolo']) ? $this->formatDateView($arrayCad['protocolo']['data_protocolo']) : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe a data
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='iTipoProtocolo'>Tipo de Protocolo: * </label><br/>
                                <select class="select-single custom-select" name="nTipoProtocolo" id="iTipoProtocolo" required onchange="selectTipoDenuncia(this.value)">
                                    <?php
                                    if (!isset($arrayCad['protocolo']['protocolo_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo de protocolo </option>';
                                    }
                                    foreach ($tipo_protocolo as $indice) {
                                        if (isset($arrayCad['protocolo']['protocolo_id']) && $indice['id'] == $arrayCad['protocolo']['protocolo_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['tipo_protocolo'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['tipo_protocolo'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o tipo do protocolo</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='iTipoDocumento'>Tipo de Documento: * </label><br/>
                                <select class="select-single custom-select" name="nTipoDocumento" id="iTipoDocumento" required>
                                    <?php
                                    if (!isset($arrayCad['protocolo']['tipo_documento_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo de documento </option>';
                                    }
                                    foreach ($documento as $indice) {
                                        if (isset($arrayCad['protocolo']['tipo_documento_id']) && $indice['id'] == $arrayCad['protocolo']['tipo_documento_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['documento'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['documento'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o tipo do documento</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='iOrigem'>Origem: * </label><br/>
                                <select class="select-single custom-select" name="nOrigem" id="iOrigem" required>
                                    <?php
                                    if (!isset($arrayCad['protocolo']['origem_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione a origem </option>';
                                    }
                                    foreach ($origem as $indice) {
                                        if (isset($arrayCad['protocolo']['origem_id']) && $indice['id'] == $arrayCad['protocolo']['origem_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['origem'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['origem'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe a origem</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col mb-3">
                                <label for='iNumeroProtocolo'>Número de Protocolo: *</label><br/>
                                <input type="text" name="nNumeroProtocolo"  class="form-control " id="iNumeroProtocolo" placeholder="Exemplo: 12344" value="<?php echo!empty($arrayCad['protocolo']['numero_protocolo']) ? $arrayCad['protocolo']['numero_protocolo'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe número do protocolo
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for='iAnoProtocolo'>Ano do Protocolo : *</label><br/>
                                <input type="text" name="nAnoProtocolo"  class="form-control " id="iAnoProtocolo" placeholder="Exemplo: 2019" value="<?php echo!empty($arrayCad['protocolo']['ano_protocolo']) ? $arrayCad['protocolo']['ano_protocolo'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o ano do protocolo 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for='iNumeroOficio'>Número de Ofício: </label><br/>
                                        <input type="text" name="nNumeroOficio"  class="form-control " id="iNumeroOficio" placeholder="Exemplo: 444" value="<?php echo!empty($arrayCad['protocolo']['numero_oficio']) ? $arrayCad['protocolo']['numero_oficio'] : ''; ?>" >
                                        <div class="invalid-feedback">
                                            Informe o número do oficio
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <label for='iAnoOficio'>Ano do Ofício:</label><br/>
                                        <input type="text" name="nAnoOficio"  class="form-control " id="iAnoOficio" placeholder="Exemplo: 2019" value="<?php echo!empty($arrayCad['protocolo']['ano_oficio']) ? $arrayCad['protocolo']['ano_oficio'] : ''; ?>" >
                                        <div class="invalid-feedback">
                                            Informe o ano do ofício 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for='iNumeroMemorando'>Número de Memorando: </label><br/>
                                        <input type="text" name="nNumeroMemorando"  class="form-control " id="iNumeroMemorando" placeholder="Exemplo: 5544" value="<?php echo!empty($arrayCad['protocolo']['numero_memorando']) ? $arrayCad['protocolo']['numero_memorando'] : ''; ?>" >
                                        <div class="invalid-feedback">
                                            Informe o Assunto
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <label for='iAnoMemorando'>Ano do Memorando: </label><br/>
                                        <input type="text" name="nAnoMemorando"  class="form-control " id="iAnoMemorando" placeholder="Exemplo: 2019" value="<?php echo!empty($arrayCad['protocolo']['ano_memorando']) ? $arrayCad['protocolo']['ano_memorando'] : ''; ?>" >
                                        <div class="invalid-feedback">
                                            Informe o ano do memorando
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col mb-3">
                                        <label for='iOrgaoSolicitante'>Orgão Solicitante: </label><br/>
                                        <select class="select-single custom-select " name="nOrgaoSolicitante" id="iOrgaoSolicitante"">
                                            <?php
                                            if (!isset($arrayCad['protocolo']['id_solicitante'])) {
                                                echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo de protocolo </option>';
                                            }
                                            foreach ($solicitante as $indice) {
                                                if (isset($arrayCad['protocolo']['id_solicitante']) && $indice['id'] == $arrayCad['protocolo']['id_solicitante']) {
                                                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['solicitante'] . '</option>';
                                                } else {
                                                    echo '<option value = "' . $indice['id'] . '">' . $indice['solicitante'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">Informe o tipo do protocolo</div>
                                    </div>
                                    <div class="col mb-3">
                                        <label for='iPrazoResposta'>Prazo de resposta: <small class="text-success">- Em dias</small></label><br/>
                                        <input type="text" name="nPrazoResposta"  class="form-control  input-dias" id="iPrazoResposta" placeholder="Exemplo: 015 / 030 / 120" value="<?php echo!empty($arrayCad['protocolo']['prazo']) ? $arrayCad['protocolo']['prazo'] : ''; ?>" >
                                        <div class="invalid-feedback">
                                            Informe o ano do memorando
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!--<article class="card-body">-->
                </section>
                <section class="card bg-light mt-4 border-success">
                    <header class="card-header bg-success">
                        <h1 class="card-title h5 my-1"><i class="fas fa-file-alt"></i> Denúncia</h1>
                    </header>
                    <article class="card-body">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for='iTecnico'>Técnico Responsável: * </label><br/>
                                <select class="select-single custom-select" name="nTecnico" id="iTecnico" required>
                                    <?php
                                     if (!isset($arrayCad['denuncia']['usuario_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o técnico responsável</option>';
                                    }
                                    foreach ($tecnicos as $indice) {
                                        if (isset($arrayCad['denuncia']['usuario_id']) && $indice['id'] == $arrayCad['denuncia']['usuario_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['nome'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['nome'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o técnico responsável</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for='iStatus'>Status da Denúncia: * </label><br/>
                                <select class="select-single custom-select" name="nStatus" id="iStatus" required>
                                    <?php
                                    $status = array(array('id' => 1, 'status' => 'Em andamento'), array('id' => 2, 'status' => 'Finalizado'));
                                    if (!isset($arrayCad['denuncia']['status'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o status </option>';
                                    }
                                    foreach ($status as $indice) {
                                        if (isset($arrayCad['denuncia']['status']) && $indice['id'] == $arrayCad['denuncia']['status']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['status'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['status'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe status da denúncia</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for='iTipoDenuncia'>Tipo de Denúncia: * </label><br/>
                                <select class="select-single custom-select" name="nTipoDenuncia" id="iTipoDenuncia" required>
                                    <?php
                                    if (!isset($arrayCad['denuncia']['tipo_denuncia_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo da denúncia </option>';
                                    }
                                    foreach ($tipo_denuncia as $indice) {
                                        if (isset($arrayCad['denuncia']['tipo_denuncia_id']) && $indice['id'] == $arrayCad['denuncia']['tipo_denuncia_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['tipo_denuncia'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['tipo_denuncia'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o tipo da denúncia</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for='iDenunciado'>Denunciado: * </label><br/>
                                <input type="text" name="nDenunciado"  class="form-control " id="iDenunciado" placeholder="Exemplo: Empresa X" value="<?php echo!empty($arrayCad['denuncia']['denunciado']) ? $arrayCad['denuncia']['denunciado'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o Denunciado
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col mb-3">
                                <label for='iDescricao'>Descrição: </label><br/>
                                <textarea rows="5" name="nDescricao"  class="form-control" id="iDescricao" placeholder="Descreva informações adicionais sobre a denúncia (opcional)" ><?php echo!empty($arrayCad['denuncia']['descricao']) ? $arrayCad['denuncia']['descricao'] : ''; ?></textarea>
                                <div class="invalid-feedback">
                                    Informe uma descrição
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for='iCidade'>Cidade: * </label><br/>
                                <select class="select-single custom-select" name="nCidade" id="iCidade" required onchange="selectBairro(this.value)">
                                    <?php
                                    if (!isset($arrayCad['denuncia']['cidade_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione a cidade </option>';
                                    }
                                    foreach ($cidade as $indice) {
                                        if (isset($arrayCad['denuncia']['cidade_id']) && $indice['id'] == $arrayCad['denuncia']['cidade_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['cidade'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['cidade'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe a cidade</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='iBairro'>Bairro: * </label><br/>
                                <select class="custom-select" name="nBairro" id="iBairro" required>
                                    <?php
                                    if (!isset($arrayCad['denuncia']['bairro_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o bairro </option>';
                                    }

                                    foreach ($bairro as $indice) {
                                        if (isset($arrayCad['solicitacao']['bairro_id']) && $indice['id'] == $arrayCad['solicitacao']['bairro_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['bairro'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['bairro'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o bairro</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for='iEndereco'>Endereço / Complemento:  </label><br/>
                                <input type="text" name="nEndereco"  class="form-control" id="iEndereco" placeholder="Exemplo: Próximo a Praça do Estrela" value="<?php echo!empty($arrayCad['denuncia']['endereco']) ? $arrayCad['denuncia']['endereco'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe o endereço
                                </div>
                            </div>
                            <div class="col-md-10 mb-3">
                                <label for="cEndereco">Endereço via mapa:</label>
                                <input type="text" name="tEndereco" id="cEndereco" class="form-control">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Pesquisar Endereço:</label>
                                <span class="btn btn-danger btn-block form-control" id="btnEndereco"><i class="fas fa-search-location"></i> Pesquisar</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for='cLatitude'>Latitude:  </label><br/>
                                <input type="text" name="nLatitude"  class="form-control " id="cLatitude" placeholder="Exemplo: -1.2955583054409823" value="<?php echo!empty($arrayCad['denuncia']['latitude']) ? $arrayCad['denuncia']['latitude'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe o Assunto
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for='cLongitude'>Longitude:  </label><br/>
                                <input type="text" name="nLongitude"  class="form-control " id="cLongitude" placeholder="Exemplo: -47.91926629129639" value="<?php echo!empty($arrayCad['denuncia']['longitude']) ? $arrayCad['denuncia']['longitude'] : ''; ?>" >
                                <div class="invalid-feedback">
                                    Informe o Assunto
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" id="viewMapa">

                            </div>
                        </div>                        
                    </article>
                    <!--<article class="card-body">-->
                </section>
                <div class="row ">
                    <div class="col">
                        <section class="card bg-light mt-3 border-success">
                            <header class="card-header bg-success">
                                <h1 class="card-title h5 my-1"><i class="fas fa-street-view"></i> Denunciante</h1>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for='iDenunciante'>Nome:  </label><br/>
                                        <input type="text" name="nDenunciante"  class="form-control " id="iDenunciante" placeholder="Exemplo: Joab Torres Alencar" value="<?php echo!empty($arrayCad['denuncia']['denunciante']) ? $arrayCad['denuncia']['denunciante'] : ''; ?>" >
                                        <div class="invalid-feedback">
                                            Informe o denunciante
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for='iTelefone'>Telefone:  </label><br/>
                                        <input type="text" name="nTelefone"  class="form-control " id="iTelefone" placeholder="Exemplo: (99) 99999-9999 / (98) 99999-9999" value="<?php echo!empty($arrayCad['denuncia']['telefone']) ? $arrayCad['denuncia']['telefone'] : ''; ?>" >
                                        <div class="invalid-feedback">
                                            Informe o telefone
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for='iEmail'>Email:  </label><br/>
                                        <input type="email" name="nEmail"  class="form-control " id="iEmail" placeholder="Exemplo: joab@gmail.com" value="<?php echo!empty($arrayCad['denuncia']['email']) ? $arrayCad['denuncia']['email'] : ''; ?>" >
                                        <div class="invalid-feedback">
                                            Informe o email
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="form-group col">
                        <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="validarFormCOFISCDenuncia()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
                <!--<section class="card">-->
            </form>
        </div>
    </div>
</div>
