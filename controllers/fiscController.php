<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fiscController
 *
 * @author joab
 */
class fiscController extends controller {

    public function index() {
        if ($this->checkUser()) {
            $this->loadView('404');
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function get_tipo_documento() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $protocolo_id = addslashes($_POST['protocolo_id']);
            if (isset($_POST['id_user'])) {
                $user_id = addslashes($_POST['id_user']);
            }
            $usuarios = $crudModel->read("SELECT * FROM fisc_tipo_documento WHERE protocolo_id=:id ORDER BY documento ASC", array('id' => $protocolo_id));
            if (!isset($user_id)) {
                echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo do documento </option>';
            }
            foreach ($usuarios as $indice) {
                if (isset($user_id) && $indice['id'] == $user_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['documento'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['documento'] . '</option>';
                }
            }
        }
    }

    public function get_search_tipo_documento() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $protocolo_id = addslashes($_POST['protocolo_id']);
            if (isset($_POST['id_user'])) {
                $user_id = addslashes($_POST['id_user']);
            }
            $usuarios = $crudModel->read("SELECT * FROM fisc_tipo_documento WHERE protocolo_id=:id ORDER BY documento ASC", array('id' => $protocolo_id));
            if (!isset($user_id)) {
                echo '<option value="" selected = "selected" >Todos </option>';
            }
            foreach ($usuarios as $indice) {
                if (isset($user_id) && $indice['id'] == $user_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['documento'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['documento'] . '</option>';
                }
            }
        }
    }

    public function get_bairro() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $cidade_id = addslashes($_POST['cidade_id']);
            if (isset($_POST['bairro_id'])) {
                $bairro_id = addslashes($_POST['bairro_id']);
            }
            $usuarios = $crudModel->read("SELECT * FROM bairro WHERE cidade_id=:id ORDER BY bairro ASC", array('id' => $cidade_id));

            if (!isset($bairro_id)) {
                echo '<option value="" selected = "selected" disabled="disabled">Selecione o bairro </option>';
            }
            foreach ($usuarios as $indice) {
                if (isset($bairro_id) && $indice['id'] == $bairro_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['bairro'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['bairro'] . '</option>';
                }
            }
        }
    }

    public function cadastro_solicitacao() {
        if ($this->checkUser() && ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $viewName = 'fisc/solicitacao/cadastro';
            $dados = array();
            $crud = new fisc_model();
            $dados['tipo_protocolo'] = $crud->read("SELECT * FROM fisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['documento'] = $crud->read("SELECT * FROM fisc_tipo_documento ORDER BY documento ASC");
            $dados['origem'] = $crud->read("SELECT * FROM fisc_origem ORDER BY origem ASC");
            $dados['tipo_solicitacao'] = $crud->read("SELECT * FROM fisc_tipo_solicitacao ORDER BY tipo_solicitacao ASC");
            $dados['cidade'] = $crud->read("SELECT * FROM cidade");
            $dados['bairro'] = $crud->read("SELECT * FROM bairro WHERE cidade_id=1 ORDER BY bairro ASC");
            // cadastro
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $cadForm = array();
                //id
                if (!empty($_POST['nId'])) {
                    $cadForm['id'] = addslashes($_POST['nId']);
                }
                /*                 * *********************
                 * protocolo
                 * ******************** */
                //data do protocolo
                $cadForm['protocolo']['data_protocolo'] = $this->formatDateBD($_POST['nData']);
                //tipo do protocolo
                $cadForm['protocolo']['protocolo_id'] = addslashes($_POST['nTipoProtocolo']);
                //tipo do documento
                $cadForm['protocolo']['tipo_documento_id'] = addslashes($_POST['nTipoDocumento']);
                //origem
                $cadForm['protocolo']['origem_id'] = addslashes($_POST['nOrigem']);
                //protocolo
                $cadForm['protocolo']['numero_protocolo'] = addslashes($_POST['nNumeroProtocolo']);
                $cadForm['protocolo']['ano_protocolo'] = addslashes($_POST['nAnoProtocolo']);
                //oficio
                $cadForm['protocolo']['numero_oficio'] = addslashes($_POST['nNumeroOficio']);
                $cadForm['protocolo']['ano_oficio'] = addslashes($_POST['nAnoOficio']);
                //memorando
                $cadForm['protocolo']['numero_memorando'] = addslashes($_POST['nNumeroMemorando']);
                $cadForm['protocolo']['ano_memorando'] = addslashes($_POST['nAnoMemorando']);
                $cadForm['protocolo']['hash'] = $this->hash_md5();
                /*                 * *********************
                 * solicitação
                 * ******************** */
                //tipo da solicitacao
                $cadForm['solicitacao']['tipo_solicitacao_id'] = addslashes($_POST['nTipoSolicitacao']);
                //denunciante
                $cadForm['solicitacao']['solicitante'] = addslashes($_POST['nDenunciado']);
                $cadForm['solicitacao']['telefone'] = addslashes($_POST['nTelefone']);
                $cadForm['solicitacao']['email'] = addslashes($_POST['nEmail']);
                $cadForm['solicitacao']['descricao'] = addslashes($_POST['nDescricao']); //descricao
                $cadForm['solicitacao']['cidade_id'] = addslashes($_POST['nCidade']); //cidade
                $cadForm['solicitacao']['bairro_id'] = addslashes($_POST['nBairro']); //bairro
                $cadForm['solicitacao']['endereco'] = addslashes($_POST['nEndereco']); //endereco
                $cadForm['solicitacao']['latitude'] = addslashes($_POST['nLatitude']); // latitude
                $cadForm['solicitacao']['longitude'] = addslashes($_POST['nLongitude']); // longitude
                /*                 * *********************
                 * denunciante
                 * ******************** */
                $resultado = $crud->create("INSERT INTO fisc_protocolo (data_protocolo, protocolo_id, tipo_documento_id, origem_id, numero_protocolo, ano_protocolo, numero_oficio, ano_oficio, numero_memorando, ano_memorando, hash) VALUES (:data_protocolo, :protocolo_id, :tipo_documento_id, :origem_id, :numero_protocolo, :ano_protocolo, :numero_oficio, :ano_oficio, :numero_memorando, :ano_memorando, :hash)", $cadForm['protocolo']);
                if ($resultado) {
                    $protocolo = $crud->read_specific("SELECT * FROM fisc_protocolo WHERE hash=:hash", array('hash' => $cadForm['protocolo']['hash']));
                    $cadForm['solicitacao']['protocolo_id'] = $protocolo['id'];
                    $resultado = $crud->create("INSERT INTO fisc_solicitacao (protocolo_id, tipo_solicitacao_id, solicitante, telefone, email, descricao, cidade_id, bairro_id, endereco, latitude, longitude) VALUES (:protocolo_id, :tipo_solicitacao_id, :solicitante, :telefone, :email, :descricao, :cidade_id, :bairro_id, :endereco, :latitude, :longitude)", $cadForm['solicitacao']);
                    if ($resultado) {
                        $solicitacao = $crud->read_specific("SELECT * FROM fisc_solicitacao WHERE protocolo_id=:id", array('id' => $protocolo['id']));
                        $historico = array();
                        $historico['data'] = $this->getDatatimeNow();
                        $historico['descricao'] = "Foi realizado o cadastro da solicitação no banco de dados";
                        $historico['usuario_id'] = $this->getIdUser();
                        $historico['solicitacao_id'] = $solicitacao['id'];
                        $crud->create("INSERT INTO fisc_historico_solicitacao (data, descricao, usuario_id, solicitacao_id) VALUES (:data, :descricao, :usuario_id, :solicitacao_id) ", $historico);
                        $dados['erro'] = array('class' => 'alert-success', 'msg' => '<i class="fa fa-check-circle" aria-hidden="true"></i> Cadastro realizado com sucesso!');
                    }
                }
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

}
