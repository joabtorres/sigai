<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Solicitação: Nº <?php echo str_pad($result['id'], 5, '0', STR_PAD_LEFT) ?></h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> Fiscalização</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>fisc_solicitacao/consultar"><i class="fas fa-tasks"></i> Consultar Denúncias</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?php echo BASE_URL ?>fisc_solicitacao/solicitacao/<?php echo md5($result['id']); ?>">Solicitação: Nº <?php echo str_pad($result['id'], 5, '0', STR_PAD_LEFT) ?> </a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->
    </div>
    <div class="row">
        <div class="col">
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleVinculado" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-list"></i> Protocolo de Tramitação<i class="fa fa-eye pull-right"></i></h4>
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
                                                <a class="btn btn-outline-success btn-sm" href="<?php echo BASE_URL . 'tramitacao/protocolo/' . md5($indice['id']); ?>" title="Visualizar"><i class="fa fa-eye"></i></a> 
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
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleProtocolo" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-info-circle"></i> Dados do Protocolo<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleProtocolo">
                    <article class="card-body py-0">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Data do protocolo:</div> 
                                <?php echo (isset($result) && !empty($result['data_protocolo'])) ? $this->formatDateView($result['data_protocolo']) : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Tipo do protocolo:</div> 
                                <?php echo (isset($result) && !empty($result['tipo_protocolo'])) ? $result['tipo_protocolo'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Tipo do documento:</div> 
                                <?php echo (isset($result) && !empty($result['documento'])) ? $result['documento'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Origem:</div> 
                                <?php echo (isset($result) && !empty($result['origem'])) ? $result['origem'] : ''; ?>

                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-justify"><div class="text-success font-bold">Número do protocolo:</div> 
                                <?php echo (isset($result) && !empty($result['numero_protocolo'])) ? $result['numero_protocolo'] : ''; ?>

                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-justify"><div class="text-success font-bold">Ano do protocolo:</div> 
                                <?php echo (isset($result) && !empty($result['ano_protocolo'])) ? $result['ano_protocolo'] : ''; ?>

                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Número do ofício:</div> 
                                <?php echo (isset($result) && !empty($result['numero_oficio'])) ? $result['numero_oficio'] : ''; ?>

                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Ano do ofício:</div> 
                                <?php echo (isset($result) && !empty($result['ano_oficio'])) ? $result['ano_oficio'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Número do memorando:</div> 
                                <?php echo (isset($result) && !empty($result['numero_memorando'])) ? $result['numero_memorando'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Ano do memorando:</div> 
                                <?php echo (isset($result) && !empty($result['ano_memorando'])) ? $result['ano_memorando'] : ''; ?>                            
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-justify"><div class="text-success font-bold">Orgão Solicitante:</div> 
                                <?php echo (isset($result) && !empty($result['solicitante'])) ? $result['solicitante'] : ''; ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Prazo em dias:</div> 
                                <?php echo (isset($result) && !empty($result['prazo'])) ? $result['prazo'] . ' dia(s)' : ''; ?>                            
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-justify"><div class="text-success font-bold">Prazo em data:</div> 
                                <?php echo (isset($result) && !empty($result['prazo'])) ? date('d/m/Y', strtotime('+' . $result['prazo'] . ' days', strtotime($result['data_protocolo']))) : ''; ?>                            
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleDenuncia" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-info-circle"></i>  Solicitação<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleDenuncia">
                    <article class="card-body py-0">

                        <div class="row">
                            <div class="col-md-4">
                                <p class="text-justify"><div class="text-success font-bold">Técnico responsável:</div> 
                                <?php echo (isset($result) && !empty($result['tecnico'])) ? $result['tecnico'] : ''; ?>     
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-justify"><div class="text-success font-bold">Status da solicitação:</div> 
                                <?php echo (isset($result) && !empty($result['status'])) && $result['status'] == 1 ? 'Em Andamento' : "Finalizado"; ?>     
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-justify"><div class="text-success font-bold">Tipo da solicitação:</div> 
                                <?php echo (isset($result) && !empty($result['tipo_solicitacao'])) ? $result['tipo_solicitacao'] : ''; ?>     
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <p class="text-justify"><div class="text-success font-bold">Solicitante:</div> 
                                <?php echo (isset($result) && !empty($result['solicitante'])) ? $result['solicitante'] : ''; ?>     
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-justify"><div class="text-success font-bold">Telefone:</div> 
                                <?php echo (isset($result) && !empty($result['telefone'])) ? $result['telefone'] : ''; ?>   
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p class="text-justify"><div class="text-success font-bold">Email:</div> 
                                <?php echo (isset($result) && !empty($result['email'])) ? $result['email'] : ''; ?>     
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="text-justify"><div class="text-success font-bold">Descrição/Observações:</div> 
                                <?php echo (isset($result) && !empty($result['descricao'])) ? $result['descricao'] : ''; ?>     
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleendereco" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-map-marker-alt"></i> Endereço da Solicitação<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleendereco">
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
                            <div class="col-md-7">
                                <p class="text-justify"><div class="text-success font-bold">Endereço/Complemento:</div> 
                                <?php echo (isset($result) && !empty($result['endereco'])) ? $result['endereco'] : ''; ?>     
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
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleVistirua" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-list"></i> Vistoria<i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExampleVistirua">
                    <article class="card-body py-0">
                        <div class="row">
                            <div class="col-12 my-2">
                                <button class="btn btn-sm btn-outline-warning pull-right" type="button" data-toggle="modal" data-target="#modal_vistoria" title="Adicionar"><i class="fas fa-plus-square"></i> Adicionar</button>
                            </div>                       
                        </div>                    
                    </article>
                    <div class="table-responsive d-flex">
                        <!--table-->
                        <table class="table table-bordered table-sm table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" width="50px" >#</th>
                                    <th scope="col" width="150px">Data</th>
                                    <th scope="col" >Descrição</th>
                                    <th scope="col" width="100px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($vistorias) && !empty($vistorias)) {
                                    $qtd = 1;
                                    foreach ($vistorias as $indice):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td> <?php echo (isset($indice) && !empty($indice['data'])) ? $this->formatDateView($indice['data']) : ''; ?>  </td>
                                            <td><?php echo (isset($indice) && !empty($indice['descricao'])) ? $indice['descricao'] : ''; ?> </td>
                                            <td class="text-center">
                                                <button type="button"  class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal_vistoriaView_<?php echo md5($indice['id']) ?>" title="Visualizar"><i class="fa fa-eye"></i></button>

                                                <?php
                                                if ($this->checkSetor() == 10):
                                                    ?>
                                                    <button type="button"  class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_vistoria_<?php echo md5($indice['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $qtd++;
                                    endforeach;
                                } else {
                                    echo '<tr><td scope="col" colspan="4">Nenhum registro encontrado</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--table-->  
                    </div>
                </div>
            </section>
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleAnexo" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-file-alt"></i> Anexo(s) <i class="fa fa-eye pull-right"></i></h4>
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

            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExampleHistorico" role="button" aria-expanded="false">
                        <h4 class="card-title h6 my-1"><i class="fas fa-list"></i> Histórico da solicitacão<i class="fa fa-eye pull-right"></i></h4>
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
        </div>
    </div>

</div>

<section class="modal fade" id="modal_vistoria" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <section class="modal-content">
            <header class="modal-header bg-light">
                <h5 class="modal-title"><i class="fas fa-list"></i>  Vistoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </header>
            <article class="modal-body">
                <form method="post" name="nFormVistoria">
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="iData">Data: </label>
                            <input name="nData" id="iData" class="form-control date_serach" value="<?php echo $this->formatDateView(date("Y-m-d")) ?>"/>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="iDescricao">Descrição: </label>
                            <textarea id="iDescricao" class="form-control date_serach" rows="5" name="nDescricao" required></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="iVistoria">Instrumento de Fiscalização: </label>
                            <select class="custom-select select2-js" id="iVistoria" name="nInstrumento[]"  multiple="multiple">
                                <option disabled="disabled">Selecione um instrumento de fiscalização</option>
                                <option value="I – Auto de Infração">I – Auto de Infração </option>
                                <option value="II – Termo de Notificação">II – Termo de Notificação </option>
                                <option value="III  –  Termo de Apreensão, de Depósito, de Embargo ou Interdição, de Incineração, Destruição ou Desfazimento">III  –  Termo de Apreensão, de Depósito, de Embargo ou Interdição, de Incineração, Destruição ou Desfazimento </option>
                                <option value="IV – Termo de Doação de Produtos Perecíveis">IV – Termo de Doação de Produtos Perecíveis </option>
                                <option value="V – Termo de Soltura de Animais">V – Termo de Soltura de Animais </option>
                                <option value="VI – Termo de Inspeção e Constatação">VI – Termo de Inspeção e Constatação </option>
                                <option value="VII – Relatório de Fiscalização Ambiental">VII – Relatório de Fiscalização Ambiental </option>
                                <option value="VIII – Ordem de Fiscalização">VIII – Ordem de Fiscalização </option>
                                <option value="IX  –  Termo de Autorização para Supressão de Espécie Florestal, limitado a 5 (cinco) indivíduos e autorizado pelo Coordenador da Fiscalização e Proteção Ambiental">IX  –  Termo de Autorização para Supressão de Espécie Florestal, limitado a 5 (cinco) indivíduos e autorizado pelo Coordenador da Fiscalização e Proteção Ambiental </option>
                                <option value="X  –  Termo de Autorização  Especial de Transporte de Produto e Subproduto Florestal e Faunístico, expedido pelo Secretário de Municipal de Meio Ambiente">X  –  Termo de Autorização  Especial de Transporte de Produto e Subproduto Florestal e Faunístico, expedido pelo Secretário de Municipal de Meio Ambiente </option>
                                <option value="XI  –  Termo de Substituição de Guarda e Depósito">XI  –  Termo de Substituição de Guarda e Depósito </option>
                                <option value="XII – Termo de Comunicação de Crime">XII – Termo de Comunicação de Crime </option>
                                <option value="XIII  –  Termo de Ordem de Busca de Dados e Informação">XIII  –  Termo de Ordem de Busca de Dados e Informação </option>
                                <option value="XIV – Termo de Contradita">XIV – Termo de Contradita </option>
                                <option value="XV  –  Relatório Geral de Operação e Fiscalização">XV  –  Relatório Geral de Operação e Fiscalização </option>
                                <option value="XVI – Relatório do Auto de Infração">XVI – Relatório do Auto de Infração </option>
                                <option value="XVII – Laudo Técnico">XVII – Laudo Técnico </option>
                                <option value="XVIII – Parecer Técnico">XVIII – Parecer Técnico </option>
                                <option value="XIX – Nota Técnica">XIX – Nota Técnica</option>
                            </select>
                            <div class="invalid-feedback">Informe um instrumento de fiscalização</div>
                        </div>
                    </div>
                    <button class="btn btn-success" name="nSalvaVistoria" value="true" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                </form>
            </article>
            <footer class="modal-footer">              
                <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
            </footer>
        </section>
    </article>
</section>
<section class="modal fade" id="modal_anexo" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <section class="modal-content">
            <header class="modal-header bg-light">
                <h5 class="modal-title"><i class="fas fa-file-alt"></i> Anexar Arquivo</h5>
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
                            <textarea id="iDescricao" class="form-control date_serach" rows="5" name="nDescricao" required maxlength="250"></textarea>
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
                            <input name="nData" id="iData" class="form-control date_serach" value="<?php echo $this->formatDateView(date("Y-m-d")) ?>"/>
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
<!--fim da paginação-->
<?php
if (isset($vistorias) && is_array($vistorias)) :
    foreach ($vistorias as $indice) :
        ?>        
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_vistoriaView_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-success text-while">
                        <h5 class="modal-title"><i class="fas fa-copy"></i>  Vistoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b class="text-success">Data: </b> <br><?php echo isset($indice['data']) && !empty($indice['data']) ? $this->formatDateView($indice['data']) : '' ?>;</li>
                            <li><b class="text-success">Descrição: </b> <br><?php echo isset($indice['descricao']) && !empty($indice['descricao']) ? $indice['descricao'] : '' ?>.</li>
                            <li><b class="text-success">Instrumento de Fiscalização: </b> <br><?php echo isset($indice['instrumento']) && !empty($indice['instrumento']) ? $indice['instrumento'] : '' ?></li>
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
    if (isset($vistorias) && is_array($vistorias)) :
        foreach ($vistorias as $indice) :
            ?>        
            <!--MODAL - ESTRUTURA BÁSICA-->
            <section class="modal fade" id="modal_vistoria_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
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
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'fisc_solicitacao/excluirvistoria/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
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
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'fisc_solicitacao/excluiranexo/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
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
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'fisc_solicitacao/excluirhistorico/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
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