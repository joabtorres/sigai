<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of fiscController
 *
 * @author joab
 */
class fisc_denunciaController extends fiscController {

    public function index() {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $this->loadView('404');
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function cadastro() {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $viewName = 'fisc/denuncia/cadastro';
            $dados = array();
            $crud = new fisc_model();
            $dados['tipo_protocolo'] = $crud->read("SELECT * FROM fisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['documento'] = $crud->read("SELECT * FROM fisc_tipo_documento ORDER BY documento ASC");
            $dados['origem'] = $crud->read("SELECT * FROM fisc_origem ORDER BY origem ASC");
            $dados['tecnicos'] = $crud->read("SELECT * FROM usuario WHERE setor_id=4 ORDER BY nome ASC");
            $dados['tipo_denuncia'] = $crud->read("SELECT * FROM fisc_tipo_denuncia ORDER BY tipo_denuncia ASC");
            $dados['tipo_infracao'] = $crud->read("SELECT * FROM fisc_tipo_infracao ORDER BY infracao ASC");
            $dados['tipo_classificacao'] = $crud->read("SELECT * FROM fisc_tipo_classificao ORDER BY classificacao ASC");
            $dados['cidade'] = $crud->read("SELECT * FROM cidade");
            $dados['bairro'] = $crud->read("SELECT * FROM bairro WHERE cidade_id=1 ORDER BY bairro ASC");
            $dados['solicitante'] = $crud->read("SELECT * FROM fisc_solicitante ORDER BY solicitante ASC");
            $dados['protocolos'] = $crud->read("SELECT p.*, po.objetivo FROM protocolo as p INNER JOIN  protocolo_objetivo as po where po.id=p.objetivo_id");

            // cadastro
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $cadForm = array();
                //id
                if (!empty($_POST['nId'])) {
                    $cadForm['id'] = addslashes($_POST['nId']);
                }
                /*                 * *********************
                 * protocolo
                 * ******************** */
                $cadForm['protocolo']['tipo'] = 'denuncia';
                //tramitacao
                $cadForm['protocolo']['tramitacao'] = !empty($_POST['nTramitacao']) ? $_POST['nTramitacao'] : 0;
                //data do protocolo
                $cadForm['protocolo']['data_protocolo'] = $this->formatDateBD($_POST['nData']);
                //tipo do protocolo
                $cadForm['protocolo']['protocolo_id'] = addslashes($_POST['nTipoProtocolo']);
                //tipo do documento
                $cadForm['protocolo']['tipo_documento_id'] = addslashes($_POST['nTipoDocumento']);
                //origem
                $cadForm['protocolo']['origem_id'] = addslashes($_POST['nOrigem']);
                //protocolo
                $cadForm['protocolo']['numero_protocolo'] = addslashes($_POST['nNumeroProtocolo']);
                $cadForm['protocolo']['ano_protocolo'] = addslashes($_POST['nAnoProtocolo']);
                //oficio
                $cadForm['protocolo']['numero_oficio'] = addslashes($_POST['nNumeroOficio']);
                $cadForm['protocolo']['ano_oficio'] = addslashes($_POST['nAnoOficio']);
                //memorando
                $cadForm['protocolo']['numero_memorando'] = addslashes($_POST['nNumeroMemorando']);
                $cadForm['protocolo']['ano_memorando'] = addslashes($_POST['nAnoMemorando']);
                $cadForm['protocolo']['id_solicitante'] = isset($_POST['nOrgaoSolicitante']) && !empty($_POST['nOrgaoSolicitante']) ? $_POST['nOrgaoSolicitante'] : 0;
                $cadForm['protocolo']['prazo'] = addslashes($_POST['nPrazoResposta']);
                $cadForm['protocolo']['hash'] = $this->hash_md5();
                /*                 * *********************
                 * Denuncia
                 * ******************** */
                //tipo da denuncia
                $cadForm['denuncia']['usuario_id'] = addslashes($_POST['nTecnico']);
                $cadForm['denuncia']['status'] = addslashes($_POST['nStatus']);
                $cadForm['denuncia']['tipo_denuncia_id'] = addslashes($_POST['nTipoDenuncia']);
                $cadForm['denuncia']['infracao_id'] = addslashes($_POST['nTipoInfracao']);
                $cadForm['denuncia']['classificacao_id'] = addslashes($_POST['nTipoClassificacao']);
                //denunciante
                $cadForm['denuncia']['denunciado'] = addslashes($_POST['nDenunciado']);
                $cadForm['denuncia']['descricao'] = addslashes($_POST['nDescricao']); //descricao
                $cadForm['denuncia']['cidade_id'] = addslashes($_POST['nCidade']); //cidade
                $cadForm['denuncia']['bairro_id'] = addslashes($_POST['nBairro']); //bairro
                $cadForm['denuncia']['endereco'] = addslashes($_POST['nEndereco']); //endereco
                $cadForm['denuncia']['latitude'] = addslashes($_POST['nLatitude']); // latitude
                $cadForm['denuncia']['longitude'] = addslashes($_POST['nLongitude']); // longitude
                /*                 * *********************
                 * denunciante
                 * ******************** */
                $cadForm['denuncia']['denunciante'] = addslashes($_POST['nDenunciante']);
                $cadForm['denuncia']['telefone'] = addslashes($_POST['nTelefone']);
                $cadForm['denuncia']['email'] = addslashes($_POST['nEmail']);
                $resultado = $crud->create("INSERT INTO fisc_protocolo (tipo, tramitacao, data_protocolo, protocolo_id, tipo_documento_id, origem_id, numero_protocolo, ano_protocolo, numero_oficio, ano_oficio, numero_memorando, ano_memorando, id_solicitante, prazo, hash) VALUES (:tipo, :tramitacao, :data_protocolo, :protocolo_id, :tipo_documento_id, :origem_id, :numero_protocolo, :ano_protocolo, :numero_oficio, :ano_oficio, :numero_memorando, :ano_memorando, :id_solicitante, :prazo, :hash)", $cadForm['protocolo']);
                if ($resultado) {
                    $protocolo = $crud->read_specific("SELECT * FROM fisc_protocolo WHERE hash=:hash", array('hash' => $cadForm['protocolo']['hash']));
                    $cadForm['denuncia']['protocolo_id'] = $protocolo['id'];
                    $resultado = $crud->create("INSERT INTO fisc_denuncia (protocolo_id, usuario_id, status, tipo_denuncia_id, infracao_id, classificacao_id, denunciado, descricao, cidade_id, bairro_id, endereco, latitude, longitude, denunciante, telefone, email) VALUES (:protocolo_id, :usuario_id, :status, :tipo_denuncia_id, :infracao_id, :classificacao_id, :denunciado, :descricao, :cidade_id, :bairro_id, :endereco, :latitude, :longitude, :denunciante, :telefone, :email)", $cadForm['denuncia']);
                    if ($resultado) {
                        $denuncia = $crud->read_specific("SELECT * FROM fisc_denuncia WHERE protocolo_id=:id", array('id' => $protocolo['id']));
                        $historico = array();
                        $historico['data'] = $this->getDatatimeNow();
                        $historico['descricao'] = "Foi realizado o cadastro da denúncia no banco de dados";
                        $historico['usuario_id'] = $this->getIdUser();
                        $historico['denuncia_id'] = $denuncia['id'];
                        $crud->create("INSERT INTO fisc_historico_denuncia (data, descricao, usuario_id, denuncia_id) VALUES (:data, :descricao, :usuario_id, :denuncia_id) ", $historico);
                        $dados['erro'] = array('class' => 'alert-success', 'msg' => '<i class="fa fa-check-circle" aria-hidden="true"></i> Cadastro realizado com sucesso!');
                    }
                }
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function editar($id) {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $viewName = 'fisc/denuncia/editar';
            $dados = array();
            $crud = new fisc_model();
            $dados['arrayCad']['denuncia'] = $crud->read_specific("SELECT * FROM fisc_denuncia WHERE md5(id)=:id", array('id' => $id));
            if (!is_array($dados['arrayCad']['denuncia']) && empty($dados['arrayCad']['denuncia'])) {
                $url = "location: " . BASE_URL . "home";
                header($url);
            }
            $dados['arrayCad']['protocolo'] = $crud->read_specific("SELECT * FROM fisc_protocolo WHERE id=:id", array('id' => $dados['arrayCad']['denuncia']['protocolo_id']));

            $dados['tipo_protocolo'] = $crud->read("SELECT * FROM fisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['tipo_protocolo'] = $crud->read("SELECT * FROM fisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['documento'] = $crud->read("SELECT * FROM fisc_tipo_documento ORDER BY documento ASC");
            $dados['origem'] = $crud->read("SELECT * FROM fisc_origem ORDER BY origem ASC");
            $dados['tecnicos'] = $crud->read("SELECT * FROM usuario WHERE setor_id=4 ORDER BY nome ASC");
            $dados['tipo_denuncia'] = $crud->read("SELECT * FROM fisc_tipo_denuncia ORDER BY tipo_denuncia ASC");
            $dados['tipo_infracao'] = $crud->read("SELECT * FROM fisc_tipo_infracao ORDER BY infracao ASC");
            $dados['tipo_classificacao'] = $crud->read("SELECT * FROM fisc_tipo_classificao ORDER BY classificacao ASC");
            $dados['cidade'] = $crud->read("SELECT * FROM cidade");
            $dados['bairro'] = $crud->read("SELECT * FROM bairro WHERE cidade_id=1 ORDER BY bairro ASC");
            $dados['solicitante'] = $crud->read("SELECT * FROM fisc_solicitante ORDER BY solicitante ASC");
            $dados['protocolos'] = $crud->read("SELECT p.*, po.objetivo FROM protocolo as p INNER JOIN  protocolo_objetivo as po where po.id=p.objetivo_id");

            // cadastro
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $cadForm = array();
                //salva os 
                $lastArray = $dados['arrayCad'];
                //id
                if (!empty($_POST['nId'])) {
                    $cadForm['protocolo']['id'] = addslashes($_POST['nId']);
                }
                /*                 * *********************
                 * protocolo
                 * ******************** */
                $cadForm['protocolo']['tipo'] = 'denuncia';
                //tramitacao
                $cadForm['protocolo']['tramitacao'] = !empty($_POST['nTramitacao']) ? $_POST['nTramitacao'] : 0;
                //data do protocolo
                $cadForm['protocolo']['data_protocolo'] = $this->formatDateBD($_POST['nData']);
                //tipo do protocolo
                $cadForm['protocolo']['protocolo_id'] = addslashes($_POST['nTipoProtocolo']);
                //tipo do documento
                $cadForm['protocolo']['tipo_documento_id'] = addslashes($_POST['nTipoDocumento']);
                //origem
                $cadForm['protocolo']['origem_id'] = addslashes($_POST['nOrigem']);
                //protocolo
                $cadForm['protocolo']['numero_protocolo'] = addslashes($_POST['nNumeroProtocolo']);
                $cadForm['protocolo']['ano_protocolo'] = addslashes($_POST['nAnoProtocolo']);
                //oficio
                $cadForm['protocolo']['numero_oficio'] = addslashes($_POST['nNumeroOficio']);
                $cadForm['protocolo']['ano_oficio'] = addslashes($_POST['nAnoOficio']);
                //memorando
                $cadForm['protocolo']['numero_memorando'] = addslashes($_POST['nNumeroMemorando']);
                $cadForm['protocolo']['ano_memorando'] = addslashes($_POST['nAnoMemorando']);
                $cadForm['protocolo']['id_solicitante'] = isset($_POST['nOrgaoSolicitante']) && !empty($_POST['nOrgaoSolicitante']) ? $_POST['nOrgaoSolicitante'] : 0;
                $cadForm['protocolo']['prazo'] = addslashes($_POST['nPrazoResposta']);
                /*                 * *********************
                 * Denuncia
                 * ******************** */
                // id
                $cadForm['denuncia']['id'] = $dados['arrayCad']['denuncia']['id'];
                $cadForm['denuncia']['protocolo_id'] = $cadForm['protocolo']['id'];
                //tipo da denuncia
                $cadForm['denuncia']['usuario_id'] = addslashes($_POST['nTecnico']);
                $cadForm['denuncia']['status'] = addslashes($_POST['nStatus']);
                $cadForm['denuncia']['tipo_denuncia_id'] = addslashes($_POST['nTipoDenuncia']);
                $cadForm['denuncia']['infracao_id'] = addslashes($_POST['nTipoInfracao']);
                $cadForm['denuncia']['classificacao_id'] = addslashes($_POST['nTipoClassificacao']);
                //denunciante
                $cadForm['denuncia']['denunciado'] = addslashes($_POST['nDenunciado']);
                $cadForm['denuncia']['descricao'] = addslashes($_POST['nDescricao']); //descricao
                $cadForm['denuncia']['cidade_id'] = addslashes($_POST['nCidade']); //cidade
                $cadForm['denuncia']['bairro_id'] = addslashes($_POST['nBairro']); //bairro
                $cadForm['denuncia']['endereco'] = addslashes($_POST['nEndereco']); //endereco
                $cadForm['denuncia']['latitude'] = addslashes($_POST['nLatitude']); // latitude
                $cadForm['denuncia']['longitude'] = addslashes($_POST['nLongitude']); // longitude
                /*                 * *********************
                 * denunciante
                 * ******************** */
                $cadForm['denuncia']['denunciante'] = addslashes($_POST['nDenunciante']);
                $cadForm['denuncia']['telefone'] = addslashes($_POST['nTelefone']);
                $cadForm['denuncia']['email'] = addslashes($_POST['nEmail']);
                $resultado = $crud->update("UPDATE fisc_protocolo SET tipo=:tipo, tramitacao=:tramitacao, data_protocolo=:data_protocolo, protocolo_id=:protocolo_id, tipo_documento_id=:tipo_documento_id, origem_id=:origem_id, numero_protocolo=:numero_protocolo, ano_protocolo=:ano_protocolo, numero_oficio=:numero_oficio, ano_oficio=:ano_oficio, numero_memorando=:numero_memorando, ano_memorando=:ano_memorando, id_solicitante=:id_solicitante, prazo=:prazo WHERE id=:id", $cadForm['protocolo']);
                if ($resultado) {
                    $resultado = $crud->update("UPDATE fisc_denuncia SET protocolo_id=:protocolo_id, usuario_id=:usuario_id, status=:status, tipo_denuncia_id=:tipo_denuncia_id, infracao_id=:infracao_id, classificacao_id=:classificacao_id, denunciado=:denunciado, descricao=:descricao, cidade_id=:cidade_id, bairro_id=:bairro_id, endereco=:endereco, latitude=:latitude, longitude=:longitude, denunciante=:denunciante, telefone=:telefone, email=:email where id=:id", $cadForm['denuncia']);
                    if ($resultado) {
                        $dados['arrayCad'] = $cadForm;
                        $historico = array();
                        $historico['data'] = $this->getDatatimeNow();
                        $historico['descricao'] = "Alteração realizada com sucesso!";
                        $historico['usuario_id'] = $this->getIdUser();
                        $historico['denuncia_id'] = $cadForm['denuncia']['id'];
                        $crud->create("INSERT INTO fisc_historico_denuncia (data, descricao, usuario_id, denuncia_id) VALUES (:data, :descricao, :usuario_id, :denuncia_id) ", $historico);
                        $dados['erro'] = array('class' => 'alert-success', 'msg' => '<i class="fa fa-check-circle" aria-hidden="true"></i> Alteração realizada com sucesso!');
                    }
                }
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function consultar($page = 1) {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $view = "fisc/denuncia/consulta";
            $dados = array();
            $crudModel = new crud_db();
            $dados['tipo_protocolo'] = $crudModel->read("SELECT * FROM fisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['documento'] = $crudModel->read("SELECT * FROM fisc_tipo_documento ORDER BY documento ASC");
            $dados['origem'] = $crudModel->read("SELECT * FROM fisc_origem ORDER BY origem ASC");
            $dados['solicitante'] = $crudModel->read("SELECT * FROM fisc_solicitante ORDER BY solicitante ASC");
            $dados['tecnicos'] = $crudModel->read("SELECT * FROM usuario WHERE setor_id=4 ORDER BY nome ASC");
            $dados['tipo_denuncia'] = $crudModel->read("SELECT * FROM fisc_tipo_denuncia ORDER BY tipo_denuncia ASC");
            $dados['tipo_infracao'] = $crudModel->read("SELECT * FROM fisc_tipo_infracao ORDER BY infracao ASC");
            $dados['tipo_classificacao'] = $crudModel->read("SELECT * FROM fisc_tipo_classificao ORDER BY classificacao ASC");
            $dados['cidade'] = $crudModel->read("SELECT * FROM cidade");
            $dados['bairro'] = $crudModel->read("SELECT * FROM bairro WHERE cidade_id=1 ORDER BY bairro ASC");

            $sql = "SELECT p.data_protocolo, p.numero_protocolo, p.ano_protocolo, d.* FROM fisc_protocolo as p INNER JOIN fisc_denuncia as d WHERE d.protocolo_id=p.id";
            $arrayForm = array();
            if (isset($_GET['nBuscarBT'])) {
                $parametros = "?nTipoProtocolo=" . $_GET['nTipoProtocolo'] . "&nTipoDocumento=" . $_GET['nTipoDocumento'] . "&nOrigem=" . $_GET['nOrigem'] . "&nSolicitante=" . $_GET['nSolicitante'] . "&nTipoDenuncia=" . $_GET['nTipoDenuncia'] . "&nUsuario=" . $_GET['nUsuario'] . "&nDataInicial=" . $_GET['nDataInicial'] . "&nDataFinal=" . $_GET['nDataFinal'] . "&nSelectBuscar=" . $_GET['nSelectBuscar'] . "&nCampo=" . $_GET['nCampo'] . "&nBuscarBT=BuscarBT";
                //TipoProtocolo
                if (!empty($_GET['nTipoProtocolo'])) {
                    $sql .= " AND p.protocolo_id=:protocolo_id ";
                    $arrayForm['protocolo_id'] = addslashes($_GET['nTipoProtocolo']);
                }
                //nTipoDocumento
                if (!empty($_GET['nTipoDocumento'])) {
                    $sql .= " AND p.tipo_documento_id=:tipo_documento_id ";
                    $arrayForm['tipo_documento_id'] = addslashes($_GET['nTipoDocumento']);
                }
                //nOrigem
                if (!empty($_GET['nOrigem'])) {
                    $sql .= " AND p.origem_id=:origem_id ";
                    $arrayForm['origem_id'] = addslashes($_GET['nOrigem']);
                }
                //nSolicitante
                if (!empty($_GET['nSolicitante'])) {
                    $sql .= " AND p.id_solicitante=:id_solicitante ";
                    $arrayForm['id_solicitante'] = addslashes($_GET['nSolicitante']);
                }
                //nOrigem
                if (!empty($_GET['nTipoDenuncia'])) {
                    $sql .= " AND d.tipo_denuncia_id=:tipo_denuncia_id ";
                    $arrayForm['tipo_denuncia_id'] = addslashes($_GET['nTipoDenuncia']);
                }
                //infracao
                if (!empty($_GET['nTipoInfracao'])) {
                    $sql .= " AND d.infracao_id=:infracao_id ";
                    $arrayForm['infracao_id'] = addslashes($_GET['nTipoInfracao']);
                }
                //classificacao
                if (!empty($_GET['nTipoClassificacao'])) {
                    $sql .= " AND d.classificacao_id=:classificacao_id ";
                    $arrayForm['classificacao_id'] = addslashes($_GET['nTipoClassificacao']);
                }
                //nUsuario
                if (!empty($_GET['nUsuario'])) {
                    $sql .= " AND d.usuario_id=:usuario_id ";
                    $arrayForm['usuario_id'] = addslashes($_GET['nUsuario']);
                }
                //nDataInicial e nDataFinal
                if (!empty($_GET['nDataInicial']) && !empty($_GET['nDataFinal'])) {
                    $data_inicial = $this->formatDateBD($_GET['nDataInicial']);
                    $data_final = $this->formatDateBD($_GET['nDataFinal']);
                    $sql .= " AND p.data_protocolo BETWEEN '" . $data_inicial . "' AND '" . $data_final . "' ";
                }
                //nSelectBuscar
                if (!empty($_GET['nSelectBuscar'])) {
                    $opcaoSelecionada = $_GET['nSelectBuscar'];
                    $campo = $_GET['nCampo'];
                    switch ($opcaoSelecionada) {
                        case 'protoco':
                            $sql .= " AND p.numero_protocolo LIKE '%" . $campo . "%' ";
                            break;
                        case 'denunciado':
                            $sql .= " AND d.denunciado LIKE '%" . $campo . "%' ";
                            break;
                        case 'denunciante':
                            $sql .= " AND d.denunciante LIKE '%" . $campo . "%' ";
                            break;
                        case 'descricao':
                            $sql .= " AND p.descricao LIKE '%" . $campo . "%' ";
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
                $sql .= " LIMIT $indice,$limite ";
                $chamados = $crudModel->read($sql, $arrayForm);
            } else {
                //paginacao
                $limite = 30;
                $total_registro = $crudModel->read_specific("SELECT COUNT(d.id) AS qtd FROM fisc_protocolo as p INNER JOIN fisc_denuncia as d WHERE d.protocolo_id=p.id");
                $paginas = $total_registro['qtd'] / $limite;
                $indice = 0;
                $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
                $indice = ($pagina_atual - 1) * $limite;
                $dados["paginas"] = $paginas;
                $dados["pagina_atual"] = $pagina_atual;
                $dados['metodo_buscar'] = "";
                $sql .= "  LIMIT $indice,$limite";
                $chamados = $crudModel->read($sql);
            }
            $dados['chamados'] = $chamados;
            $this->loadTemplate($view, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function excluirdenuncia($id) {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM fisc_denuncia WHERE md5(id)=:id", array('id' => addslashes($id)));
            if (!empty($resultado)) {
                $r1 = $crudModel->remove("DELETE FROM fisc_denuncia WHERE id=:id", array('id' => $resultado['id']));
                $r2 = $crudModel->remove("DELETE FROM fisc_protocolo WHERE id=:id", array('id' => $resultado['protocolo_id']));
                if ($r1 && $r2) {
                    $url = "location: " . BASE_URL . 'fisc_denuncia/consultar/1';
                    header($url);
                }
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function denuncia($id) {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT p.tramitacao, p.data_protocolo, p.numero_protocolo, p.ano_protocolo, p.numero_oficio, p.ano_oficio, p.numero_memorando, p.ano_memorando,p.prazo, so.solicitante, tp.tipo_protocolo, td.documento, o.origem, d.*, tds.tipo_denuncia, fti.infracao, c.cidade, b.bairro, u.nome as tecnico FROM fisc_protocolo AS p INNER JOIN fisc_solicitante as so INNER JOIN fisc_tipo_protocolo AS tp INNER JOIN fisc_tipo_documento AS td INNER JOIN fisc_origem AS o INNER JOIN fisc_denuncia AS d INNER JOIN fisc_tipo_denuncia AS tds INNER JOIN fisc_tipo_infracao AS fti INNER JOIN cidade AS c INNER JOIN bairro AS b INNER JOIN usuario as u WHERE p.protocolo_id = tp.id AND p.tipo_documento_id = td.id AND p.origem_id = o.id AND d.protocolo_id = p.id AND p.id_solicitante=so.id AND d.tipo_denuncia_id = tds.id AND d.infracao_id= fti.id AND d.cidade_id = c.id AND d.bairro_id = b.id AND d.usuario_id = u.id AND md5(d.id)=:id", array('id' => $id));
            if (!empty($resultado)) {
		if(!empty($resultado['classificacao_id'])){
		$classificacao = $crudModel->read_specific('SELECT classificacao FROM fisc_tipo_classificao WHERE id='.$resultado['classificacao_id']);
                $resultado['classificacao'] = $classificacao['classificacao'];
		}
                $dados = array();
                $dados['result'] = $resultado;
                if (!empty($resultado['tramitacao'])) {
                    $dados['vinculados'] = $crudModel->read("SELECT p.*, pt.tipo FROM protocolo as p INNER JOIN protocolo_tipo as pt WHERE p.tipo_id=pt.id AND p.id=:id UNION SELECT p.*, pt.tipo FROM protocolo as p INNER JOIN protocolo_tipo as pt WHERE p.tipo_id=pt.id AND p.processo=:processo", array('id' => $resultado['tramitacao'], 'processo' => $resultado['tramitacao']));
                }
                $dados['vistorias'] = $crudModel->read("SELECT * FROM fisc_vistoria_denuncia WHERE denuncia_id=:id", array('id' => $resultado['id']));
                $dados['anexos'] = $crudModel->read('SELECT * FROM fisc_anexo_denuncia where denuncia_id=:id', array('id' => $resultado['id']));
                $dados['historico'] = $crudModel->read('SELECT h.*, u.nome FROM fisc_historico_denuncia AS h INNER JOIN usuario AS u WHERE h.usuario_id=u.id AND h.denuncia_id=:id', array('id' => $resultado['id']));

                //salva vistoria
                if (isset($_POST['nSalvaVistoria'])) {
                    $cadForm = array();
                    $cadForm['data'] = $this->formatDateBD($_POST['nData']);
                    $cadForm['descricao'] = addslashes($_POST['nDescricao']);
                    $cadForm['denuncia_id'] = $resultado['id'];
                    $instrumento = null;
                    if (!empty($_POST['nInstrumento'])) {
                        foreach ($_POST['nInstrumento'] as $item) {
                            $instrumento .= $item . '; ';
                        }
                    }

                    $cadForm['instrumento'] = $instrumento;
                    if ($crudModel->create("INSERT INTO fisc_vistoria_denuncia (data, descricao, instrumento, denuncia_id) VALUES (:data, :descricao,:instrumento , :denuncia_id)", $cadForm)) {
                        $url = "location: " . BASE_URL . 'fisc_denuncia/denuncia/' . md5($resultado['id']);
                        header($url);
                    }
                }

                //salvar anexos
                if (isset($_POST['nSalvaAnexo'])) {
                    $cadForm = array();
                    $cadForm['denuncia_id'] = $resultado['id'];
                    $cadForm['descricao'] = addslashes($_POST['nDescricao']);
                    $cadForm['data'] = $this->getDataNow();
                    if (isset($_FILES['nFile']) && $_FILES['nFile']['error'] == 0) {
                        $cadForm['anexo'] = $this->upload_file($_FILES['nFile'], $cadForm['denuncia_id']);
                        if (!empty($_POST['nFileEnviado'])) {
                            $crudModel->delete_file($_POST['nFileEnviado']);
                        }
                    } else {
                        echo $_FILES['nFile']['error'];
                        $cadForm['anexo'] = addslashes($_POST['nFileEnviado']);
                    }
                    if ($crudModel->create("INSERT INTO fisc_anexo_denuncia (denuncia_id, descricao, anexo, data) VALUES (:denuncia_id, :descricao, :anexo, :data)", $cadForm)) {
                        $url = "location: " . BASE_URL . 'fisc_denuncia/denuncia/' . md5($resultado['id']);
                        header($url);
                    }
                }

                //salvar historico
                if (isset($_POST['nSalvaHistorico'])) {
                    $cadForm = array();
                    $cadForm['data'] = $this->formatDateBD($_POST['nData']);
                    $cadForm['descricao'] = addslashes($_POST['nDescricao']);
                    $cadForm['usuario_id'] = $this->getIdUser();
                    $cadForm['denuncia_id'] = $resultado['id'];
                    if ($crudModel->create("INSERT INTO fisc_historico_denuncia (data, descricao, usuario_id, denuncia_id) VALUES (:data, :descricao, :usuario_id, :denuncia_id)", $cadForm)) {
                        $url = "location: " . BASE_URL . 'fisc_denuncia/denuncia/' . md5($resultado['id']);
                        header($url);
                    }
                }
                $view = "fisc/denuncia/denuncia";
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
        if (!is_dir('uploads/fiscalizacao/denuncia/' . $id)) {
            mkdir('uploads/fiscalizacao/denuncia/' . $id, 0777, TRUE);
        }
    }

    private function upload_file($file, $id) {
        $arquivo = array();
        $arquivo['temp'] = $file['tmp_name'];
        $arquivo['extensao'] = explode(".", $file['name']);
        $arquivo['extensao'] = strtolower(end($arquivo['extensao']));
        $arquivo['name'] = date('d-m-Y') . "_" . md5(md5(rand(1000, 900000) . time())) . '.' . $arquivo['extensao'];
        $arquivo['diretorio'] = 'uploads/fiscalizacao/denuncia/' . $id;
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

    public function excluirvistoria($id) {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM fisc_vistoria_denuncia WHERE md5(id)=:id", array('id' => addslashes($id)));
            if ($crudModel->remove("DELETE FROM fisc_vistoria_denuncia WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'fisc_denuncia/denuncia/' . md5($resultado['denuncia_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function excluiranexo($id) {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM fisc_anexo_denuncia WHERE md5(id)=:id", array('id' => addslashes($id)));
            $crudModel->delete_file($resultado['anexo']);
            if ($crudModel->remove("DELETE FROM fisc_anexo_denuncia WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'fisc_denuncia/denuncia/' . md5($resultado['denuncia_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function excluirhistorico($id) {
        if ($this->checkUser() == 10 || ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM fisc_historico_denuncia WHERE md5(id)=:id", array('id' => addslashes($id)));
            if ($crudModel->remove("DELETE FROM fisc_historico_denuncia WHERE md5(id)=:cod", array('cod' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'fisc_denuncia/denuncia/' . md5($resultado['denuncia_id']);
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

}
