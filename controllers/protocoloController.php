<?php

class protocoloController extends controller {
    
    public function index() {
        $this->cadastro();
    }

    //ultilizado no cadastro e edição
    public function get_tipo_protocolo() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $tipo_id = addslashes($_POST['tipo_id']);
            if (isset($_POST['id_objetivo'])) {
                $id_objetivo = addslashes($_POST['id_objetivo']);
            }
            $resultado = $crudModel->read("SELECT * FROM protocolo_objetivo WHERE tipo_id=:id ORDER BY objetivo ASC", array('id' => $tipo_id));
            if (!isset($id_objetivo)) {
                echo '<option value="" selected = "selected" disabled="disabled">Selecione o objetivo do pedido </option>';
            }
            foreach ($resultado as $indice) {
                if (isset($id_objetivo) && $indice['id'] == $id_objetivo) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['objetivo'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['objetivo'] . '</option>';
                }
            }
        }
    }

    //ultilizado na consulta
    public function get_tipo_protocoloSerach() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $tipo_id = addslashes($_POST['tipo_id']);
            if (isset($_POST['id_objetivo'])) {
                $id_objetivo = addslashes($_POST['id_objetivo']);
            }

            if (!empty($tipo_id)) {
                $resultado = $crudModel->read("SELECT * FROM protocolo_objetivo WHERE tipo_id=:id ORDER BY objetivo ASC", array('id' => $tipo_id));
            } else {
                $resultado = $crudModel->read("SELECT * FROM protocolo_objetivo ORDER BY objetivo ASC");
            }
            if (!isset($id_objetivo)) {
                echo '<option value="" selected = "selected">Todos </option>';
            }
            foreach ($resultado as $indice) {
                if (isset($id_objetivo) && $indice['id'] == $id_objetivo) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['objetivo'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['objetivo'] . '</option>';
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

            if (!isset($bairro_id)) {
                echo '<option value="" selected = "selected" disabled="disabled">Selecione o bairro </option>';
            }
            foreach ($usuarios as $indice) {
                if (isset($bairro_id) && $indice['id'] == $bairro_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['bairro'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['bairro'] . '</option>';
                }
            }
        }
    }

    //cria novo numero de protocolo
    // $numero e uma string do tipo numero/ano
    private function novo_numero_protocolo($numero) {
        if ($numero) {
            $array = explode('/', $numero);
            $x = str_pad(++$array[0], 4, '0', STR_PAD_LEFT);
            return $x . '/' . $array[1];
        } else {
             $x = str_pad(1, 4, '0', STR_PAD_LEFT);
            return $x . '/' . date('Y');
        }
    }

    public function cadastro() {
        if ($this->checkUser()) {
            $viewName = "protocolo/cadastro";
            $dados = array();
            $crudModel = new crud_db();
            $dados['tipo_protocolo'] = $crudModel->read("SELECT * FROM protocolo_tipo ORDER BY tipo ASC");
            $dados['protocolos'] = $crudModel->read("SELECT p.*, po.objetivo FROM protocolo as p INNER JOIN  protocolo_objetivo as po where po.id=p.objetivo_id and p.tipo_id=2");
            $dados['protocolo_objetivo'] = $crudModel->read("SELECT * FROM protocolo_objetivo ORDER BY objetivo ASC");
            $dados['cidade'] = $crudModel->read("SELECT * FROM cidade ORDER BY cidade ASC");
            $dados['bairro'] = $crudModel->read("SELECT * FROM bairro ORDER BY bairro ASC");
            // cadastro
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $cadForm = array();
                $cadForm['tipo_id'] = $_POST['nTipo'];
                $cadForm['objetivo_id'] = $_POST['nObjetivo'];
                $cadForm['numero_protocolo'] = $_POST['nNumeroProtocolo'];
                $cadForm['data'] = $this->formatDateBD($_POST['nData']);
                $cadForm['processo'] = !empty($_POST['nVincula']) ? $_POST['nVincula'] : '';
                $cadForm['interessado'] = $_POST['nInteressado'];
                $cadForm['contato'] = $_POST['nContato'];
                $cadForm['protocolista_id'] = $this->getIdUser();
                $cadForm['numero_folhas'] = $_POST['nFolhas'];
                $cadForm['assunto'] = $_POST['nAssunto'];
                $cadForm['descricao'] = $_POST['nObservacao'];
                $cadForm['cidade'] = !empty($_POST['nCidade']) ? $_POST['nCidade'] : '';
                $cadForm['bairro'] = !empty($_POST['nBairro']) ? $_POST['nBairro'] : '';
                $cadForm['endereco'] = !empty($_POST['nEndereco']) ? $_POST['nEndereco'] : '';
                $cadForm['numero'] = !empty($_POST['nNumero']) ? $_POST['nNumero'] : '';
                $cadForm['latitude'] = !empty($_POST['nLatitude']) ? $_POST['nLatitude'] : '';
                $cadForm['longitude'] = !empty($_POST['nLongitude']) ? $_POST['nLongitude'] : '';
                //id
                $id = $crudModel->read_specific("SELECT id FROM protocolo ORDER BY id DESC");
                $cadForm['id'] = !empty($id) ? ($id['id']) + 1 : 1;

                $resultado = $crudModel->create("INSERT INTO protocolo (id, tipo_id, objetivo_id, numero_protocolo, data, interessado, processo, contato, protocolista_id, numero_folhas, assunto, descricao, cidade, bairro, endereco, numero, latitude, longitude) VALUES (:id, :tipo_id, :objetivo_id, :numero_protocolo, :data, :interessado, :processo, :contato, :protocolista_id, :numero_folhas, :assunto, :descricao, :cidade, :bairro, :endereco, :numero, :latitude, :longitude)", $cadForm);
                if ($resultado) {
                    $historico['data'] = $this->getDataNow();
                    $historico['descricao'] = "Realizado o cadastro deste protocolo no banco de dados";
                    $historico['usuario_id'] = $cadForm['protocolista_id'];
                    $historico['protocolo_id'] = $cadForm['id'];
                    $crudModel->create("INSERT INTO protocolo_historico (data, descricao, usuario_id, protocolo_id) VALUES (:data, :descricao, :usuario_id, :protocolo_id) ", $historico);
                    $dados['erro'] = array('class' => 'alert-success', 'msg' => '<i class="fa fa-check-circle" aria-hidden="true"></i> Cadastro realizado com sucesso!');
                } else {
                    $dados['arrayCad'] = $cadForm;
                }
            }
            $ultimoProtocolo = $crudModel->read_specific('SELECT * FROM protocolo where data like "%' . date('Y') . '%" ORDER BY id DESC LIMIT 0,1');
            $dados['numero_protocolo'] = $this->novo_numero_protocolo($ultimoProtocolo['numero_protocolo']);
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function editar($id) {
        if ($this->checkUser() && $this->checkSetor() == 10) {
            $viewName = "protocolo/editar";
            $dados = array();
            $crudModel = new crud_db();
            $dados['tipo_protocolo'] = $crudModel->read("SELECT * FROM protocolo_tipo ORDER BY tipo ASC");
            $dados['protocolos'] = $crudModel->read("SELECT p.*, po.objetivo FROM protocolo as p INNER JOIN  protocolo_objetivo as po where po.id=p.objetivo_id and p.tipo_id=2");
            $dados['protocolo_objetivo'] = $crudModel->read("SELECT * FROM protocolo_objetivo ORDER BY objetivo ASC");
            $dados['cidade'] = $crudModel->read("SELECT * FROM cidade ORDER BY cidade ASC");
            $dados['bairro'] = $crudModel->read("SELECT * FROM bairro ORDER BY bairro ASC");
            // cadastro
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $cadForm = array();
                $cadForm['tipo_id'] = $_POST['nTipo'];
                $cadForm['objetivo_id'] = $_POST['nObjetivo'];
                $cadForm['numero_protocolo'] = $_POST['nNumeroProtocolo'];
                $cadForm['data'] = $this->formatDateBD($_POST['nData']);
                $cadForm['processo'] = !empty($_POST['nVincula']) ? $_POST['nVincula'] : '';
                $cadForm['interessado'] = $_POST['nInteressado'];
                $cadForm['contato'] = $_POST['nContato'];
                $cadForm['protocolista_id'] = $this->getIdUser();
                $cadForm['numero_folhas'] = $_POST['nFolhas'];
                $cadForm['assunto'] = $_POST['nAssunto'];
                $cadForm['descricao'] = $_POST['nObservacao'];
                $cadForm['cidade'] = !empty($_POST['nCidade']) ? $_POST['nCidade'] : '';
                $cadForm['bairro'] = !empty($_POST['nBairro']) ? $_POST['nBairro'] : '';
                $cadForm['endereco'] = !empty($_POST['nEndereco']) ? $_POST['nEndereco'] : '';
                $cadForm['numero'] = !empty($_POST['nNumero']) ? $_POST['nNumero'] : '';
                $cadForm['latitude'] = !empty($_POST['nLatitude']) ? $_POST['nLatitude'] : '';
                $cadForm['longitude'] = !empty($_POST['nLongitude']) ? $_POST['nLongitude'] : '';
                //id
                $cadForm['id'] = $_POST['nId'];

                $resultado = $crudModel->create("UPDATE protocolo SET tipo_id=:tipo_id, objetivo_id=:objetivo_id, numero_protocolo=:numero_protocolo, data=:data, interessado=:interessado, processo=:processo, contato=:contato, protocolista_id=:protocolista_id, numero_folhas=:numero_folhas, assunto=:assunto, descricao=:descricao, cidade=:cidade, bairro=:bairro, endereco=:endereco, numero=:numero, latitude=:latitude, longitude=:longitude where id=:id", $cadForm);
                if ($resultado) {
                    $historico['data'] = $this->getDataNow();
                    $historico['descricao'] = "Realizado alteração deste protocolo no banco de dados";
                    $historico['usuario_id'] = $cadForm['protocolista_id'];
                    $historico['protocolo_id'] = $cadForm['id'];
                    $crudModel->create("INSERT INTO protocolo_historico (data, descricao, usuario_id, protocolo_id) VALUES (:data, :descricao, :usuario_id, :protocolo_id) ", $historico);
                    $dados['erro'] = array('class' => 'alert-success', 'msg' => '<i class="fa fa-check-circle" aria-hidden="true"></i> Alteração realizada com sucesso!');
                }
            }
            $dados['arrayCad'] = $crudModel->read_specific('SELECT * FROM protocolo WHERE md5(id)=:id', array('id' => $id));
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function consultar($page = 1) {
        if ($this->checkUser()) {
            $view = "protocolo/consulta";
            $dados = array();
            $crudModel = new crud_db();
            $dados['protocolo_tipo'] = $crudModel->read("SELECT * FROM protocolo_tipo");
            $dados['protocolo_objetivo'] = $crudModel->read("SELECT * FROM protocolo_objetivo ORDER BY objetivo ASC");

            $sql = "SELECT p.*, po.objetivo, pt.tipo FROM protocolo AS p INNER JOIN protocolo_objetivo AS po  INNER JOIN protocolo_tipo as pt WHERE p.objetivo_id=po.id AND p.tipo_id=pt.id ";
            $arrayForm = array();
            if (isset($_GET['nBuscarBT'])) {
                $_GET['nSelectBuscar'] = !empty($_GET['nSelectBuscar']) ? $_GET['nSelectBuscar'] : '';
                $parametros = "?nTipo=" . $_GET['nTipo'] . "&nObjeito=" . $_GET['nObjeito'] . "&nSelectBuscar=" . $_GET['nSelectBuscar'] . "&nCampo=" . $_GET['nCampo'] . "&nModoPDF=" . $_GET['nModoPDF'] . "&nBuscarBT=BuscarBT";
                if ($_GET['nModoPDF'] == 1) {
                    $url = BASE_URL . "protocolo/relatorio_pdf" . $parametros;
                    echo "<script>window.open('$url', '_blank')</script>";
                }
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
                $anexos = $crudModel->read('SELECT * FROM protocolo_anexo where protocolo_id=:id', array('id' => $resultado['id']));
                $tramitacao = $crudModel->read("SELECT t.*, ur.nome as usuario_remetente, sr.nome as setor_remetente, ud.nome AS usuario_destinatario, sd.nome AS setor_destinatario FROM tramitacao AS t INNER JOIN setor as sr INNER JOIN usuario AS ur INNER JOIN usuario as ud INNER JOIN setor as sd WHERE t.usuario_remetente_id=ur.id AND t.setor_remetente_id=sr.id AND t.usuario_destinatario_id=ud.id AND t.setor_destinatario_id=sd.id AND t.protocolo_id=:id", array('id' => $resultado['id']));
                $dados['result'] = $resultado;
                $dados['vinculados'] = $vinculados;
                $dados['historico'] = $historico;
                $dados['anexos'] = $anexos;
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
                        $url = "location: " . BASE_URL . 'protocolo/protocolo/' . md5($resultado['id']);
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
                        $url = "location: " . BASE_URL . 'protocolo/protocolo/' . md5($resultado['id']);
                        header($url);
                    }
                }
                //salvar anexos
                if (isset($_POST['nSalvaAnexo'])) {
                    $cadForm = array();
                    $cadForm['protocolo_id'] = addslashes($_POST['nProtocolo']);
                    $cadForm['descricao'] = addslashes($_POST['nDescricao']);
                    $cadForm['data'] = $this->getDataNow();
                    if (isset($_FILES['nFile']) && $_FILES['nFile']['error'] == 0) {
                        $cadForm['anexo'] = $this->upload_file($_FILES['nFile'], $cadForm['protocolo_id']);
                        if (!empty($_POST['nFileEnviado'])) {
                            $crudModel->delete_file($_POST['nFileEnviado']);
                        }
                    } else {
                        echo $_FILES['nFile']['error'];
                        $cadForm['anexo'] = addslashes($_POST['nFileEnviado']);
                    }
                    if ($crudModel->create("INSERT INTO protocolo_anexo (descricao, anexo, protocolo_id, data) VALUES (:descricao, :anexo, :protocolo_id, :data)", $cadForm)) {
                        $url = "location: " . BASE_URL . 'protocolo/protocolo/' . md5($resultado['id']);
                        header($url);
                    }
                }
                $view = "protocolo/protocolo";
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

    
    public function excluiranexo($id) {
        if ($this->checkUser() && $this->checkSetor() == 10) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM protocolo_anexo WHERE md5(id)=:id", array('id' => addslashes($id)));
            $crudModel->delete_file($resultado['anexo']);
            if ($crudModel->remove("DELETE FROM protocolo_anexo WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'protocolo/protocolo/' . md5($resultado['protocolo_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }
    
    public function excluirhistorico($id) {
       if ($this->checkUser() && $this->checkSetor() == 10) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM protocolo_historico WHERE md5(id)=:id", array('id' => addslashes($id)));
            if ($crudModel->remove("DELETE FROM protocolo_historico WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'protocolo/protocolo/' . md5($resultado['protocolo_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function excluirtramitacao($id) {
       if ($this->checkUser() && $this->checkSetor() == 10) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM tramitacao WHERE md5(id)=:id", array('id' => addslashes($id)));
            $crudModel->delete_file($resultado['anexo']);
            if ($crudModel->remove("DELETE FROM tramitacao WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'protocolo/protocolo/' . md5($resultado['protocolo_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

}
