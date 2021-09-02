<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Consultar Denúncias</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> Fiscalização</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo BASE_URL ?>fisc_denuncia/consultar/1"><i class="fas fa-tasks"></i> Consultar Denúncias</a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->

    </div>
    <!--<div class="row">-->
    <div class="row" id="painel_de_consulta">
        <div class="col">
            <section class="card">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false">
                        <h4 class="card-title h6 mb-1 mt-1"><i class="fa fa-search pull-left"></i> Painel de busca <i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse" id="collapseExample">
                    <article class="card-body">
                        <form method="GET" action="<?php echo BASE_URL ?>fisc_denuncia/consultar/1" name="formSearhCofisc">
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for='iTipoProtocolo'>Tipo de Protocolo: </label><br/>
                                    <select class="select-single custom-select" name="nTipoProtocolo" id="iTipoProtocolo" onchange="selectTipoDenuncia(this.value)">
                                        <option value="" selected = "selected" >Todos </option>
                                        <?php
                                        foreach ($tipo_protocolo as $indice) {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['tipo_protocolo'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe o tipo do protocolo</div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for='iTipoDocumento'>Tipo de Documento: </label><br/>
                                    <select class="select-single custom-select" name="nTipoDocumento" id="iTipoDocumento">
                                        <option value="" selected = "selected" >Todos </option>
                                        <?php
                                        foreach ($documento as $indice) {

                                            echo '<option value = "' . $indice['id'] . '">' . $indice['documento'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe o tipo do documento</div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for='iOrigem'>Origem:  </label><br/>
                                    <select class="select-single custom-select" name="nOrigem" id="iOrigem">
                                        <option value="" selected = "selected" >Todos </option>
                                        <?php
                                        foreach ($origem as $indice) {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['origem'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe a origem</div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for='iTipoDenuncia'>Tipo de Denúncia:  </label><br/>
                                    <select class="select-single custom-select" name="nTipoDenuncia" id="iTipoDenuncia" >
                                        <option value="" selected = "selected" >Todos </option>
                                        <?php
                                        foreach ($tipo_denuncia as $indice) {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['tipo_denuncia'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe o tipo da denúncia</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="iDataInicial">Data Inicial do Protocolo:  </label>
                                    <input type="text" class="form-control date_serach" name="nDataInicial" id="iDataInicial" />
                                    <div class="invalid-feedback">
                                        Informe nome / email do usuário
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="iDataFinal">Data final do Protocolo:  </label>
                                    <input type="text" class="form-control date_serach" name="nDataFinal" id="iDataFinal" />
                                    <div class="invalid-feedback">
                                        Informe nome / email do usuário
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for='iSelectBuscar'>Por: </label><br/>
                                    <select class="custom-select" name="nSelectBuscar" id="iSelectBuscar" >
                                        <option value="" selected="selected">Selecione</option>
                                        <option value="protoco">Nº de Protocolo</option>
                                        <option value="denunciado">Denunciado</option>
                                        <option value="denunciante">Denunciante</option>
                                        <option value="descricao">Descrição</option>
                                    </select>
                                    <div class="invalid-feedback">Informe o setor</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="iCampo">Campo:  </label>
                                    <input type="text" class="form-control" name="nCampo" id="iCampo"/>
                                    <div class="invalid-feedback">
                                        Informe nome / email do usuário
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-2 mb-3">
                                    <button type="submit" name="nBuscarBT" value="BuscarBT" class="btn btn-warning"><i class="fa fa-search pull-left"></i> Buscar</button>
                                </div>
                            </div>
                        </form>
                    </article>
                </div>
            </section>
        </div>
    </div>
    <!--<div class="row" id="painel_de_consulta">-->
    <?php
    if (!empty($chamados)) {
        ?>
        <div class="row">
            <div class="col mb-2 mt-2">
                <section class="card">
                    <header class="card-header bg-dark text-while">
                        <h1 class="card-title h6 mb-1 mt-1">Resultados encontrados</h1>
                    </header>
                    <div class="table-responsive">
                        <!--table-->
                        <table class="table table-striped table-bordered table-sm table-hover mb-0">
                            <thead class="bg-success">
                                <tr>
                                    <th scope="col" >#</th>
                                    <th scope="col">Data do Protocolo</th>
                                    <th scope="col">Nº do Protocolo</th>
                                    <th scope="col">Ano do Protocolo</th>
                                    <th scope="col">Denunciado</th>
                                    <th scope="col">Denunciante</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qtd = 1;
                                foreach ($chamados as $indice):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $qtd ?></td>
                                        <td><?php echo $this->formatDateView($indice['data_protocolo']) ?></td>
                                        <td><?php echo!empty($indice['numero_protocolo']) ? $indice['numero_protocolo'] : '' ?></td>
                                        <td><?php echo!empty($indice['ano_protocolo']) ? $indice['ano_protocolo'] : '' ?></td>
                                        <td><?php echo!empty($indice['denunciado']) ? $indice['denunciado'] : 'Anônimo' ?></td>
                                        <td><?php echo!empty($indice['denunciante']) ? $indice['denunciante'] : 'Anônimo' ?></td>
                                        <td class="table-acao text-center">
                                            <a class="btn btn-success btn-sm" href="<?php echo BASE_URL . 'fisc_denuncia/denuncia/' . md5($indice['id']); ?>" title="Visualizar"><i class="fa fa-eye"></i></a> 
                                            <?php if ($this->checkSetor() == 10 || $this->checkSetor() == 4): ?>
                                                <a class="btn btn-primary btn-sm" href="<?php echo BASE_URL . 'cca/editar/' . md5($indice['id']); ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a> 
                                                <?php
                                            endif;
                                            if ($this->checkSetor() == 10):
                                                ?>
                                                <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_relatorio_<?php echo md5($indice['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $qtd++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                        <!--table-->  
                    </div>
                </section>

            </div>
        </div>
    <?php } else {
        ?>
        <!--<div class="row">-->
        <div class="row">
            <div class="col mt-2 mb-2">
                <div class="alert alert-danger " role="alert" id="alert-msg">
                    <button class="close" data-hide="alert">&times;</button>
                    <div id="resposta"> <i class="fa fa-times"></i> Desculpe, não foi possível localizar nenhum registro !</div>
                </div>
            </div>
        </div>
        <!--<div class="row">-->
    <?php } ?>
</div>

<!--inicio da paginação-->
<?php
if (ceil($paginas) > 1) {
    ?>
    <div class="container-fluid">
        <div class = "row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class = "pagination">
                        <?php
                        echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "cca/consultar/1" . $metodo_buscar . "'><span aria-hidden='true'>&laquo;</span></a></li>";
                        for ($p = 0; $p < ceil($paginas); $p++) {
                            if ($pagina_atual == ($p + 1)) {
                                echo "<li class='page-item active'><a class='page-link' href='" . BASE_URL . "cca/consultar/" . ($p + 1) . $metodo_buscar . "'>" . ($p + 1) . "</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "cca/consultar/" . ($p + 1) . $metodo_buscar . "'>" . ($p + 1) . "</a></li>";
                            }
                        }
                        echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "cca/consultar/" . ceil($paginas) . $metodo_buscar . "'>&raquo;</a></li>";
                        ?>
                    </ul>
                </nav>
            </div> 
        </div> 
    </div>
<?php }
?>
<!--fim da paginação-->
<?php
if ($this->checkSetor() == 10):
    if (isset($chamados) && is_array($chamados)) :
        foreach ($chamados as $indice) :
            ?>        
            <!--MODAL - ESTRUTURA BÁSICA-->
            <section class="modal fade" id="modal_relatorio_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
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
                                <li><b>Chamado: </b> <?php echo!empty($indice['id']) ? $indice['id'] : '' ?>;</li>
                                <li><b>Status: </b> <?php echo isset($indice['status']) && !empty($indice['status']) ? $indice['status'] : '0' ?>;</li>
                                <li><b>Setor: </b> <?php echo isset($indice['setor']) && !empty($indice['setor']) ? $indice['setor'] : '0' ?>;</li>
                                <li><b>Solicitante: </b> <?php echo isset($indice['usuario']) && !empty($indice['usuario']) ? $indice['usuario'] : '0' ?>;</li>
                            </ul>
                            <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro e todos registos relacionados ao mesmo deixaram de existir no sistema.</p>
                        </article>
                        <footer class="modal-footer">
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'cca/excluirchamado/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
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