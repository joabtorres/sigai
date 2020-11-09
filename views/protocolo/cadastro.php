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
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
            </div>
        </div>
    </div>
    <!--<div class="row">-->
    <!--fim row-->
    <div class="row">
        <div class="col">
            <form method="POST" action="<?php echo BASE_URL ?>cca/cadastro" enctype="multipart/form-data" autocomplete="off"  name="nFormCCA">
                <input type="hidden" name="nId" value="<?php echo!empty($chamado['id']) ? $chamado['id'] : 0; ?>"/>
                <section class="card bg-light border-success">
                    <header class="card-header bg-success">
                        <h1 class="card-title h5 my-1"><i class="fas fa-plus-square"></i> Dados do Novo Registro</h1>
                    </header>
                    <article class="card-body">

                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for='iTipo'>Tipo do Protocolo: * </label><br/>
                                <select class="custom-select" name="nTipo" id="iSetor" required>
                                    <?php
                                    $array = array('Documento', 'Processo');
                                    if (!isset($chamado['setor_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o setor </option>';
                                    }
                                    for ($i = 0; $i < count($array); $i++) {
                                        if (isset($chamado['setor_id']) && $array[$i] == $chamado['setor_id']) {
                                            echo '<option value = "' . $array[$i] . '" selected = "selected">' . $array[$i] . '</option>';
                                        } else {
                                            echo '<option value = "' . $array[$i] . '">' . $array[$i] . '</option>';
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
                                    $array = array('Documento', 'Processo');
                                    if (!isset($chamado['setor_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o setor </option>';
                                    }
                                    for ($i = 0; $i < count($array); $i++) {
                                        if (isset($chamado['setor_id']) && $array[$i] == $chamado['setor_id']) {
                                            echo '<option value = "' . $array[$i] . '" selected = "selected">' . $array[$i] . '</option>';
                                        } else {
                                            echo '<option value = "' . $array[$i] . '">' . $array[$i] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o objetivo do pedido</div>
                            </div>
                            <div class="col-md-3 mb-3"
                                 <label for='iNumeroProtocolo'>Número do Protocolo: *</label><br/>
                                <input type="text" name="nNumeroProtocolo"  class="form-control mt-2" id="iNumeroProtocolo" placeholder="Exemplo: 01380/2020/DOC" value="<?php echo!empty($chamado['assunto']) ? $chamado['assunto'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o número do protocolo
                                </div>
                            </div>
                            <div class="col-md-3 mb-3"
                                 <label for='iData'>Data do Protocolo: *</label><br/>
                                <input type="text" name="nData"  class="form-control input-data mt-2" id="iData" placeholder="Exemplo: 27/10/2020" value="<?php echo!empty($chamado['assunto']) ? $chamado['assunto'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe a data do protocolo
                                </div>
                            </div>

                        </div>
                        <!--<div class="row">;;;-->
                        <div class="row">
                            <div class="col-md-8 mb-3"
                                 <label for='iAssunto'>Interessado/Empreendimento: *</label><br/>
                                <input type="text" name="nAssunto"  class="form-control mt-2" id="iAssunto" placeholder="Exemplo: COORDENADORIA DE LICENCIAMENTO AMBIENTAL - SEMMA CASTANHALL" value="<?php echo!empty($chamado['assunto']) ? $chamado['assunto'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o Assunto
                                </div>
                            </div>                            
                            <div class="col-md-2 mb-3"
                                 <label for='iAssunto'>Telefone para Contato: </label><br/>
                                <input type="text" name="nAssunto"  class="form-control mt-2 input-" id="iAssunto" placeholder="Exemplo: (999) 99999-9999" value="<?php echo!empty($chamado['assunto']) ? $chamado['assunto'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o Assunto
                                </div>
                            </div>
                            <div class="col-md-2 mb-3"
                                 <label for='iAssunto'>Número de Folhas: *</label><br/>
                                <input type="text" name="nAssunto"  class="form-control mt-2" id="iAssunto" placeholder="Exemplo: 50" value="<?php echo!empty($chamado['assunto']) ? $chamado['assunto'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o Assunto
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">;;;-->
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for='iTipo'>Referente ao processo: * </label><br/>
                                <select class="custom-select" name="nTipo" id="iSetor" required>
                                    <?php
                                    $array = array('Protocolo: 222321/2020/PROC - Interessado: JOAB TORRES ALENCAR', 'Processo');
                                    if (!isset($chamado['setor_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o setor </option>';
                                    }
                                    for ($i = 0; $i < count($array); $i++) {
                                        if (isset($chamado['setor_id']) && $array[$i] == $chamado['setor_id']) {
                                            echo '<option value = "' . $array[$i] . '" selected = "selected">' . $array[$i] . '</option>';
                                        } else {
                                            echo '<option value = "' . $array[$i] . '">' . $array[$i] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">Informe o tipo do protocolo</div>
                            </div>
                            <div class="col mb-3"
                                 <label for='iAssunto'>Assunto: *</label><br/>
                                <textarea rows="3" name="nDescricao"  class="form-control mt-2" id="iDescricao" placeholder="Exemplo: Solícito através deste chamado a criação de um novo usuário de acesso aos computadores..." required><?php echo!empty($chamado['descricao']) ? $chamado['descricao'] : ''; ?></textarea>
                                <div class="invalid-feedback">
                                    Informe uma descrição
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">-->
                        <div class="row">
                            <div class="col mb-3"
                                 <label for='iDescricao'>Observações: </label><br/>
                                <textarea rows="5" name="nDescricao"  class="form-control mt-2" id="iDescricao" placeholder="Exemplo: Solícito através deste chamado a criação de um novo usuário de acesso aos computadores..." ><?php echo!empty($chamado['descricao']) ? $chamado['descricao'] : ''; ?></textarea>
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
                <section class="card bg-light border-success mt-3">
                    <header class="card-header bg-success">
                        <h1 class="card-title h5 my-1"><i class="fas fa-search-location"></i> Endereço</h1>
                    </header>
                    <article class="card-body">
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for='iCidade'>Cidade: </label><br/>
                                <select class="select-single custom-select" name="nCidade" id="iCidade"  onchange="selectBairro(this.value)">
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
                                <label for='iBairro'>Bairro: </label><br/>
                                <select class="custom-select" name="nBairro" id="iBairro">
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
                            <div class="col-md-6 mb-3"
                                 <label for='iEndereco'>Endereço / Complemento:  </label><br/>
                                <input type="text" name="nEndereco"  class="form-control mt-2" id="iEndereco" placeholder="Exemplo: Próximo a Praça do Estrela" value="<?php echo!empty($arrayCad['denuncia']['endereco']) ? $arrayCad['denuncia']['endereco'] : ''; ?>">
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
                            <div class="col-md-6 mb-3"
                                 <label for='cLatitude'>Latitude:  </label><br/>
                                <input type="text" name="nLatitude"  class="form-control mt-2" id="cLatitude" placeholder="Exemplo: -1.2955583054409823" value="<?php echo!empty($arrayCad['denuncia']['latitude']) ? $arrayCad['denuncia']['latitude'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe o Assunto
                                </div>
                            </div>
                            <div class="col-md-6 mb-3"
                                 <label for='cLongitude'>Longitude:  </label><br/>
                                <input type="text" name="nLongitude"  class="form-control mt-2" id="cLongitude" placeholder="Exemplo: -47.91926629129639" value="<?php echo!empty($arrayCad['denuncia']['longitude']) ? $arrayCad['denuncia']['longitude'] : ''; ?>" >
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
                        <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="valida_formCCA()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
