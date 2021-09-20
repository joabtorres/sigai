<?php

class fisc_solicitacaoController extends fiscController {

    public function index() {
        if ($this->checkUser() && ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $this->loadView('404');
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

}

?>