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

    public function cadastro_denuncia() {
        if ($this->checkUser() && ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $viewName = 'cofisc/cadastra-denuncia';
            $dados = array();
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function cadastro_solicitacao() {
        
    }

}
