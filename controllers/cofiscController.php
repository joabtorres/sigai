<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cofiscController
 *
 * @author joab
 */
class cofiscController extends controller {

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
            $usuarios = $crudModel->read("SELECT * FROM cofisc_tipo_documento WHERE protocolo_id=:id ORDER BY documento ASC", array('id' => $protocolo_id));

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

            foreach ($usuarios as $indice) {
                if (isset($bairro_id) && $indice['id'] == $bairro_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['bairro'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['bairro'] . '</option>';
                }
            }
        }
    }

    public function cadastro_denuncia() {
        if ($this->checkUser() && ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $viewName = 'cofisc/cadastra-denuncia';
            $dados = array();
            $crud = new cofisc_model();
            $dados['tipo_protocolo'] = $crud->read("SELECT * FROM cofisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['origem'] = $crud->read("SELECT * FROM cofisc_origem ORDER BY origem ASC");
            $dados['tipo_denuncia'] = $crud->read("SELECT * FROM cofisc_tipo_denuncia ORDER BY tipo_denuncia ASC");
            $dados['cidade'] = $crud->read("SELECT * FROM cidade");
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
                $cadForm['data_protocolo'] = $this->formatDateBD($_POST['nData']);
                //tipo do protocolo
                $cadForm['protocolo_id'] = addslashes($_POST['nTipoProtocolo']);
                //tipo do documento
                $cadForm['tipo_documento_id'] = addslashes($_POST['nTipoDocumento']);
                //origem
                $cadForm['origem_id'] = addslashes($_POST['nOrigem']);
                //protocolo
                $cadForm['numero_protocolo'] = addslashes($_POST['nNumeroProtocolo']);
                $cadForm['ano_protocolo'] = addslashes($_POST['nAnoProtocolo']);
                //oficio
                $cadForm['numero_oficio'] = addslashes($_POST['nNumeroOficio']);
                $cadForm['ano_oficio'] = addslashes($_POST['nAnoOficio']);
                //memorando
                $cadForm['numero_memorando'] = addslashes($_POST['nNumeroMemorando']);
                $cadForm['ano_memorando'] = addslashes($_POST['nAnoMemorando']);
                $cadForm['hash'] = $this->hash_md5();
                $cadData = $cadForm;
                /*                 * *********************
                 * Denuncia
                 * ******************** */
                //tipo da denuncia
                $cadForm['tipo_denuncia_id'] = addslashes($_POST['nTipoDenuncia']);
                //denunciante
                $cadForm['denunciado'] = addslashes($_POST['nDenunciado']);
                $cadForm['descricao'] = addslashes($_POST['nDescricao']); //descricao
                $cadForm['cidade_id'] = addslashes($_POST['nCidade']); //cidade
                $cadForm['bairro_id'] = addslashes($_POST['nBairro']); //bairro
                $cadForm['endereco'] = addslashes($_POST['nEndereco']); //endereco
                $cadForm['latitude'] = addslashes($_POST['nLatitude']); // latitude
                $cadForm['longitude'] = addslashes($_POST['nLongitude']); // longitude
                /*                 * *********************
                 * denunciante
                 * ******************** */
                $cadForm['denunciante'] = addslashes($_POST['nDenunciante']);
                $cadForm['telefone'] = addslashes($_POST['nTelefone']);
                $cadForm['email'] = addslashes($_POST['nEmail']);
                $resultado = $crud->create("INSERT INTO cofisc_protocolo (data_protocolo, protocolo_id, tipo_documento_id, origem_id, numero_protocolo, ano_protocolo, numero_oficio, ano_oficio, numero_memorando, ano_memorando, hash) VALUES (:data_protocolo, :protocolo_id, :tipo_documento_id, :origem_id, :numero_protocolo, :ano_protocolo, :numero_oficio, :ano_oficio, :numero_memorando, :ano_memorando, :hash)", $cadForm);
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function cadastro_solicitacao() {
        
    }

    private function hash_md5() {
        return md5(microtime(true) . mt_Rand(10000, 90000));
    }

}
