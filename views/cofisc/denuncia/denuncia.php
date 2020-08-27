<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Denúnica: N 0001</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> CCA</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>cofisc/consultar_denuncia"><i class="fas fa-tasks"></i> Consultar Denúncias</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?php echo BASE_URL ?>cofisc/consultar_denuncia">Denúncia: N 0001</a></li>
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
                                    <a class="btn btn-outline-success btn-sm" href="<?php echo BASE_URL . 'cofisc/denuncia/' . md5($indice['id']); ?>" title="Download"><i class="fas fa-download"></i></a> 
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