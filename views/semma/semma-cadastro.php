<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Dados da Secretaria</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#" ><i class="fas fa-angle-double-right"></i> CCA</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo BASE_URL ?>semma/index"><i class="fas fa-cogs"></i> Dados da Secretaria</a></li>
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
            <section class="card bg-light">
                <header class="card-header">
                    <h1 class="card-title h5 mb-1"><i class="fas fa-cogs"></i> Dados da Secretaria</h1>
                </header>
                <article class="card-body">
                    <form method="POST" action="<?php echo BASE_URL ?>semma/index" enctype="multipart/form-data" autocomplete="off"  name="nFormEmpresa">

                        <input type="hidden" name="nId" value="<?php echo!empty($arrayCad['id']) ? $arrayCad['id'] : 0; ?>"/>
                        <!--<div class="row">;;;-->
                        <div class="row">
                            <div class="col mb-3"
                                 <label for='iNome'>Nome: *</label><br/>
                                <input type="text" name="nNome"  class="form-control" id="iNome" value="<?php echo!empty($arrayCad['nome']) ? $arrayCad['nome'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o nome da secretária
                                </div>
                            </div>
                            <div class="col-md-2 mb-3"
                                 <label for='iAbrevicao'>Abreviação: *</label><br/>
                                <input type="text" name="nAbrevicao"  class="form-control" id="iAbrevicao" value="<?php echo!empty($arrayCad['abreviacao']) ? $arrayCad['abreviacao'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe a abreviação
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3"
                                 <label for='iEndereco'>Endereço: *</label><br/>
                                <input type="text" name="nEndereco"  class="form-control" id="iEndereco" value="<?php echo!empty($arrayCad['endereco']) ? $arrayCad['endereco'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o endereço
                                </div>
                            </div>
                            <div class="col-md-2 mb-3"
                                 <label for='iCEP'>CEP: *</label><br/>
                                <input type="text" name="nCEP"  class="form-control" id="iCEP" value="<?php echo!empty($arrayCad['cep']) ? $arrayCad['cep'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe a abreviação
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3"
                                 <label for='iCNPJ'>CNPJ: *</label><br/>
                                <input type="text" name="nCNPJ"  class="form-control" id="iCNPJ" value="<?php echo!empty($arrayCad['cnpj']) ? $arrayCad['cnpj'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o CNPJ
                                </div>
                            </div>
                            <div class="col-md-3 mb-3"
                                 <label for='iTelefone'>Telefone: *</label><br/>
                                <input type="text" name="nTelefone"  class="form-control" id="iTelefone" value="<?php echo!empty($arrayCad['telefone']) ? $arrayCad['telefone'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o Telefone
                                </div>
                            </div>

                            <div class="col-md-3 mb-3"
                                 <label for='iEmail'>Email: *</label><br/>
                                <input type="text" name="nEmail"  class="form-control" id="iEmail" value="<?php echo!empty($arrayCad['email']) ? $arrayCad['email'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o Email
                                </div>
                            </div>
                            <div class="col-md-3 mb-3"
                                 <label for='iSite'>Site: *</label><br/>
                                <input type="text" name="nSite"  class="form-control" id="iSite" value="<?php echo!empty($arrayCad['email']) ? $arrayCad['email'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Informe o Email
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">-->
                        <div>
                            <label>Imagem: <small class="text-muted">O nome do arquivo será alterado pelo sistema para evitar conflitos com nome de arquivos iguais.</small></label><br/>
                            <div class="text-center my-5">
                                <img src="<?php echo!empty($arrayCad['figura']) ? BASE_URL . $arrayCad['figura'] : BASE_URL . 'assets/imagens/cropped-semma.png' ?>"width="225px" id="iImgEmpresa">
                                <div class="small mt-1">Dimensção recomendada da imagem: 225px x 85px</div>
                            </div>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="nFile" id="iAnexo" onchange="readURLEmpresa(this)">
                            <label class="custom-file-label" for="iAnexo">Nenhum arquivo selecionado.</label>
                            <input type="hidden" name="nFileEnviado"  value="<?php echo isset($arrayCad['figura']) ? $arrayCad['figura'] : null; ?>"/>

                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="valida_formEmpresa()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
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
