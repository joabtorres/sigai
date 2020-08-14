<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Consultar Usuários</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo BASE_URL ?>usuario/consultar"><i class="fa fa-users"></i> Consultar Usuários</a></li>
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
                        <form method="GET" action="<?php echo BASE_URL ?>usuario/consultar/1">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for='iSelectBuscar'>Por: </label><br/>
                                    <select class="custom-select" name="nSelectBuscar" id="iSelectBuscar" required>
                                        <option value="E-mail">Email</option>
                                        <option value="Nome">Nome</option>
                                    </select>
                                    <div class="invalid-feedback">Informe o setor</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="iCampo">Campo:  </label>
                                    <input type="text" class="form-control" name="nCampo" id="iCampo" required/>
                                    <div class="invalid-feedback">
                                        Informe nome / email do usuário
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2 mb-3">
                                    <button type="submit" name="nBuscarBT" value="BuscarBT" class="btn btn-warning mt-4 text-center"><i class="fa fa-search pull-left"></i> Buscar</button>
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
    if (!empty($usuarios)) {
        ?>
        <div class="row">
            <?php foreach ($usuarios as $usuario): ?>
                <div class="col-md-3 mb-2 mt-2 text-center">
                    <figure class="border border-secondary bg-secondary pt-2 text-while">
                        <img src="<?php echo !empty($usuario['imagem']) ? BASE_URL.$usuario['imagem']: BASE_URL . 'assets/imagens/user.png' ?>" alt="ALT" class="img-responsive img-center rounded-circle mb-2"/>
                        <p class="text-center text-uppercase font-bold mb-1 mt-0"><?php echo (!empty($usuario['nome'])) ? $usuario['nome'] : '' ?></p>
                        <p class="text-center text-lowercase mb-1 mt-0"><?php echo (!empty($usuario['email'])) ? $usuario['email'] : '' ?></p>
                        <p class="text-center  mb-1 mt-0"><?php echo (!empty($usuario['cargo'])) ? $usuario['cargo'] : '' ?></p>
                        <figcaption class="caption text-center bg-light pt-1 pb-1 pl-1 pr-1">
                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" data-toggle="modal" data-target="#modal_recupera_senha_<?php echo md5($usuario['id']) ?>" title="Recupera Senha"><i class="fa fa-sign-out-alt"></i> Recupera Senha</button> 
                            <a href="<?php echo BASE_URL . 'usuario/editar/' . md5($usuario['id']) ?>" class="btn btn-primary btn-block btn-sm mt-1" title="Editar"><i class="fa fa-pencil-alt"></i> Editar</a> 
                            <button type="button"  class="btn btn-danger btn-block btn-sm mt-1" data-toggle="modal" data-target="#modal_excluir_<?php echo md5($usuario['id']) ?>" title="Excluir"> <i class="fa fa-trash"></i> Excluir</button>
                        </figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    } else {
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
                        echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "usuario/consultar/1" . $metodo_buscar . "'><span aria-hidden='true'>&laquo;</span></a></li>";
                        for ($p = 0; $p < ceil($paginas); $p++) {
                            if ($pagina_atual == ($p + 1)) {
                                echo "<li class='page-item active'><a class='page-link' href='" . BASE_URL . "usuario/consultar/" . ($p + 1) . $metodo_buscar . "'>" . ($p + 1) . "</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "usuario/consultar/" . ($p + 1) . $metodo_buscar . "'>" . ($p + 1) . "</a></li>";
                            }
                        }
                        echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "usuario/consultar/" . ceil($paginas) . $metodo_buscar . "'>&raquo;</a></li>";
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
if ($this->checkUser() == 10):
    if (isset($usuarios) && is_array($usuarios)) :
        foreach ($usuarios as $indice) :
            ?>      
            <!--MODAL - ESTRUTURA BÁSICA-->
            <section class="modal fade" id="modal_recupera_senha_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
                <article class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <section class="modal-content">
                        <header class="modal-header bg-success text-while">
                            <h4 class="modal-title">Esqueceu a senha?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </header>
                        <article class="modal-body">
                            <ul class="list-unstyled">
                                <li><b class="font-bold">Nome: </b> <?php echo $indice['nome'] ?>;</li>
                                <li><b class="font-bold">E-mail: </b> <?php echo $indice['email'] ?>;</li>
                                <?php if (isset($indice['cargo'])) : ?>
                                    <li><b class="font-bold">Cargo: </b> <?php echo $indice['cargo'] ?>.</li>
                                <?php endif; ?>
                            </ul>
                            <form method="POST">
                                <input type="hidden" name="nEmail" value="<?php echo $indice['email'] ?>"/>
                                <button type="submit" value="Enviar" name="nEnviar" class=" btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Enviar nova senha</button>
                            </form>
                        </article>
                        <footer class="modal-footer">
                            <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        </footer>
                    </section>
                </article>
            </section>
            <!--MODAL - ESTRUTURA BÁSICA-->
            <section class="modal fade" id="modal_excluir_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
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
                                <li><b class="font-bold">Nome: </b> <?php echo $indice['nome']?>;</li>
                                <li><b class="font-bold">E-mail: </b> <?php echo $indice['email'] ?>;</li>
                                <?php if (isset($indice['cargo'])) : ?>
                                    <li><b class="font-bold">Cargo: </b> <?php echo $indice['cargo'] ?>.</li>
                                <?php endif; ?>
                            </ul>
                            <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro e todos registos relacionados ao mesmo deixaram de existir no sistema.</p>
                        </article>
                        <footer class="modal-footer">
                            <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'usuario/excluir/' . md5($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a> 
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

<!--div model-->
<div class="modal fade" id="modal_confirmacao_email" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4>Confirmação de e-mail</h4>
            </div>
            <div class="modal-body">
                <p>Será enviado um e-mail com uma nova senha.</p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default pull-right"><i class="fa fa-times"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>       
<!--/div model-->

<!--div model-->
<div class="modal fade" id="modal_invalido_email" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4>Atenção</h4>
            </div>
            <div class="modal-body">
                <p>Você informou um e-mail inválido ou não é permitido alterar a senha deste usuário.</p>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default pull-right"><i class="fa fa-times"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>       
<!--/div model-->