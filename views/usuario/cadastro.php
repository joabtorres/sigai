<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Novo Usuário</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo BASE_URL ?>usuario/cadastro"><i class="fas fa-user-plus"></i> Novo Usuário</a></li>
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
    <div class="row" id="container-usuario-form">
        <div class="col">
            <section class="card bg-light border-secondary">
                <header class="card-header bg-dark text-white">
                    <h1 class="card-title h5 mb-1"><i class="fas fa-user-plus"></i> Novo Usuário</h1>
                </header>
                <article class="card-body">
                    <form method="POST" action="<?php echo BASE_URL ?>usuario/cadastro" enctype="multipart/form-data" autocomplete="off"  name="nFormUsuario" class="<?php echo (isset($arrayErro) && is_array($arrayErro) && !empty($arrayErro)) ? 'was-validated' : ''; ?>">
                        <input type="hidden" name="nId" value="<?php echo!empty($chamado['id']) ? $chamado['id'] : 0; ?>"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for='iSetor'>Setor: * </label>
                                    <select class="custom-select" name="nSetor" id="iSetor" required>
                                        <?php
                                        foreach ($setores as $indice) {
                                            if (isset($arrayCad['setor_id']) && $indice['id'] == $arrayCad['setor_id']) {
                                                echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['nome'] . ' - ' . $indice['abreviacao'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $indice['id'] . '">' . $indice['nome'] . ' - ' . $indice['abreviacao'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe o setor</div>
                                </div>                                
                                <div class="mb-3">
                                    <label for='iAssunto'>Cargo: </label><br/>
                                    <input type="text" name="nCargo"  class="form-control  mt-2" id="iAssunto" placeholder="Exemplo: Coordenador" value="<?php echo!empty($arrayCad['cargo']) ? $arrayCad['cargo'] : ''; ?>" >
                                </div>
                                <div class="mb-3">
                                    <label for='iMatricula'>Portaria: </label><br/>
                                    <input type="text" name="nMatricula"  class="form-control mt-2" id="iMatricula" placeholder="Exemplo: 1.122/19" value="<?php echo!empty($arrayCad['portaria']) ? $arrayCad['portaria'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for='iNome'>Nome: *</label><br/>
                                    <input type="text" name="nNome"  class="form-control mt-2" id="iNome" placeholder="Exemplo: Joab Torres Alencar" value="<?php echo!empty($arrayCad['nome']) ? $arrayCad['nome'] : ''; ?>" required>
                                    <div class="invalid-feedback">
                                        Informe o nome completo
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iUsuario'>Usuário: *</label><br/>
                                    <input type="text" name="nUsuario"  class="form-control  mt-2 <?php echo!empty($arrayErro['usuario']) ? $arrayErro['usuario']['class'] : ''; ?>" id="iUsuario" placeholder="Exemplo: joab.torres" value="<?php echo!empty($arrayCad['usuario']) ? $arrayCad['usuario'] : ''; ?>" required>
                                    <div class="invalid-feedback">
                                        <?php echo!empty($arrayErro['usuario']) ? $arrayErro['usuario']['msg'] : 'Informe o usuário'; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iEmail'>Email: *</label><br/>
                                    <input type="email" name="nEmail"  class="form-control  mt-2 <?php echo!empty($arrayErro['email']) ? $arrayErro['email']['class'] : ''; ?>" id="iEmail" placeholder="Exemplo: joab.alencar@hotmail.com" value="<?php echo!empty($arrayCad['email']) ? $arrayCad['email'] : ''; ?>" required>
                                    <div class="invalid-feedback">
                                        <?php echo!empty($arrayErro['email']) ? $arrayErro['email']['msg'] : 'Informe o email'; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iSenha'>Senha: *</label><br/>
                                    <input type="password" name="nSenha"  class="form-control  mt-2 <?php echo!empty($arrayErro['senha']) ? $arrayErro['senha']['class'] : ''; ?>" id="iSenha"  required>
                                    <div class="invalid-feedback">
                                        <?php echo!empty($arrayErro['senha']) ? $arrayErro['senha']['msg'] : 'Informe o senha'; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iRepetirSenha'>Repetir Senha: *</label><br/>
                                    <input type="password" name="nRepetirSenha"  class="form-control  mt-2 <?php echo!empty($arrayErro['senha']) ? $arrayErro['senha']['class'] : ''; ?>" id="iRepetirSenha" required>
                                    <div class="invalid-feedback">
                                        <?php echo!empty($arrayErro['senha']) ? $arrayErro['senha']['msg'] : "Os campos 'Senha' e 'Repetir Senha' devem ser preenchidos"; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for='idatacadastro'>Data de cadastro : </label>
                                    <input type="text" name="nDataCadastro"  class="form-control  mt-2 input-data date_serach" id="idatacadastro" placeholder="Exemplo: 25/01/2021" value="<?php echo!empty($arrayCad['acesso']) ? $arrayCad['acesso'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for='idatafinalizacao'>Data de finalização: </label>
                                    <input type="text" name="nDataFinalizacao"  class="form-control  mt-2  input-data date_serach" id="idatafinalizacao" placeholder="Exemplo: 05/06/2021" value="<?php echo!empty($arrayCad['acesso']) ? $arrayCad['acesso'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for='iOBS'>Observação: </label>
                                    <input type="text" name="nObservacao"  class="form-control  mt-2" id="iOBS" placeholder="Exemplo: Mudança de setor / Exonerado" value="<?php echo!empty($arrayCad['acesso']) ? $arrayCad['acesso'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for='iAcesso'>Nivel de Acesso: </label>
                                    <input type="text" name="nAcesso"  class="form-control  mt-2" id="iAcesso" placeholder="Exemplo: 1" value="<?php echo!empty($arrayCad['acesso']) ? $arrayCad['acesso'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <span>Status:</span><br/>
                                    <?php
                                    if (isset($usuario['status'])) {
                                        $status = array(array('nome' => 'Ativo', 'valor' => '1'), array('nome' => 'Inativo', 'valor' => '0'));
                                        foreach ($status as $statu) {
                                            if ($usuario['status'] == $statu['valor']) {
                                                echo ' <label><input type="radio" name="nStatus" value="' . $statu['valor'] . '" checked /> ' . $statu['nome'] . '</label> ';
                                            } else {
                                                echo ' <label><input type="radio" name="nStatus" value="' . $statu['valor'] . '" /> ' . $statu['nome'] . '</label> ';
                                            }
                                        }
                                    } else {
                                        echo ' <label><input type="radio" name="nStatus" value="1" checked/> Ativo</label> ';
                                        echo ' <label><input type="radio" name="nStatus" value="0"/> Inativo </label> ';
                                    }
                                    ?>                                  

                                </div>
                                <figure class="text-center mt-5">
                                    <img src="<?php echo (!empty($arrayCad['imagem'])) ? BASE_URL . $arrayCad['imagem'] : BASE_URL ?>assets/imagens/user.png" class="img-user" alt="Usuario" id="viewImagem-1"/>
                                    <figcaption class="mt-3">
                                        <input type="hidden" name="qtd_fotos" value="1">
                                        <label class="btn btn-warning text-while" onclick="readDefaultURL()">Padrão</label>
                                        <label class="btn btn-success" for="cFileImagem">Escolher Imagem</label>
                                        <input type="file" name="tImagem-1" id="cFileImagem" onchange="readURL(this)"/>
                                        <input type="hidden" name="nImagem"  value="<?php echo isset($arrayCad['imagem']) ? $arrayCad['imagem'] : null; ?>"/>
                                    </figcaption>
                                </figure>

                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button class="btn btn-success" name="nSalvar" value="Salvar" type="submit" onclick="valida_formUsuario()"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                                <a href="<?php echo BASE_URL ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </article>
                <!--<article class="card-body">-->
            </section>
            <!--<section class="card">-->
        </div>
    </div>
</div>
