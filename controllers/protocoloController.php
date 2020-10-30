<?php

class protocoloController extends controller {
    public function index(){
        $this->cadastro();
    }
    public function cadastro() {
        if ($this->checkUser()) {
            $viewName = "protocolo/cadastro";
            $dados = array();
            $crudModel = new crud_db();
            $dados['setores'] = $crudModel->read("SELECT * FROM setor");
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

}
