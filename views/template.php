<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/gif" href="<?php echo BASE_URL ?>assets/imagens/icon.png" sizes="32x32" />
        <meta property="ogg:title" content="<?php echo NAME_PROJECT ?>">
        <meta property="ogg:description" content="<?php echo NAME_PROJECT ?>">

        <title><?php echo NAME_PROJECT ?></title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/mCustomScrollbar.min.css">
        <!-- Date datepicker CSS -->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/jquery-ui.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style.css">
        <!-- Font Awesome JS -->
        <script defer src="<?php echo BASE_URL ?>assets/js/all.js"></script>
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="<?php echo BASE_URL ?>assets/js/jquery-3.1.1.min.js"></script>
        <!-- Date datepicker JS -->
        <script src="<?php echo BASE_URL ?>assets/js/jquery-ui.js"></script>
        <script>base_url = '<?php echo BASE_URL ?>';</script>

        <!-- Our Custom SELECT 2 -->
        <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/select2.min.css">
        <!-- select2 JS -->
        <script defer src="<?php echo BASE_URL ?>assets/js/select2.min.js"></script>
    </head>

    <body>

        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fas fa-arrow-left"></i>
                </div>

                <div class="sidebar-header">
                    <h6> <b class="sidebar-sigla">SISPAM</b><br/> <small><em>Sistema de Procedimentos Ambientais para </em><abbr title="Secretaria Municipal de Meio Ambiente">SEMMA</abbr></small></h6>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt "></i> Página Inicial</a>
                    </li>
                    <li>
                        <a href="#protocoloSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-angle-double-right"></i> Protocolo</a>
                        <ul class="collapse list-unstyled" id="protocoloSubmenu">
                            <li>
                                <a href="<?php echo BASE_URL ?>protocolo/cadastro"><i class="fas fa-plus-square"></i> Novo Registro</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>protocolo/consultar"><i class="fas fa-tasks"></i> Consultar Protocolos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL ?>tramitacao/consultar"><i class="fas fa-copy"></i> Tramitação</a>
                    </li>
                    <?php if (($this->checkSetor() == 4 || $this->checkSetor() == 10)) { ?>
                        <li>
                            <a href="#fiscSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-angle-double-right"></i> Fiscalização</a>
                            <ul class="collapse list-unstyled" id="fiscSubmenu">
                                <li>
                                    <a href="<?php echo BASE_URL ?>fisc_denuncia/cadastro"><i class="fas fa-plus-square"></i> Nova Denúncia</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL ?>fisc_solicitacao/cadastro"><i class="fas fa-plus-square"></i> Nova Solicitação</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL ?>fisc_denuncia/consultar"><i class="fas fa-tasks"></i> Consultar Denuncias</a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL ?>fisc_solicitacao/consultar"><i class="fas fa-tasks"></i> Consultar Solicitações</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="#tiSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fas fa-angle-double-right"></i> Suporte Interno</a>
                        <ul class="collapse list-unstyled" id="tiSubmenu">
                            <li>
                                <a href="<?php echo BASE_URL ?>ti/cadastro"><i class="fas fa-plus-square"></i> Novo Chamado</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL ?>ti/consultar"><i class="fas fa-tasks"></i> Consultar Chamados</a>
                            </li>
                        </ul>
                    </li>
                    <?php if ($this->checkSetor() == 10) : ?>
                        <li>                        
                            <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false"> <i class="fas fa-angle-double-right"></i>  Usuários</a>
                            <ul class="collapse list-unstyled" id="userSubmenu">
                                <?php if ($this->checkUser() == 10) : ?>
                                    <li>
                                        <a href="<?php echo BASE_URL . 'usuario/cadastro' ?>"><i class="fas fa-user-plus"></i> Novo Usuário</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo BASE_URL . 'usuario/consultar' ?>"><i class="fa fa-users"></i> Consultar Usuários</a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="<?php echo BASE_URL . 'usuario/editar/' . md5($_SESSION['usuario']['id']) ?>"><i class="fas fa-user-edit"></i> Editar Usuário</a>
                                </li>
                            </ul>
                        </li>


                        <li>                        
                            <a href="#userConfig" data-toggle="collapse" aria-expanded="false"> <i class="fas fa-angle-double-right"></i> Semma</a>
                            <ul class="collapse list-unstyled" id="userConfig">
                                <li>
                                    <a href="<?php echo BASE_URL . 'semma' ?>"><i class="fas fa-cogs"></i> Dados da Secretaria</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo BASE_URL ?>usuario/sair"><i class="fa fa-sign-out-alt"></i> Sair</a>
                    </li>
                </ul>
                <div class="sidebar-footer">
                    <p>&copy; Copyright 2020 <br/> <a href="http://lattes.cnpq.br/0856780614635850" target="_blank">Joab Torres Alencar</a></p>
                </div>
            </nav>

            <!-- Page Content  -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-success">
                            <i class="fas fa-align-justify"></i>
                            <span>Menu</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario']['nome'] : 'Usuário'; ?> <b class="caret"></b>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo BASE_URL ?>usuario/editar/<?php echo md5($_SESSION['usuario']['id']) ?>"><i class="fas fa-users-cog"></i> Editar Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo BASE_URL ?>usuario/sair"><i class="fa fa-sign-out-alt "></i> Sair</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!--conteudo da página-->

                <?php $this->loadViewInTemplate($viewName, $viewData) ?>

                <!--conteudo da página-->
                <div class="mb-5"></div>
                <div id="col">
                    <hr>
                    <p class="text-center small " style="color: #666"><?php echo NAME_PROJECT ?> - Versão 1.0 <br/>
                        <span style="color: #666">&copy; Copyright 2020 - <a href="http://lattes.cnpq.br/0856780614635850" target="_blank">Joab Torres Alencar</a></span> </p>
                    <br>
                </div>
            </div>

        </div>

        <div class="overlay"></div>


        <!-- Bootstrap JS -->
        <script src="<?php echo BASE_URL ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL ?>assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo BASE_URL ?>assets/js/jquery.maskMoney.js"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script src="<?php echo BASE_URL ?>assets/js/script.js"></script>
    </body>

</html>


