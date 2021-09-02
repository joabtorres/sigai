<?php

class tramitacaoController extends controller {

    public function getusuarios() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $setor_id = addslashes($_POST['setor_id']);
            if (isset($_POST['id_user'])) {
                $user_id = addslashes($_POST['id_user']);
            }
            if (!isset($user_id)) {
                echo '<option value="" selected = "selected" disabled="disabled">Selecione o usuário </option>';
            }
            $usuarios = $crudModel->read("SELECT * FROM usuario WHERE status=1 AND setor_id=:id", array('id' => $setor_id));

            foreach ($usuarios as $indice) {
                if (isset($user_id) && $indice['id'] == $user_id['usuario_id']) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['nome'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['nome'] . '</option>';
                }
            }
        }
    }

    public function consultar($page = 1) {
        if ($this->checkUser()) {
            $view = "tramitacao/consulta";
            $dados = array();
            $crudModel = new crud_db();
            $dados['protocolo_tipo'] = $crudModel->read("SELECT * FROM protocolo_tipo");
            $dados['protocolo_objetivo'] = $crudModel->read("SELECT * FROM protocolo_objetivo ORDER BY objetivo ASC");

            $sql = "SELECT p.*, po.objetivo, pt.tipo FROM protocolo AS p INNER JOIN protocolo_objetivo AS po  INNER JOIN protocolo_tipo as pt WHERE p.objetivo_id=po.id AND p.tipo_id=pt.id ";
            $arrayForm = array();
            if (isset($_GET['nBuscarBT'])) {
                $_GET['nSelectBuscar'] = !empty($_GET['nSelectBuscar']) ? $_GET['nSelectBuscar'] : '';
                $parametros = "?nTipo=" . $_GET['nTipo'] . "&nObjeito=" . $_GET['nObjeito'] . "&nSelectBuscar=" . $_GET['nSelectBuscar'] . "&nCampo=" . $_GET['nCampo'] . "&nBuscarBT=BuscarBT";
                //nTipo
                if (!empty($_GET['nTipo'])) {
                    $sql .= " AND p.tipo_id=:tipo_id ";
                    $arrayForm['tipo_id'] = addslashes($_GET['nTipo']);
                }
                //nObjeito
                if (!empty($_GET['nObjeito'])) {
                    $sql .= " AND p.objetivo_id=:objetivo_id ";
                    $arrayForm['objetivo_id'] = addslashes($_GET['nObjeito']);
                }
                //nSelectBuscar
                if (!empty($_GET['nSelectBuscar'])) {
                    switch ($_GET['nSelectBuscar']) {
                        case 'protoco':
                            $sql .= " AND p.numero_protocolo=:numero_protocolo ";
                            $arrayForm['numero_protocolo'] = addslashes($_GET['nCampo']);
                            break;
                        case 'interessado':
                            $sql .= " AND p.interessado=:interessado ";
                            $arrayForm['interessado'] = addslashes($_GET['nCampo']);
                            break;
                        case 'protoco':
                            $sql .= " AND p.data=:data ";
                            $arrayForm['data'] = $this->formatDateBD($_GET['nCampo']);
                            break;
                    }
                }
                //paginacao
                $limite = 30;
                $total_registro = $crudModel->read($sql, $arrayForm);
                $total_registro = empty($total_registro) ? array() : $total_registro;
                $paginas = count($total_registro) / $limite;
                $indice = 0;
                $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
                $indice = ($pagina_atual - 1) * $limite;
                $dados["paginas"] = $paginas;
                $dados["pagina_atual"] = $pagina_atual;
                $dados['metodo_buscar'] = $parametros;
                $sql .= "  ORDER BY p.id ASC LIMIT $indice,$limite ";
                $protocolagens = $crudModel->read($sql, $arrayForm);
            } else {
                //paginacao
                $limite = 30;
                $total_registro = $crudModel->read_specific("SELECT COUNT(id) AS qtd FROM protocolo");
                $paginas = $total_registro['qtd'] / $limite;
                $indice = 0;
                $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
                $indice = ($pagina_atual - 1) * $limite;
                $dados["paginas"] = $paginas;
                $dados["pagina_atual"] = $pagina_atual;
                $dados['metodo_buscar'] = "";
                $sql .= " ORDER BY p.id ASC LIMIT $indice,$limite";
                $protocolagens = $crudModel->read($sql);
            }
            $dados['protocolagens'] = $protocolagens;
            $this->loadTemplate($view, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function protocolo($id) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT p.*, po.objetivo, pt.tipo FROM protocolo AS p INNER JOIN protocolo_objetivo AS po  INNER JOIN protocolo_tipo as pt WHERE p.objetivo_id=po.id AND p.tipo_id=pt.id AND md5(p.id)=:id", array('id' => $id));
            if (!empty($resultado)) {
                $cidade = $crudModel->read_specific("SELECT cidade FROM cidade WHERE id=:id", array('id' => $resultado['cidade']));
                $bairro = $crudModel->read_specific("SELECT bairro FROM bairro WHERE id=:id", array('id' => $resultado['bairro']));
                $resultado['cidade'] = $cidade['cidade'];
                $resultado['bairro'] = $bairro['bairro'];
                $vinculados = $crudModel->read("SELECT p.*, pt.tipo FROM protocolo as p INNER JOIN protocolo_tipo as pt WHERE p.tipo_id=pt.id AND p.processo=:id UNION SELECT p.*, pt.tipo FROM protocolo as p INNER JOIN protocolo_tipo as pt WHERE p.tipo_id=pt.id AND p.id=:processo", array('id' => $resultado['id'], 'processo' => $resultado['processo']));
                $historico = $crudModel->read('SELECT h.*, u.nome FROM protocolo_historico AS h INNER JOIN usuario AS u WHERE h.usuario_id=u.id AND h.protocolo_id=:id', array('id' => $resultado['id']));
                $tramitacao = $crudModel->read("SELECT t.*, ur.nome as usuario_remetente, sr.nome as setor_remetente, ud.nome AS usuario_destinatario, sd.nome AS setor_destinatario FROM tramitacao AS t INNER JOIN setor as sr INNER JOIN usuario AS ur INNER JOIN usuario as ud INNER JOIN setor as sd WHERE t.usuario_remetente_id=ur.id AND t.setor_remetente_id=sr.id AND t.usuario_destinatario_id=ud.id AND t.setor_destinatario_id=sd.id AND t.protocolo_id=:id", array('id' => $resultado['id']));
                $dados['result'] = $resultado;
                $dados['vinculados'] = $vinculados;
                $dados['historico'] = $historico;
                $dados['historico'] = $historico;
                $dados['tramitacao'] = $tramitacao;
                $dados['setores'] = $crudModel->read("SELECT * FROM setor");
                //salvar historico
                if (isset($_POST['nSalvaHistorico'])) {
                    $cadForm = array();
                    $cadForm['data'] = $this->formatDateBD($_POST['nData']);
                    $cadForm['descricao'] = addslashes($_POST['nDescricao']);
                    $cadForm['usuario_id'] = $this->getIdUser();
                    $cadForm['protocolo_id'] = $resultado['id'];
                    if ($crudModel->create("INSERT INTO protocolo_historico (data, descricao, usuario_id, protocolo_id) VALUES (:data, :descricao, :usuario_id, :protocolo_id)", $cadForm)) {
                        $url = "location: " . BASE_URL . 'tramitacao/protocolo/' . md5($resultado['id']);
                        header($url);
                    }
                }

                //salvar tramitação
                if (isset($_POST['nSalvaTramitacao'])) {
                    $cadForm = array();
                    $cadForm['protocolo_id'] = addslashes($_POST['nProtocolo']);
                    $cadForm['setor_remetente_id'] = addslashes($_POST['nSetorRemetente']);
                    $cadForm['usuario_remetente_id'] = addslashes($_POST['nUsuarioRemetente']);
                    $cadForm['setor_destinatario_id'] = addslashes($_POST['nSetorDestinatario']);
                    $cadForm['usuario_destinatario_id'] = addslashes($_POST['nUsuarioDestinatario']);
                    $cadForm['data'] = $this->formatDateBD($_POST['nData']);
                    $cadForm['descricao'] = addslashes($_POST['nDescricao']);
                    if (isset($_FILES['nFile']) && $_FILES['nFile']['error'] == 0) {
                        $cadForm['anexo'] = $this->upload_file($_FILES['nFile'], $cadForm['protocolo_id']);
                        if (!empty($_POST['nFileEnviado'])) {
                            $crudModel->delete_file($_POST['nFileEnviado']);
                        }
                    } else {
                        echo $_FILES['nFile']['error'];
                        $cadForm['anexo'] = addslashes($_POST['nFileEnviado']);
                    }
                    if ($crudModel->create("INSERT INTO tramitacao (protocolo_id, setor_remetente_id, usuario_remetente_id, setor_destinatario_id, usuario_destinatario_id, data, descricao, anexo) VALUES (:protocolo_id, :setor_remetente_id, :usuario_remetente_id, :setor_destinatario_id, :usuario_destinatario_id, :data, :descricao, :anexo)", $cadForm)) {
                        $url = "location: " . BASE_URL . 'tramitacao/protocolo/' . md5($resultado['id']);
                        header($url);
                    }
                }

                $view = "tramitacao/protocolo";
                $this->loadTemplate($view, $dados);
            } else {
                $url = "location: " . BASE_URL . "home";
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    /** função responstaval para checar se existe o diretorio e criar caso não tenha */
    private function checkDir($id) {
        if (!is_dir('uploads/protocolo/' . $id)) {
            mkdir('uploads/protocolo/' . $id, 0777, TRUE);
        }
    }

    private function upload_file($file, $id) {
        $arquivo = array();
        $arquivo['temp'] = $file['tmp_name'];
        $arquivo['extensao'] = explode(".", $file['name']);
        $arquivo['extensao'] = strtolower(end($arquivo['extensao']));
        $arquivo['name'] = date('d-m-Y') . "_" . md5(md5(rand(1000, 900000) . time())) . '.' . $arquivo['extensao'];
        $arquivo['diretorio'] = 'uploads/protocolo/' . $id;
        //criando diretorio se não existi
        if (!is_dir($arquivo['diretorio'])) {
            mkdir($arquivo['diretorio'], 0777, TRUE);
        }
        $arquivo['arquivo'] = $arquivo['diretorio'] . "/" . $arquivo['name'];
        if (move_uploaded_file($arquivo['temp'], $arquivo['arquivo'])) {
            return $arquivo['arquivo'];
        } else {
            return 'NÃO MOVIDO';
        }
    }

    public function excluirhistorico($id) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM protocolo_historico WHERE md5(id)=:id", array('id' => addslashes($id)));
            if ($crudModel->remove("DELETE FROM protocolo_historico WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'tramitacao/protocolo/' . md5($resultado['protocolo_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function excluirtramitacao($id) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM tramitacao WHERE md5(id)=:id", array('id' => addslashes($id)));
            $crudModel->delete_file($resultado['anexo']);
            if ($crudModel->remove("DELETE FROM tramitacao WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'tramitacao/protocolo/' . md5($resultado['protocolo_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

}
