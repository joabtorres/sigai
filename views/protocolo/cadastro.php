<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Novo Registro de Protocolo</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> Protocolo</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo BASE_URL ?>protocolo/cadastro"><i class="fas fa-plus-square"></i> Novo Registro de Protocolo</a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->

    </div>
    <div class="row">
        <div class="col">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="aluffaert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
            </div>
        </div>
    </div>
    <!--<div class="row">-->
    <!--fim row-->
    <div class="row">
        <div class="col">
            <form method="POST" action="<?php echo BASE_URL ?>protocolo/cadastro" enctype="multipart/form-data" autocomplete="off"  name="nFormProtocolo">
                <input type="hidden" name="nId" value="<?php echo!empty($arrayCad['id']) ? $arrayCad['id'] : 0; ?>"/>
                <section class="card bg-light border-secondary">
                    <header class="card-header bg-dark text-while">
                        <h1 class="card-title h5 my-1"><i class="fas fa-plus-square"></i> Dados do Novo Registro</h1>
                    </header>
                    <article class="card-body">

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for='iTipo'>Tipo do Protocolo: * </label><br/>
                                <select class="custom-select" name="nTipo" id="iTipo" required onchange="selectTipoProtocolo(this.value)">
                                    <?php
                                    if (!isset($arrayCad['tipo_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo de protocolo </option>';
                                    }
                                    foreach ($tipo_protocolo as $indice) {
                                        if (isset($arrayCad['tipo_id']) && $indice['id'] == $arrayCad['tipo_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['tipo'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['tipo'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o tipo do protocolo</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='iObjetivo'>Objetivo do Pedido: * </label><br/>
                                <select class="custom-select" name="nObjetivo" id="iObjetivo" required>
                                    <?php
                                    if (!isset($arrayCad['objetivo_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o objetivo do pedido </option>';
                                    }
                                    foreach ($protocolo_objetivo as $indice) {
                                        if (isset($arrayCad['objetivo_id']) && $indice['id'] == $arrayCad['objetivo_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['objetivo'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['objetivo'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o objetivo do pedido</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='iNumeroProtocolo'>Número do Protocolo: *</label><br/>
                                <input type="text" name="nNumeroProtocolo"  class="form-control" id="iNumeroProtocolo" placeholder="Exemplo: 01380/2020" value="<?php echo!empty($arrayCad['numero_protocolo']) ? $arrayCad['numero_protocolo'] : $numero_protocolo; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o número do protocolo
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='iData'>Data do Protocolo: *</label><br/>
                                <input type="text" name="nData"  class="form-control input-data date_serach" id="iData" placeholder="Exemplo: 27/10/2020" value="<?php echo!empty($arrayCad['data']) ? $this->formatDateView($arrayCad['data']) : $this->formatDateView($this->getDataNow()); ?>" required>
                                <div class="invalid-feedback">
                                    Informe a data do protocolo
                                </div>
                            </div>

                        </div>
                        <!--<div class="row">;;;-->
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <label for='iInteressado'>Interessado/Empreendimento: *</label><br/>
                                <input type="text" name="nInteressado"  class="form-control" id="iInteressado" placeholder="Exemplo: COORDENADORIA DE LICENCIAMENTO AMBIENTAL - SEMMA CASTANHALL" value="<?php echo!empty($arrayCad['interessado']) ? $arrayCad['interessado'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o interessado
                                </div>
                            </div>                            
                            <div class="col-md-3 mb-3">
                                <label for='iContato'>Contato: </label><br/>
                                <input type="text" name="nContato"  class="form-control" id="iContato" placeholder="Exemplo: (99) 99224455 / email@gmail.com" value="<?php echo!empty($arrayCad['contato']) ? $arrayCad['contato'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe um meio contato
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for='iNFolhas'>Nº de Folhas: *</label><br/>
                                <input type="text" name="nFolhas"  class="form-control" id="iNFolhas" placeholder="Exemplo: 50" value="<?php echo!empty($arrayCad['numero_folhas']) ? $arrayCad['numero_folhas'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o nº de folhas
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">;;;-->
                        <div class="row">
                            <div class="col mb-3">
                                <label for='iVincular'>Vincular ao processo: <small class="text-success"> --- Utilize esta opção quando for protocola um documento que faça parte de um processo</small> </label><br/>
                                <select class="custom-select select2-js" name="nVincula" id="iVincular">
                                    <?php
                                    if (!isset($arrayCad['processo'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione um processo (ação opcional)</option>';
                                    }
                                    foreach ($protocolos as $indice) {
                                        if (isset($arrayCad['processo']) && $indice['id'] == $arrayCad['processo']) {
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
                        <div class="row">
                            <div class="col mb-3">
                                <label for='iAssunto'>Assunto: *</label><br/>
                                <textarea rows="2" name="nAssunto"  class="form-control" id="iAssunto" placeholder="Exemplo: Solicitação de Cancelamento de Licença Ambiental Rural - LAR Nº 11/2016" required><?php echo!empty($arrayCad['assunto']) ? $arrayCad['assunto'] : ''; ?></textarea>
                                <div class="invalid-feedback">
                                    Informe o assunto do documento / processo.
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">-->
                        <div class="row">
                            <div class="col mb-3">
                                <label for='iObservacao'>Observações: </label><br/>
                                <textarea rows="5" name="nObservacao"  class="form-control" id="iObservacao" placeholder="Exemplo: Descreva observações complementares a respeitodo do processo / protocolo" ><?php echo!empty($arrayCad['descricao']) ? $arrayCad['descricao'] : ''; ?></textarea>
                                <div class="invalid-feedback">
                                    Informe uma descrição
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">-->
                    </article>
                    <!--<article class="card-body">-->
                </section>
                <!--<section class="card">-->
                <section class="card bg-light border-secondary mt-3">
                    <header class="card-header bg-dark text-while">
                        <h1 class="card-title h5 my-1"><i class="fas fa-search-location"></i> Endereço</h1>
                    </header>
                    <article class="card-body">
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for='iCidade'>Cidade: </label><br/>
                                <select class="select-single custom-select" name="nCidade" id="iCidade"  onchange="selectBairro(this.value)">
                                    <?php
                                    if (!isset($arrayCad['cidade'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione a cidade </option>';
                                    }
                                    foreach ($cidade as $indice) {
                                        if (isset($arrayCad['cidade']) && $indice['id'] == $arrayCad['cidade']) {
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
                                <label for='iBairro'>Bairro: </label><br/>
                                <select class="custom-select" name="nBairro" id="iBairro">
                                    <?php
                                    if (!isset($arrayCad['bairro'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o bairro </option>';
                                    }

                                    foreach ($bairro as $indice) {
                                        if (isset($arrayCad['bairro']) && $indice['id'] == $arrayCad['bairro']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['bairro'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['bairro'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o bairro</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for='iEndereco'>Endereço / Complemento:  </label><br/>
                                <input type="text" name="nEndereco"  class="form-control" id="iEndereco" placeholder="Exemplo: Próximo a Praça do Estrela" value="<?php echo!empty($arrayCad['endereco']) ? $arrayCad['endereco'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe o endereço
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for='iNumero'>Número:  </label><br/>
                                <input type="text" name="nNumero"  class="form-control" id="iNumero" placeholder="Exemplo: S/N" value="<?php echo!empty($arrayCad['numero']) ? $arrayCad['numero'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe o número
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
                                <input type="text" name="nLatitude"  class="form-control" id="cLatitude" placeholder="Exemplo: -1.2955583054409823" value="<?php echo!empty($arrayCad['latitude']) ? $arrayCad['latitude'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe o Assunto
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for='cLongitude'>Longitude:  </label><br/>
                                <input type="text" name="nLongitude"  class="form-control" id="cLongitude" placeholder="Exemplo: -47.91926629129639" value="<?php echo!empty($arrayCad['longitude']) ? $arrayCad['longitude'] : ''; ?>" >
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
                </section>
                <!--<section class="card">-->
                <div class="row mt-3">
                    <div class="form-group col">
                        <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="valida_formProtocolo()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
