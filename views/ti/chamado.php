<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Chamado: Nº <?php echo str_pad($chamado['id'], 5, '0', STR_PAD_LEFT) . ' - ' . $chamado['assunto'] ?></h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> Suporte Interno</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>ti/consultar"><i class="fas fa-tasks"></i> Consultar Chamados</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo BASE_URL ?>ti/chamado/<?php echo md5($chamado['id']) ?>">Chamado: Nº <?php echo str_pad($chamado['id'], 5, '0', STR_PAD_LEFT) . ' - ' . $chamado['assunto'] ?></a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->

    </div>
    <!--<div class="row">-->
    <?php if (isset($erro)) : ?>
        <div class="row">
            <div class="col">
                <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                    <button class="close" data-hide="alert">&times;</button>
                    <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--<div class="row">-->

    <div class="row">
        <div class="col">
            <div class="card bg-light">
                <div class="card-header bg-dark text-while">
                    <h5 class="card-title mb-1 mt-1">Chamado: Nº  <?php echo str_pad($chamado['id'], 5, '0', STR_PAD_LEFT) . ' - ' . $chamado['assunto'] ?></h5>
                </div>
                <div class="card-body py-0 px-3">
                    <div class="row">
                        <div class="col-md-2 text-center bg-secondary py-5 text-while">
                            <figure class="figure">
                                <img src="<?php echo!empty($chamado['imagem']) ? BASE_URL . $chamado['imagem'] : BASE_URL . 'assets/imagens/user.png'; ?>" class="figure-img img-fluid rounded-circle" alt="A generic square placeholder image with rounded corners in a figure.">
                                <figcaption class="figure-caption text-center text-while"><?php echo!empty($chamado['usuario']) ? $chamado['usuario'] : 'nome' ?> <br/>
                                    <?php echo!empty($chamado['portaria']) ? 'Portaria / Matricula: ' . $chamado['portaria'] : 'matricula' ?><br/>
                                    <?php echo!empty($chamado['abreviacao']) ? $chamado['abreviacao'] : 'setor' ?>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-10 py-5">
                            <p><b class="text-success">Setor:</b> <br/> <i class="fas fa-bullhorn text-success"></i> <?php echo $chamado ['setor'] . ' - ' . $chamado['abreviacao'] ?></p>
                            <p><b class="text-success">Abertura do chamado:</b> <br/> <i class="fas fa-calendar-alt text-success"></i>  <?php echo $this->formatDateViewComplet($chamado['data']) ?></p>
                            <p><b class="text-success">Status:</b> <br/> <?php $this->getStatus($chamado['status_id'], $chamado['status']); ?>
                            </p>
                            <p>
                                <b class="text-success">Descrição:</b></br>
                                <i><?php echo $chamado['descricao'] ?></i>
                            </p>
                            <?php
                            if (!empty($chamado['anexo'])) {
                                $file = explode('/', $chamado['anexo']);
                                $fileName = end($file);
                                echo '<hr><b class="text-success">Anexo:</b> <br> <em> <i class="fas fa-paperclip text-success"></i> <a href="' . BASE_URL . $chamado['anexo'] . '" download class="text-primary">' . $fileName . '</a></em>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!empty($chamados_historicos)) :
        foreach ($chamados_historicos as $index):
            ?>
            <div class="row">
                <div class="col">
                    <br>
                    <div class="card bg-white">
                        <div class="card-body py-0 px-3">
                            <div class="row">
                                <div class="col-md-2 text-center bg-success py-5 text-while">
                                    <figure class="figure">
                                        <img src="<?php echo!empty($index['imagem']) ? BASE_URL . $index['imagem'] : BASE_URL . 'assets/imagens/user.png'; ?>" class="figure-img img-fluid rounded-circle" alt="A generic square placeholder image with rounded corners in a figure.">
                                        <figcaption class="figure-caption text-center text-while"><?php echo!empty($index['usuario']) ? $index['usuario'] : 'nome' ?> <br/>
                                            <?php echo!empty($index['portaria']) ? 'Portaria / Matricula: ' . $index['portaria'] : 'matricula' ?><br/>
                                            <?php echo!empty($index['abreviacao']) ? $index['abreviacao'] : 'setor' ?>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-md-10 py-5">
                                    <p><b class="text-success">Status:</b> <br/><?php $this->getStatus($index['status_id'], $index['status']); ?>
                                        <?php if ($this->checkSetor() == 10) : ?>
                                            <button type="button"  class="btn btn-danger btn-sm pull-right" data-toggle="modal" data-target="#modal_relatorio_<?php echo md5($index['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                        <?php endif; ?>
                                    </p>
                                    <p><b class="text-success">Data:</b> <br/> <i class="fas fa-calendar-alt text-success"></i>  <?php echo $this->formatDateViewComplet($index['data']) ?></p> 
                                    <p>
                                        <b class="text-success">Descrição:</b></br>
                                        <i><?php echo!empty($index['descricao']) ? $index['descricao'] : 'descricao' ?></i>
                                    </p>
                                    <?php
                                    if (!empty($index['anexo'])) {
                                        echo ' <hr>';
                                        $file = explode('/', $index['anexo']);
                                        $fileName = end($file);
                                        echo '<hr><b class="text-success">Anexo:</b> <br> <em> <i class="fas fa-paperclip text-success"></i> <a href="' . BASE_URL . $index['anexo'] . '" download class="text-primary">' . $fileName . '</a></em>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    endif;

    if ($this->checkSetor() == 10):
        ?>
        <div class="row">
            <div class="col">
                <form method="POST" action="<?php echo BASE_URL ?>ti/chamado/<?php echo md5($chamado['id']) ?>" enctype="multipart/form-data" autocomplete="off"  name="nFormCCAChamado">
                    <input type="hidden" name="nChamado" value="<?php echo!empty($formCad['chamado_id']) ? $formCad['chamado_id'] : $chamado['id']; ?>"/>
                    <section class="card bg-light mt-3">
                        <header class="card-header bg-dark text-while">
                            <h1 class="card-title h5 mb-1 my-1"><i class="fas fa-plus-square"></i> Novo histórico</h1>
                        </header>
                        <article class="card-body">

                            <div class="form-row">
                                <div class="col mb-3">
                                    <label for='iSetor'>Status: * </label><br/>
                                    <select class="custom-select" name="nStatus" id="iSetor" required>
                                        <?php
                                        foreach ($chamado_status as $indice) {
                                            if (isset($chamado['setor_id']) && $indice['id'] == $formCad['setor_id']) {
                                                echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['nome'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $indice['id'] . '">' . $indice['nome'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe o status</div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for='iData' class="mb-2">Data: *</label><br/>
                                    <input type="text" name="nData"  class="form-control input-data-complete" id="iData" placeholder="Exemplo: 15/08/2020 10:40:20" value="<?php echo!empty($formCad['data']) ? $this->formatDateViewComplet($formCad['data']) : $this->getDatatimeNow() ?>" required>
                                    <div class="invalid-feedback">
                                        Informe a data e hora
                                    </div>
                                </div>
                            </div>
                            <!--<div class="row">-->
                            <div class="row">
                                <div class="col mb-3"
                                     <label for='iDescricao'>Descrição: *</label><br/>
                                    <textarea rows="5" name="nDescricao"  class="form-control" id="iDescricao" placeholder="Exemplo: Foi realizado através deste chamado a criação de um novo usuário de acesso aos computadores da secretária..." required><?php echo!empty($formCad['descricao']) ? $formCad['descricao'] : ''; ?></textarea>
                                    <div class="invalid-feedback">
                                        Informe uma descrição
                                    </div>
                                </div>
                            </div>
                            <!--<div class="row">-->
                            <div>
                                <label>Anexo: <small class="text-muted">O nome do arquivo será alterado pelo sistema para evitar conflitos com nome de arquivos iguais.</small></label><br/>
                            </div>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="nFile" id="iAnexo" >
                                <label class="custom-file-label" for="iAnexo">Nenhum arquivo selecionado.</label>
                                <input type="hidden" name="nFileEnviado"  value="<?php echo isset($formCad['anexo']) ? $formCad['anexo'] : null; ?>"/>

                            </div>

                        </article>
                        <!--<article class="card-body">-->
                    </section>
                    <!--<section class="card">-->
                    <div class="row mt-3">
                        <div class="form-group col">
                            <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="valida_formChamado()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                            <a href="<?php echo BASE_URL ?>ti/chamado/<?php echo md5($chamado['id']) ?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>


<?php
if ($this->checkSetor() == 10):
    if (isset($chamados_historicos) && is_array($chamados_historicos)) :
        foreach ($chamados_historicos as $indice) :
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
                                <li><b>Histórico do chamado: </b> <?php echo!empty($indice['chamado_id']) ? 'Nº ' . str_pad($indice['chamado_id'], 5, '0', STR_PAD_LEFT) : '' ?>;</li>
                                <li><b>Status: </b> <?php echo isset($indice['status']) && !empty($indice['status']) ? $indice['status'] : '0' ?>;</li>
                                <li><b>Usuário: </b> <?php echo isset($indice['usuario']) && !empty($indice['usuario']) ? $indice['usuario'] : '0' ?>;</li>
                                <li><b>Data: </b> <?php echo isset($indice['data']) && !empty($indice['data']) ? $this->formatDateViewComplet($index['data']) : '0' ?>;</li>
                                <li><b>Descricão: </b> <?php echo isset($indice['descricao']) && !empty($indice['descricao']) ? $indice['descricao'] : '0' ?>;</li>
                            </ul>
                            <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro deixará de existir no sistema.</p>
                        </article>
                        <footer class="modal-footer">
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'ti/excluirhistorico/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
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