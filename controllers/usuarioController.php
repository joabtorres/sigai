<?php

class usuarioController extends controller {

    public function index() {
        
    }

    public function cadastro() {
        if ($this->checkUser() == 10) {
            $dados = array();
            $viewName = "usuario/cadastro";
            $crudModel = new crud_db();
            $dados['setores'] = $crudModel->read("SELECT * FROM setor");
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $arrayCad = array();
                //setor
                $arrayCad['setor_id'] = addslashes($_POST['nSetor']);
                //portaria
                $arrayCad['portaria'] = addslashes($_POST['nMatricula']);
                //portaria
                $arrayCad['nome'] = addslashes($_POST['nNome']);
                //usuario
                $arrayCad['usuario'] = addslashes($_POST['usuario']);
                //email
                $arrayCad['usuario'] = addslashes($_POST['usuario']);

                print_r($arrayCad);

                $dados['arrayCad'] = $arrayCad;
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function editar($cod) {
        if (($this->checkUser() && $cod == md5($_SESSION['usuario']['id'])) || ($this->checkUser() >= 6)) {
            echo $this->checkUser();
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responsável desloga o usuário do sistema, limpando a $_SESSION['user_sgl']
     * 
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function sair() {
        if (isset($_SESSION['usuario'])) {
            $_SESSION = array();
            $url = "location: " . BASE_URL . "login";
            header($url);
        }
    }

}
