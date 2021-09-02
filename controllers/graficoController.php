<?php

class graficoController extends controller {

    public function suporte_interno() {
        if ($this->checkUser()) {
            $crud = new crud_db();
            $resultado = $crud->read("SELECT ca.assunto as label, COUNT(*) AS data FROM ti_chamado_assunto AS ca INNER JOIN ti_chamado AS c WHERE ca.id=c.assunto_id GROUP BY c.assunto_id ORDER BY ca.id ASC");
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
    }

    public function protocolo_tipo() {
        if ($this->checkUser()) {
            $crud = new crud_db();
            $resultado = $crud->read("SELECT pt.tipo as label, COUNT(*) AS data FROM protocolo_tipo AS pt INNER JOIN protocolo AS p WHERE pt.id=p.tipo_id GROUP BY p.tipo_id ORDER BY pt.id ASC");
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
    }
    public function protocolo_objetivo() {
        if ($this->checkUser()) {
            $crud = new crud_db();
            $resultado = $crud->read("SELECT po.objetivo as label, COUNT(*) AS data FROM protocolo_objetivo AS po INNER JOIN protocolo AS p WHERE po.id=p.objetivo_id GROUP BY p.objetivo_id ORDER BY po.id ASC");
            echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
        }
    }

}
