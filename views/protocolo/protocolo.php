<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Protocolo: Nº <?php echo (isset($result) && !empty($result['numero_protocolo'])) ? $result['numero_protocolo'] : ''; ?></h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> Protocolo</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>protocolo/consultar"><i class="fas fa-tasks"></i> Consultar Protocolo</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo BASE_URL ?>protocolo/protocolo/<?php echo md5($result['id']); ?>">Protocolo: Nº <?php echo (isset($result) && !empty($result['numero_protocolo'])) ? $result['numero_protocolo'] : ''; ?> </a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary btn-sm pull-right" href="<?php echo BASE_URL . 'protocolo/editar/' . md5($result['id']); ?>" title="Editar"><i class="fa fa-pencil-alt"></i> Editar</a>  
        </div>
    </div>
    <div class="row">
        <div class="col">
            <section class="card my-3 border-secondary">
                <header class="card-header bg-dark text-while">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleProtocolo" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-info-circle"></i> Dados do Protocolo<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleProtocolo">
                    <article class="card-body py-0">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Tipo do protocolo:</div> 
                                <?php echo (isset($result) && !empty($result['tipo'])) ? $result['tipo'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Objetivo do pedido:</div> 
                                <?php echo (isset($result) && !empty($result['objetivo'])) ? $result['objetivo'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <p class="text-justify"><div class="text-success font-bold">Nº do protocolo:</div> 
                                <?php echo (isset($result) && !empty($result['numero_protocolo'])) ? $result['numero_protocolo'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-2">
                                <p class="text-justify"><div class="text-success font-bold">Data:</div> 
                                <?php echo (isset($result) && !empty($result['data'])) ? $this->formatDateView($result['data']) : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-justify"><div class="text-success font-bold">Nº de folhas:</div> 
                                <?php echo (isset($result) && !empty($result['numero_folhas'])) ? $result['numero_folhas'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-5">
                                <p class="text-justify"><div class="text-success font-bold">Interessado:</div> 
                                <?php echo (isset($result) && !empty($result['interessado'])) ? $result['interessado'] : ''; ?>

                                </p>
                            </div>
                            <div class="col-md-5">
                                <p class="text-justify"><div class="text-success font-bold">Contato:</div> 
                                <?php echo (isset($result) && !empty($result['contato'])) ? $result['contato'] : ''; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-justify"><div class="text-success font-bold">Assunto:</div> 
                                <i> <?php echo (isset($result) && !empty($result['assunto'])) ? $result['assunto'] : ''; ?> </i>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-justify"><div class="text-success font-bold">Observações:</div> 
                                <i> <?php echo (isset($result) && !empty($result['descricao'])) ? $result['descricao'] : ''; ?> </i>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
            <section class="card my-3 border-secondary">
                <header class="card-header bg-dark text-while">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleEndereco" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-map-marker-alt"></i> Endereço<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleEndereco">
                    <article class="card-body py-0">
                        <div class="row">
                            <div class="col-md-2">
                                <p class="text-justify"><div class="text-success font-bold">Cidade:</div> 
                                <?php echo (isset($result) && !empty($result['cidade'])) ? $result['cidade'] : ''; ?>     
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Bairro:</div> 
                                <?php echo (isset($result) && !empty($result['bairro'])) ? $result['bairro'] : ''; ?>     
                                </p>
                            </div>
                            <div class="col-md-5">
                                <p class="text-justify"><div class="text-success font-bold">Endereço/Complemento:</div> 
                                <?php echo (isset($result) && !empty($result['endereco'])) ? $result['endereco'] : ''; ?>       
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p class="text-justify"><div class="text-success font-bold">Numero:</div> 
                                <?php echo (isset($result) && !empty($result['numero'])) ? $result['numero'] : ''; ?>     
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <?php echo (isset($result) && !empty($result['latitude'])) ? '<script> var latitude="' . $result['latitude'] . '" </script>' : ''; ?>     
                            <?php echo (isset($result) && !empty($result['longitude'])) ? '<script> var longitude="' . $result['longitude'] . '" </script>' : ''; ?>     
                            <div class="col bg-secondary mb-1" id="viewMapa2">
                            </div>
                        </div>
                    </article>
                </div>
            </section>
            <section class="card my-3 border-secondary">
                <header class="card-header bg-dark text-while">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleVinculado" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-list"></i> Protocolos vinculados<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleVinculado">
                    <div class="table-responsive d-flex">
                        <!--table-->
                        <table class="table table-bordered table-sm table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" width="50px" >#</th>
                                    <th scope="col" >Tipo</th>
                                    <th scope="col" >Nº do Protocolo</th>
                                    <th scope="col" >Data</th>
                                    <th scope="col" width="100px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($vinculados) && !empty($vinculados)) {
                                    $qtd = 1;
                                    foreach ($vinculados as $indice):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td><?php echo (isset($indice) && !empty($indice['tipo'])) ? $indice['tipo'] : ''; ?> </td>
                                            <td><?php echo (isset($indice) && !empty($indice['numero_protocolo'])) ? $indice['numero_protocolo'] : ''; ?> </td>
                                            <td> <?php echo (isset($indice) && !empty($indice['data'])) ? $this->formatDateView($indice['data']) : ''; ?>  </td>
                                            <td class="text-center">
                                                <a class="btn btn-outline-success btn-sm" href="<?php echo BASE_URL . 'protocolo/protocolo/' . md5($indice['id']); ?>" title="Visualizar"><i class="fa fa-eye"></i></a> 
                                            </td>
                                        </tr>
                                        <?php
                                        $qtd++;
                                    endforeach;
                                } else {
                                    echo '<tr><td scope="col" colspan="5">Nenhum registro encontrado</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--table-->  
                    </div>
                </div>
            </section>
            <section class="card my-3 border-secondary">
                <header class="card-header bg-dark text-while">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleAnexo" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-file-alt"></i> Anexos <i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleAnexo">
                    <article class="card-body py-0">
                        <div class="row">
                            <div class="col-12 my-2">
                                <button class="btn btn-sm btn-outline-warning pull-right" type="button" data-toggle="modal" data-target="#modal_anexo" title="Adicionar"><i class="fas fa-plus-square"></i> Adicionar</button>
                            </div>                       
                        </div>                    
                    </article>
                    <div class="table-responsive d-flex">
                        <!--table-->
                        <table class="table table-bordered table-sm table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" width="50px" >#</th>
                                    <th scope="col" >Descrição</th>
                                    <th scope="col" width="100px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($anexos) && !empty($anexos)) {
                                    $qtd = 1;
                                    foreach ($anexos as $indice):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td><?php echo (isset($indice) && !empty($indice['descricao'])) ? $indice['descricao'] : ''; ?> </td>
                                            <td class="text-center">
                                                <?php
                                                if (!empty($indice['anexo'])) {
                                                    $file = explode('/', $indice['anexo']);
                                                    $fileName = end($file);
                                                }
                                                ?>
                                                <a class="btn btn-outline-success btn-sm" href="<?php echo BASE_URL . $indice['anexo']; ?>" title="Download" download="<?php echo!empty($fileName) ? $fileName : '' ?>"><i class="fas fa-download"></i></a> 
                                                <?php
                                                if ($this->checkSetor() == 10):
                                                    ?>
                                                    <button type="button"  class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_anexoexcluir_<?php echo md5($indice['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $qtd++;
                                    endforeach;
                                } else {
                                    echo '<tr><td scope="col" colspan="5">Nenhum registro encontrado</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--table-->  
                    </div>
                </div>
            </section>

            <section class="card my-3 border-secondary">
                <header class="card-header bg-dark text-while">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleHistorico" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-list"></i> Histórico<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleHistorico">
                    <article class="card-body py-0">
                        <div class="row">
                            <div class="col-12 my-2">
                                <button class="btn btn-sm btn-outline-warning pull-right" type="button" data-toggle="modal" data-target="#modal_historico" title="Adicionar"><i class="fas fa-plus-square"></i> Adicionar</button>
                            </div>                       
                        </div>                    
                    </article>
                    <div class="table-responsive d-flex">
                        <!--table-->
                        <table class="table table-bordered table-sm table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" width="50px" >#</th>
                                    <th scope="col" >Data</th>
                                    <th scope="col" >Usuário</th>
                                    <th scope="col" >Descrição</th>
                                    <?php
                                    if ($this->checkSetor() == 10):
                                        ?>
                                        <th scope="col" width="100px">Ação</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($historico) && !empty($historico)) {
                                    $qtd = 1;
                                    foreach ($historico as $indice):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td> <?php echo (isset($indice) && !empty($indice['data'])) ? $this->formatDateView($indice['data']) : ''; ?>  </td>
                                            <td><?php echo (isset($indice) && !empty($indice['nome'])) ? $indice['nome'] : ''; ?> </td>
                                            <td><?php echo (isset($indice) && !empty($indice['descricao'])) ? $indice['descricao'] : ''; ?> </td>
                                            <?php
                                            if ($this->checkSetor() == 10):
                                                ?>
                                                <td class="text-center">
                                                    <button type="button"  class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_historico_<?php echo md5($indice['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php
                                        $qtd++;
                                    endforeach;
                                } else {
                                    echo '<tr><td scope="col" colspan="5">Nenhum registro encontrado</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--table-->  
                    </div>
                </div>
            </section>

            <section class="card my-3 border-secondary">
                <header class="card-header bg-dark text-while">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampletramitacao" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-copy"></i> Tramitação<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampletramitacao">
                    <article class="card-body py-0">
                        <div class="row">
                            <div class="col-12 my-2">
                                <button class="btn btn-sm btn-outline-warning pull-right" type="button" data-toggle="modal" data-target="#modal_tramitacao" title="Adicionar"><i class="fas fa-plus-square"></i> Adicionar</button>
                            </div>                       
                        </div>                    
                    </article>
                    <div class="table-responsive d-flex">
                        <!--table-->
                        <table class="table table-bordered table-sm table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" width="50px" >#</th>
                                    <th scope="col" >Data</th>
                                    <th scope="col" >Setor Remetente</th>
                                    <th scope="col" >Setor Destino</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($tramitacao) && !empty($tramitacao)) {
                                    $qtd = 1;
                                    foreach ($tramitacao as $indice):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td> <?php echo (isset($indice) && !empty($indice['data'])) ? $this->formatDateView($indice['data']) : ''; ?>  </td>
                                            <td><?php echo (isset($indice) && !empty($indice['setor_remetente'])) ? $indice['setor_remetente'] : ''; ?> </td>
                                            <td><?php echo (isset($indice) && !empty($indice['setor_destinatario'])) ? $indice['setor_destinatario'] : ''; ?> </td>
                                            <td class="table-acao text-center">
                                                <button type="button"  class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal_tramitacaoview_<?php echo md5($indice['id']) ?>" title="Visualizar"><i class="fa fa-eye"></i></button>
                                                <?php
                                                if ($this->checkSetor() == 10):
                                                    ?>
                                                    <button type="button"  class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_tramitacaoexcluir_<?php echo md5($indice['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $qtd++;
                                    endforeach;
                                } else {
                                    echo '<tr><td scope="col" colspan="5">Nenhum registro encontrado</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--table-->  
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>


<section class="modal fade" id="modal_anexo" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <section class="modal-content">
            <header class="modal-header bg-light">
                <h5 class="modal-title"><i class="fas fa-file-alt"></i>Anexar Arquivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>
            <article class="modal-body">
                <form method="post" name="nFormProtocoloAnexo" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo!empty($result) ? $result['id'] : ''; ?>" name="nProtocolo">
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="iDescricao">Descrição: *</label>
                            <textarea id="iDescricao" class="form-control date_serach" rows="5" name="nDescricao" required></textarea>
                        </div>
                    </div>
                    <div>
                        <label>Anexo: <small class="text-muted">O nome do arquivo será alterado pelo sistema para evitar conflitos com nome de arquivos iguais.</small></label><br/>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="nFile" id="iAnexo" required>
                        <label class="custom-file-label" for="iAnexo" >Nenhum arquivo selecionado.</label>
                        <input type="hidden" name="nFileEnviado"  idvalue="<?php echo isset($chamado['anexo']) ? $chamado['anexo'] : null; ?>" />
                    </div>
                    <button class="btn btn-success" name="nSalvaAnexo" onclick="nFormProtocoloAnexo()" value="true" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                </form>
            </article>
            <footer class="modal-footer">              
                <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
            </footer>
        </section>
    </article>
</section>

<section class="modal fade" id="modal_historico" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <section class="modal-content">
            <header class="modal-header bg-light">
                <h5 class="modal-title"><i class="fas fa-list"></i>  Histórico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>
            <article class="modal-body">
                <form method="post" name="nFormHistorico">
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="iData">Data: </label>
                            <input name="nData" id="iData" class="form-control input-data date_serach" value="<?php echo $this->formatDateView(date("Y-m-d")) ?>"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="iDescricao">Descrição: </label>
                            <textarea id="iDescricao" class="form-control date_serach" rows="5" name="nDescricao"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-success" name="nSalvaHistorico" value="true" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                </form>
            </article>
            <footer class="modal-footer">              
                <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
            </footer>
        </section>
    </article>
</section>

<section class="modal fade" id="modal_tramitacao" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <section class="modal-content">
            <header class="modal-header bg-light">
                <h5 class="modal-title"><i class="fas fa-copy"></i>  Nova Tramitação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>
            <article class="modal-body">
                <form method="post" name="nFormTramitacao" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo!empty($result) ? $result['id'] : ''; ?>" name="nProtocolo">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for='iSetor'>Setor do remetente: * </label><br/>
                            <select class="custom-select" name="nSetorRemetente" id="iSetorRemetente" required onchange="selectSetorRemetente(this.value)">
                                <?php
                                if (!isset($chamado['setor_id'])) {
                                    echo '<option value="" selected = "selected" disabled="disabled">Selecione o setor </option>';
                                }
                                foreach ($setores as $indice) {
                                    if (isset($chamado['setor_id']) && $indice['id'] == $chamado['setor_id']) {
                                        echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['nome'] . ' - ' . $indice['abreviacao'] . '</option>';
                                    } else {
                                        echo '<option value = "' . $indice['id'] . '">' . $indice['nome'] . ' - ' . $indice['abreviacao'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">Informe o setor</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for='iUsuario'>Remetente: * </label><br/>
                            <select class="custom-select" name="nUsuarioRemetente" id="iUsuarioRemetente" required>
                                <option value="" selected = "selected" disabled="disabled">Selecione o usuário </option>
                            </select>
                            <div class="invalid-feedback">
                                Informe o usuário Remetente
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for='iSetor'>Setor do Destinatário: * </label><br/>
                            <select class="custom-select" name="nSetorDestinatario" id="iSetorDestinatario" required onchange="selectSetorDestinatario(this.value)">
                                <?php
                                if (!isset($chamado['setor_id'])) {
                                    echo '<option value="" selected = "selected" disabled="disabled">Selecione o setor </option>';
                                }
                                foreach ($setores as $indice) {
                                    if (isset($chamado['setor_id']) && $indice['id'] == $chamado['setor_id']) {
                                        echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['nome'] . ' - ' . $indice['abreviacao'] . '</option>';
                                    } else {
                                        echo '<option value = "' . $indice['id'] . '">' . $indice['nome'] . ' - ' . $indice['abreviacao'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">Informe o setor</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for='iUsuario'>Destinatário: * </label><br/>
                            <select class="custom-select" name="nUsuarioDestinatario" id="iUsuarioDestinatario" required>
                                <option value="" selected = "selected" disabled="disabled">Selecione o usuário </option>
                            </select>
                            <div class="invalid-feedback">
                                Informe o usuário destinatário
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="iData2">Data: *</label>
                            <input input="text" name="nData" id="iData2" class="form-control input-data date_serach" value="<?php echo $this->getDataNow() ?>" required/>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="iDescricao">Descrição: *</label>
                            <textarea id="iDescricao" class="form-control" rows="5" name="nDescricao"></textarea>
                        </div>
                    </div>
                    <div>
                        <label>Anexo: <small class="text-muted">O nome do arquivo será alterado pelo sistema para evitar conflitos com nome de arquivos iguais.</small></label><br/>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" name="nFile" id="iAnexo" >
                        <label class="custom-file-label" for="iAnexo">Nenhum arquivo selecionado.</label>
                        <input type="hidden" name="nFileEnviado"  value="<?php echo isset($chamado['anexo']) ? null : null; ?>"/>
                    </div>
                    <button class="btn btn-success" name="nSalvaTramitacao" onclick="valida_formTramitacao()" value="true" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                </form>
            </article>
            <footer class="modal-footer">              
                <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
            </footer>
        </section>
    </article>
</section>

<?php
if (isset($tramitacao) && is_array($tramitacao)) :
    foreach ($tramitacao as $indice) :
        ?>        
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_tramitacaoview_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-success text-while">
                        <h5 class="modal-title"><i class="fas fa-copy"></i>  Tramitação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b class="text-success">Data: </b> <br><?php echo isset($indice['data']) && !empty($indice['data']) ? $this->formatDateView($indice['data']) : '' ?>;</li>
                            <li><b class="text-success">Setor Remenente: </b> <br><?php echo isset($indice['setor_remetente']) && !empty($indice['setor_remetente']) ? $indice['setor_remetente'] : '' ?>;</li>
                            <li><b class="text-success">Usuário Remetente: </b> <br><?php echo isset($indice['usuario_remetente']) && !empty($indice['usuario_remetente']) ? $indice['usuario_remetente'] : '' ?>;</li>
                            <li><b class="text-success">Setor Destinatário: </b> <br><?php echo isset($indice['setor_destinatario']) && !empty($indice['setor_destinatario']) ? $indice['setor_destinatario'] : '' ?>;</li>
                            <li><b class="text-success">Usuário Destinatário: </b> <br><?php echo isset($indice['usuario_destinatario']) && !empty($indice['usuario_destinatario']) ? $indice['usuario_destinatario'] : '' ?>;</li>
                            <li><b class="text-success">Descrição: </b> <br><?php echo isset($indice['descricao']) && !empty($indice['descricao']) ? $indice['descricao'] : '' ?>.</li>

                            <?php
                            if (!empty($indice['anexo'])) {
                                $file = explode('/', $indice['anexo']);
                                $fileName = end($file);
                                echo '<b class="text-success">Anexo:</b> <br> <em> <i class="fas fa-paperclip text-success"></i> <a href="' . BASE_URL . $indice['anexo'] . '" download class="text-primary">' . $fileName . '</a></em>';
                            }
                            ?>
                        </ul>
                    </article>
                    <footer class="modal-footer">
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
if ($this->checkSetor() == 10):
    if (isset($anexos) && is_array($anexos)) :
        foreach ($anexos as $indice) :
            ?>        
            <!--MODAL - ESTRUTURA BÁSICA-->
            <section class="modal fade" id="modal_anexoexcluir_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
                <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <section class="modal-content">
                        <header class="modal-header bg-danger text-while">
                            <h5 class="modal-title">Deseja remover este registro?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </header>
                        <article class="modal-body">
                            <ul class="list-unstyled">
                                <li><b class="text-success">Data: </b> <br><?php echo isset($indice['data']) && !empty($indice['data']) ? $this->formatDateView($indice['data']) : '' ?>;</li>
                                <li><b class="text-success">Descrição: </b> <br><?php echo isset($indice['descricao']) && !empty($indice['descricao']) ? $indice['descricao'] : '' ?>.</li>
                                <?php
                                if (!empty($indice['anexo'])) {
                                    $file = explode('/', $indice['anexo']);
                                    $fileName = end($file);
                                    echo '<b class="text-success">Anexo:</b> <br> <em> <i class="fas fa-paperclip text-success"></i> <a href="' . BASE_URL . $indice['anexo'] . '" download class="text-primary">' . $fileName . '</a></em>';
                                }
                                ?>
                            </ul>
                            <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro deixará de existir no sistema.</p>
                        </article>
                        <footer class="modal-footer">
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'protocolo/excluiranexo/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                            <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </footer>
                    </section>
                </article>
            </section>
            <?php
        endforeach;
    endif;
endif;
if ($this->checkSetor() == 10):
    if (isset($tramitacao) && is_array($tramitacao)) :
        foreach ($tramitacao as $indice) :
            ?>        
            <!--MODAL - ESTRUTURA BÁSICA-->
            <section class="modal fade" id="modal_tramitacaoexcluir_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
                <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <section class="modal-content">
                        <header class="modal-header bg-danger text-while">
                            <h5 class="modal-title">Deseja remover este registro?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </header>
                        <article class="modal-body">
                            <ul class="list-unstyled">
                                <li><b class="text-success">Data: </b> <br><?php echo isset($indice['data']) && !empty($indice['data']) ? $this->formatDateView($indice['data']) : '' ?>;</li>
                                <li><b class="text-success">Setor Remenente: </b> <br><?php echo isset($indice['setor_remetente']) && !empty($indice['setor_remetente']) ? $indice['setor_remetente'] : '' ?>;</li>
                                <li><b class="text-success">Usuário Remetente: </b> <br><?php echo isset($indice['usuario_remetente']) && !empty($indice['usuario_remetente']) ? $indice['usuario_remetente'] : '' ?>;</li>
                                <li><b class="text-success">Setor Destinatário: </b> <br><?php echo isset($indice['setor_destinatario']) && !empty($indice['setor_destinatario']) ? $indice['setor_destinatario'] : '' ?>;</li>
                                <li><b class="text-success">Usuário Destinatário: </b> <br><?php echo isset($indice['usuario_destinatario']) && !empty($indice['usuario_destinatario']) ? $indice['usuario_destinatario'] : '' ?>;</li>
                                <li><b class="text-success">Descrição: </b> <br><?php echo isset($indice['descricao']) && !empty($indice['descricao']) ? $indice['descricao'] : '' ?></li>

                                <?php
                                if (!empty($indice['anexo']) && $indice['anexo'] != null) {
                                    $file = explode('/', $indice['anexo']);
                                    $fileName = end($file);
                                    echo '<b class="text-success">Anexo:</b> <br> <em> <i class="fas fa-paperclip text-success"></i> <a href="' . BASE_URL . $indice['anexo'] . '" download class="text-primary">' . $fileName . '</a></em>';
                                }
                                ?>
                            </ul>
                            <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro deixará de existir no sistema.</p>
                        </article>
                        <footer class="modal-footer">
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'protocolo/excluirtramitacao/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                            <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </footer>
                    </section>
                </article>
            </section>
            <?php
        endforeach;
    endif;
endif;
if ($this->checkSetor() == 10):
    if (isset($historico) && is_array($historico)) :
        foreach ($historico as $indice) :
            ?>        
            <!--MODAL - ESTRUTURA BÁSICA-->
            <section class="modal fade" id="modal_historico_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
                <article class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <section class="modal-content">
                        <header class="modal-header bg-danger text-while">
                            <h5 class="modal-title">Deseja remover este registro?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </header>
                        <article class="modal-body">
                            <ul class="list-unstyled">
                                <li><b>id: </b> <?php echo!empty($indice['id']) ? $indice['id'] : '' ?>;</li>
                                <li><b>Data: </b> <?php echo isset($indice['data']) && !empty($indice['data']) ? $this->formatDateView($indice['data']) : '' ?>;</li>
                                <li><b>Descrição: </b> <?php echo isset($indice['descricao']) && !empty($indice['descricao']) ? $indice['descricao'] : '' ?>.</li>
                            </ul>
                            <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro deixará de existir no sistema.</p>
                        </article>
                        <footer class="modal-footer">
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'protocolo/excluirhistorico/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                            <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </footer>
                    </section>
                </article>
            </section>
            <?php
        endforeach;
    endif;
endif;
?>