<?php

class homeController extends controller {

    public function index() {
        if ($this->checkUser()) {
            $viewName = "home";
            $dados = array();
            $this->loadTemplate($viewName, $dados);
        }
    }

}

?>