<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Denúnica: Nº <?php echo str_pad($result['id'], 5, '0', STR_PAD_LEFT) ?></h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> CCA</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>fisc_denuncia/consultar"><i class="fas fa-tasks"></i> Consultar Denúncias</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?php echo BASE_URL ?>/fisc_denuncia/denuncia/<?php echo md5($result['id']);?>">Denúncia: Nº <?php echo str_pad($result['id'], 5, '0', STR_PAD_LEFT) ?> </a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->
    </div>
    <div class="row">
        <div class="col">
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <h5 class="card-title h6 my-1"><i class="fas fa-info-circle"></i> Dados do Protocolo</h5>
                </header>
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
                    </div>
                </article>
            </section>
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <h5 class="card-title h6 my-1"><i class="fas fa-info-circle"></i>  Denúncia</h5>
                </header>
                <article class="card-body py-0">

                    <div class="row">
                        <div class="col-md-5">
                            <p class="text-justify"><div class="text-success font-bold">Técnico responsável:</div> 
                            <?php echo (isset($result) && !empty($result['tecnico'])) ? $result['tecnico'] : ''; ?>     
                            </p>
                        </div>
                        <div class="col-md-7">
                            <p class="text-justify"><div class="text-success font-bold">Status da denúncia:</div> 
                            <?php echo (isset($result) && !empty($result['status'])) && $result['status'] == 1 ? 'Em Andamento' : "Finalizado"; ?>     
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <p class="text-justify"><div class="text-success font-bold">Tipo da denúncia:</div> 
                            <?php echo (isset($result) && !empty($result['tipo_denuncia'])) ? $result['tipo_denuncia'] : ''; ?>     
                            </p>
                        </div>
                        <div class="col-md-7">
                            <p class="text-justify"><div class="text-success font-bold">Denunciado:</div> 
                            <?php echo (isset($result) && !empty($result['denunciado'])) ? $result['denunciado'] : ''; ?>     
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
            </section>
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <h5 class="card-title h6 my-1"><i class="fas fa-map-marker-alt"></i> Endereço da Denúncia</h5>
                </header>
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
            </section>
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <h5 class="card-title h6 my-1"><i class="fas fa-user-secret"></i> Denunciante</h5>
                </header>
                <article class="card-body py-0">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-justify"><div class="text-success font-bold">Nome:</div> 
                            <?php echo (isset($result) && !empty($result['denunciante'])) ? $result['denunciante'] : ''; ?>     
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
                </article>
            </section>
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <h5 class="card-title h6 my-1"><i class="fas fa-list"></i> Vistoria</h5>
                </header>
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
                            }else {
                                echo '<tr><td scope="col" colspan="4">Nenhum registro encontrado</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--table-->  
                </div>
            </section>
            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <h5 class="card-title h6 my-1"><i class="fas fa-file-alt"></i> Anexo(s) </h5>
                </header>
                <article class="card-body py-0">
                    <div class="row">
                        <div class="col-12 my-2">
                            <button class="btn btn-sm btn-outline-warning pull-right"><i class="fas fa-plus-square"></i> Adicionar</button>
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
                            <tr>
                                <td>1</td>
                                <td>Protocolo</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-success btn-sm" href="<?php echo BASE_URL . 'fisc/denuncia/' . md5($indice['id']); ?>" title="Download"><i class="fas fa-download"></i></a> 
                                    <?php
                                    if ($this->checkSetor() == 10):
                                        ?>
                                        <button type="button"  class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_relatorio_<?php echo md5($indice['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--table-->  
                </div>
            </section>

            <section class="card my-3 border-success">
                <header class="card-header bg-success">
                    <h5 class="card-title h6 my-1"><i class="fas fa-list"></i> Histórico da denúncia</h5>
                </header>
                <article class="card-body py-0">
                    <div class="row">
                        <div class="col-12 my-2">
                            <button class="btn btn-sm btn-outline-warning pull-right"><i class="fas fa-plus-square"></i> Adicionar</button>
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
                                <th scope="col" width="100px">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>20/08/2020</td>
                                <td>joab.alencar</td>
                                <td>Protocolo</td>
                                <td class="text-center">
                                    <?php
                                    if ($this->checkSetor() == 10):
                                        ?>
                                        <button type="button"  class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal_relatorio_<?php echo md5($indice['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!--table-->  
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
                            <textarea id="iDescricao" class="form-control date_serach" rows="5" name="nDescricao"></textarea>
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

<!--fim da paginação-->
<?php
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