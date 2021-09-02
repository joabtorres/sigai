<?php

class homeController extends controller {

    public function index() {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $dados = array();
            $dados['protocolo_tipo'] = $crudModel->read("SELECT * FROM protocolo_tipo");
            $dados['protocolo_objetivo'] = $crudModel->read("SELECT * FROM protocolo_objetivo ORDER BY objetivo ASC");
            $sql = "SELECT C.*, s.nome as setor, s.abreviacao, cs.nome as status, u.nome as usuario FROM ti_chamado AS c INNER JOIN setor as s INNER JOIN ti_chamado_status as cs INNER JOIN usuario as u WHERE c.setor_id=s.id AND c.status_id=cs.id  AND c.usuario_id=u.id AND c.status_id != 4 ORDER BY c.id DESC LIMIT 0,5";
            $sql = "SELECT C.*, s.nome as setor, s.abreviacao, cs.nome as status, u.nome as usuario FROM ti_chamado AS c INNER JOIN setor as s INNER JOIN ti_chamado_status as cs INNER JOIN usuario as u WHERE c.setor_id=s.id AND c.status_id=cs.id  AND c.usuario_id=u.id AND c.status_id = 4 ORDER BY c.id DESC LIMIT 0,5";
            $viewName = "home";
            $this->loadTemplate($viewName, $dados);
        }
    }

}

?>