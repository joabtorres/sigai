<?php

class ccaController extends controller {

    public function index() {
        $this->cadastro();
    }

    public function cadastro() {
        if ($this->checkUser()) {
            $viewName = "cca/cadastro";
            $dados = array();
            $crudModel = new crud_db();
            $dados['setores'] = $crudModel->read("SELECT * FROM setor");
            $dados['usuarios'] = $crudModel->read("SELECT * FROM usuario");

            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $chamado = array();
                //setor
                $chamado['setor_id'] = addslashes($_POST['nSetor']);
                //usuario
                $chamado['usuario_id'] = addslashes($_POST['nUsuario']);
                //status
                $chamado['status_id'] = '1';
                //assunto
                $chamado['assunto'] = addslashes($_POST['nAssunto']);
                //data
                $chamado['data'] = date("Y-m-d H:i:00", (time() - 18000));
                //descricao
                $chamado['descricao'] = addslashes($_POST['nDescricao']);

                if (isset($_FILES['nFile']) && $_FILES['nFile']['error'] == 0) {
                    $chamado['anexo'] = $this->upload_file($_FILES['nFile']);
                    if (!empty($_POST['nFileEnviado'])) {
                        $crudModel->delete_file($_POST['nFileEnviado']);
                    }
                } else {
                    $chamado['anexo'] = addslashes($_POST['nFileEnviado']);
                }
                $resultado = $crudModel->create("INSERT INTO chamado (setor_id, usuario_id, status_id, assunto, data, descricao, anexo) VALUES (:setor_id, :usuario_id, :status_id, :assunto, :data, :descricao, :anexo) ", $chamado);
                if ($resultado) {
                    $dados['erro'] = array('class' => 'alert-success', 'msg' => '<i class="fa fa-check-circle" aria-hidden="true"></i> Cadastro realizado com sucesso!');
                } else {
                    $dados['chamado'] = $chamado;
                }
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function consultar($page = 1) {
        if ($this->checkUser()) {
            $view = "cca/consulta";
            $dados = array();
            $crudModel = new crud_db();
            $dados['setores'] = $crudModel->read("SELECT * FROM setor");
            $dados['usuarios'] = $crudModel->read("SELECT * FROM usuario");
            $dados['chamado_status'] = $crudModel->read("SELECT * FROM chamado_status");

            $sql = "SELECT C.*, s.nome as setor, s.abreviacao, cs.nome as status, u.nome as usuario FROM chamado AS c INNER JOIN setor as s INNER JOIN chamado_status as cs INNER JOIN usuario as u WHERE c.setor_id=s.id AND c.status_id=cs.id  AND c.usuario_id=u.id ";
            $arrayForm = array();
            if (isset($_GET['nBuscarBT'])) {
                $parametros = "?nSetor=" . $_GET['nSetor'] . "&nUsuario=" . $_GET['nUsuario'] . "&nStatus=" . $_GET['nStatus'] . "&nModoPDF=" . $_GET['nModoPDF'] . "&nBuscarBT=BuscarBT";
                if ($_GET['nModoPDF'] == 1) {
                    $url = BASE_URL . "cca/relatorio_pdf" . $parametros;
                    echo "<script>window.open('$url', '_blank')</script>";
                }
                //setor
                if (!empty($_GET['nSetor'])) {
                    $sql .= " AND c.setor_id=:id_setor ";
                    $arrayForm['id_setor'] = addslashes($_GET['nSetor']);
                }
                //nUsuario
                if (!empty($_GET['nUsuario'])) {
                    $sql .= " AND u.id=:id_usuario ";
                    $arrayForm['id_usuario'] = addslashes($_GET['nUsuario']);
                }
                //setor
                if (!empty($_GET['nStatus'])) {
                    $sql .= " AND c.status_id=:id_status ";
                    $arrayForm['id_status'] = addslashes($_GET['nStatus']);
                }
                //paginacao
                $limite = 30;
                $total_registro = $crudModel->read($sql, $arrayForm);
                $paginas = count($total_registro) / $limite;
                $indice = 0;
                $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
                $indice = ($pagina_atual - 1) * $limite;
                $dados["paginas"] = $paginas;
                $dados["pagina_atual"] = $pagina_atual;
                $dados['metodo_buscar'] = $parametros;
                $sql .= "  ORDER BY c.id DESC LIMIT $indice,$limite ";
                $chamados = $crudModel->read($sql, $arrayForm);
            } else {
                //paginacao
                $limite = 30;
                $total_registro = $crudModel->read_specific("SELECT COUNT(id) AS qtd FROM chamado");
                $paginas = $total_registro['qtd'] / $limite;
                $indice = 0;
                $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
                $indice = ($pagina_atual - 1) * $limite;
                $dados["paginas"] = $paginas;
                $dados["pagina_atual"] = $pagina_atual;
                $dados['metodo_buscar'] = "";
                $sql .= " ORDER BY c.id DESC LIMIT $indice,$limite";
                $chamados = $crudModel->read($sql);
            }
            $dados['chamados'] = $chamados;
            $this->loadTemplate($view, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function chamado($id = null) {
        if ($this->checkUser()) {
            $view = "cca/chamado";
            $dados = array();
            $crudModel = new crud_db();
            $dados['setores'] = $crudModel->read("SELECT * FROM setor");
            $dados['usuarios'] = $crudModel->read("SELECT * FROM usuario");
            $dados['chamado_status'] = $crudModel->read("SELECT * FROM chamado_status");
            // cadastro
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $cadForm = array();
                $cadForm['chamado_id'] = addslashes($_POST['nChamado']);
                $cadForm['status_id'] = addslashes($_POST['nStatus']);
                $cadForm['usuario_id'] = $_SESSION['usuario']['id'];
                $cadForm['data'] = $this->formatDateDBComplet($_POST['nData']);
                $cadForm['descricao'] = addslashes($_POST['nDescricao']);
                if (isset($_FILES['nFile']) && $_FILES['nFile']['error'] == 0) {
                    $cadForm['anexo'] = $this->upload_file($_FILES['nFile']);
                    if (!empty($_POST['nFileEnviado'])) {
                        $crudModel->delete_file($_POST['nFileEnviado']);
                    }
                } else {
                    $cadForm['anexo'] = addslashes($_POST['nFileEnviado']);
                }
                $resultado = $crudModel->create("INSERT INTO chamado_historico (chamado_id, status_id, usuario_id , data, descricao, anexo) VALUES (:chamado_id, :status_id, :usuario_id , :data, :descricao, :anexo) ", $cadForm);
                if ($resultado) {
                    $crudModel->update('UPDATE chamado SET status_id=:status WHERE id=:id', array('status' => $cadForm['status_id'], 'id' => $cadForm['chamado_id']));
                    $dados['erro'] = array('class' => 'alert-success', 'msg' => '<i class="fa fa-check-circle" aria-hidden="true"></i> Cadastro realizado com sucesso!');
                } else {
                    $dados['cadForm'] = $cadForm;
                }
            }

            $sql = "SELECT C.*, s.nome as setor, s.abreviacao, cs.nome as status, u.nome as usuario, u.portaria, u.imagem FROM chamado AS c INNER JOIN setor as s INNER JOIN chamado_status as cs INNER JOIN usuario as u WHERE c.setor_id=s.id AND c.status_id=cs.id  AND c.usuario_id=u.id AND md5(c.id)=:id";
            $arraySql = array('id' => $id);
            $chamados = $crudModel->read_specific($sql, $arraySql);
            $dados['chamado'] = $chamados;

            $chamados_historicos = $crudModel->read("SELECT h.*, cs.nome as status, u.nome as usuario, u.portaria, u.imagem, s.nome as setor, s.abreviacao FROM chamado as c INNER JOIN chamado_historico AS h INNER JOIN chamado_status as cs INNER JOIN usuario as u INNER JOIN setor as s WHERE h.chamado_id=c.id AND h.status_id=cs.id  AND h.usuario_id=u.id AND u.setor_id=s.id");
            $dados['chamados_historicos'] = $chamados_historicos;
            $this->loadTemplate($view, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function editar($id) {
        if ($this->checkUser()) {
            $view = "cca/editar";
            $dados = array();
            $crudModel = new crud_db();
            $this->loadTemplate($view, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function excluirchamado($id) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read("SELECT * FROM chamado_historico WHERE md5(chamado_id)=:id", array('id' => addslashes($id)));
            if (is_array($resultado) && !empty($resultado)) {
                foreach ($resultado as $index) {
                    if (!empty($index['anexo'])) {
                        $crudModel->delete_file($index['anexo']);
                    }
                    $crudModel->remove("DELETE FROM chamado_historico WHERE id=:id", array('id' => addslashes($index['id'])));
                }
            }
            $resultado = $crudModel->read_specific("SELECT * FROM chamado WHERE md5(id)=:id", array('id' => addslashes($id)));
            if (is_array($resultado) && !empty($resultado['anexo'])) {
                $crudModel->delete_file($resultado['anexo']);
            }
            if ($crudModel->remove("DELETE FROM chamado WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'cca/consultar/1';
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function excluirhistorico($id) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM chamado_historico WHERE md5(id)=:id", array('id' => addslashes($id)));
            if (is_array($resultado) && !empty($resultado['anexo'])) {
                $crudModel->delete_file($resultado['anexo']);
            }
            if ($crudModel->remove("DELETE FROM chamado_historico WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'cca/chamado/'.md5($resultado['chamado_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    private function upload_file($file) {
        $arquivo = array();
        $arquivo['temp'] = $file['tmp_name'];
        $arquivo['extensao'] = explode(".", $file['name']);
        $arquivo['extensao'] = strtolower(end($arquivo['extensao']));
        $arquivo['name'] = 'chamado_' . date('d-m-Y') . "_" . md5(md5(rand(1000, 900000) . time())) . '.' . $arquivo['extensao'];
        $arquivo['diretorio'] = 'uploads/chamado';
        $arquivo['arquivo'] = $arquivo['diretorio'] . "/" . $arquivo['name'];
        if (move_uploaded_file($arquivo['temp'], $arquivo['arquivo'])) {
            return $arquivo['arquivo'];
        } else {
            return null;
        }
    }

}
