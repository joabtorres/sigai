<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cofiscController
 *
 * @author joab
 */
class cofiscController extends controller {

    public function index() {
        if ($this->checkUser()) {
            $this->loadView('404');
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function get_tipo_documento() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $protocolo_id = addslashes($_POST['protocolo_id']);
            if (isset($_POST['id_user'])) {
                $user_id = addslashes($_POST['id_user']);
            }
            $usuarios = $crudModel->read("SELECT * FROM cofisc_tipo_documento WHERE protocolo_id=:id ORDER BY documento ASC", array('id' => $protocolo_id));
            if (!isset($user_id)) {
                echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo do documento </option>';
            }
            foreach ($usuarios as $indice) {
                if (isset($user_id) && $indice['id'] == $user_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['documento'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['documento'] . '</option>';
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

    public function cadastro_denuncia() {
        if ($this->checkUser() && ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $viewName = 'cofisc/denuncia/cadastro';
            $dados = array();
            $crud = new cofisc_model();
            $dados['tipo_protocolo'] = $crud->read("SELECT * FROM cofisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['documento'] = $crud->read("SELECT * FROM cofisc_tipo_documento ORDER BY documento ASC");
            $dados['origem'] = $crud->read("SELECT * FROM cofisc_origem ORDER BY origem ASC");
            $dados['tecnicos'] = $crud->read("SELECT * FROM usuario WHERE setor_id=4 ORDER BY nome ASC");
            $dados['tipo_denuncia'] = $crud->read("SELECT * FROM cofisc_tipo_denuncia ORDER BY tipo_denuncia ASC");
            $dados['cidade'] = $crud->read("SELECT * FROM cidade");
            $dados['bairro'] = $crud->read("SELECT * FROM bairro WHERE cidade_id=1 ORDER BY bairro ASC");
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
                $cadForm['protocolo']['hash'] = $this->hash_md5();
                /*                 * *********************
                 * Denuncia
                 * ******************** */
                //tipo da denuncia
                $cadForm['denuncia']['usuario_id'] = addslashes($_POST['nTecnico']);
                $cadForm['denuncia']['status'] = addslashes($_POST['nStatus']);
                $cadForm['denuncia']['tipo_denuncia_id'] = addslashes($_POST['nTipoDenuncia']);
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
                $resultado = $crud->create("INSERT INTO cofisc_protocolo (data_protocolo, protocolo_id, tipo_documento_id, origem_id, numero_protocolo, ano_protocolo, numero_oficio, ano_oficio, numero_memorando, ano_memorando, hash) VALUES (:data_protocolo, :protocolo_id, :tipo_documento_id, :origem_id, :numero_protocolo, :ano_protocolo, :numero_oficio, :ano_oficio, :numero_memorando, :ano_memorando, :hash)", $cadForm['protocolo']);
                if ($resultado) {
                    $protocolo = $crud->read_specific("SELECT * FROM cofisc_protocolo WHERE hash=:hash", array('hash' => $cadForm['protocolo']['hash']));
                    $cadForm['denuncia']['protocolo_id'] = $protocolo['id'];
                    $resultado = $crud->create("INSERT INTO cofisc_denuncia (protocolo_id, usuario_id, status, tipo_denuncia_id, denunciado, descricao, cidade_id, bairro_id, endereco, latitude, longitude, denunciante, telefone, email) VALUES (:protocolo_id, :usuario_id, :status, :tipo_denuncia_id, :denunciado, :descricao, :cidade_id, :bairro_id, :endereco, :latitude, :longitude, :denunciante, :telefone, :email)", $cadForm['denuncia']);
                    if ($resultado) {
                        $denuncia = $crud->read_specific("SELECT * FROM cofisc_denuncia WHERE protocolo_id=:id", array('id' => $protocolo['id']));
                        $historico = array();
                        $historico['data'] = $this->getDatatimeNow();
                        $historico['descricao'] = "Foi realizado o cadastro da denúncia no banco de dados";
                        $historico['usuario_id'] = $this->getIdUser();
                        $historico['denuncia_id'] = $denuncia['id'];
                        $crud->create("INSERT INTO cofisc_historico_denuncia (data, descricao, usuario_id, denuncia_id) VALUES (:data, :descricao, :usuario_id, :denuncia_id) ", $historico);
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

    public function cadastro_solicitacao() {
        if ($this->checkUser() && ($this->checkSetor() == 4 || $this->checkSetor() == 10)) {
            $viewName = 'cofisc/solicitacao/cadastro';
            $dados = array();
            $crud = new cofisc_model();
            $dados['tipo_protocolo'] = $crud->read("SELECT * FROM cofisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['documento'] = $crud->read("SELECT * FROM cofisc_tipo_documento ORDER BY documento ASC");
            $dados['origem'] = $crud->read("SELECT * FROM cofisc_origem ORDER BY origem ASC");
            $dados['tipo_solicitacao'] = $crud->read("SELECT * FROM cofisc_tipo_solicitacao ORDER BY tipo_solicitacao ASC");
            $dados['cidade'] = $crud->read("SELECT * FROM cidade");
            $dados['bairro'] = $crud->read("SELECT * FROM bairro WHERE cidade_id=1 ORDER BY bairro ASC");
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
                $cadForm['protocolo']['hash'] = $this->hash_md5();
                /*                 * *********************
                 * solicitação
                 * ******************** */
                //tipo da solicitacao
                $cadForm['solicitacao']['tipo_solicitacao_id'] = addslashes($_POST['nTipoSolicitacao']);
                //denunciante
                $cadForm['solicitacao']['solicitante'] = addslashes($_POST['nDenunciado']);
                $cadForm['solicitacao']['telefone'] = addslashes($_POST['nTelefone']);
                $cadForm['solicitacao']['email'] = addslashes($_POST['nEmail']);
                $cadForm['solicitacao']['descricao'] = addslashes($_POST['nDescricao']); //descricao
                $cadForm['solicitacao']['cidade_id'] = addslashes($_POST['nCidade']); //cidade
                $cadForm['solicitacao']['bairro_id'] = addslashes($_POST['nBairro']); //bairro
                $cadForm['solicitacao']['endereco'] = addslashes($_POST['nEndereco']); //endereco
                $cadForm['solicitacao']['latitude'] = addslashes($_POST['nLatitude']); // latitude
                $cadForm['solicitacao']['longitude'] = addslashes($_POST['nLongitude']); // longitude
                /*                 * *********************
                 * denunciante
                 * ******************** */
                $resultado = $crud->create("INSERT INTO cofisc_protocolo (data_protocolo, protocolo_id, tipo_documento_id, origem_id, numero_protocolo, ano_protocolo, numero_oficio, ano_oficio, numero_memorando, ano_memorando, hash) VALUES (:data_protocolo, :protocolo_id, :tipo_documento_id, :origem_id, :numero_protocolo, :ano_protocolo, :numero_oficio, :ano_oficio, :numero_memorando, :ano_memorando, :hash)", $cadForm['protocolo']);
                if ($resultado) {
                    $protocolo = $crud->read_specific("SELECT * FROM cofisc_protocolo WHERE hash=:hash", array('hash' => $cadForm['protocolo']['hash']));
                    $cadForm['solicitacao']['protocolo_id'] = $protocolo['id'];
                    $resultado = $crud->create("INSERT INTO cofisc_solicitacao (protocolo_id, tipo_solicitacao_id, solicitante, telefone, email, descricao, cidade_id, bairro_id, endereco, latitude, longitude) VALUES (:protocolo_id, :tipo_solicitacao_id, :solicitante, :telefone, :email, :descricao, :cidade_id, :bairro_id, :endereco, :latitude, :longitude)", $cadForm['solicitacao']);
                    if ($resultado) {
                        $solicitacao = $crud->read_specific("SELECT * FROM cofisc_solicitacao WHERE protocolo_id=:id", array('id' => $protocolo['id']));
                        $historico = array();
                        $historico['data'] = $this->getDatatimeNow();
                        $historico['descricao'] = "Foi realizado o cadastro da solicitação no banco de dados";
                        $historico['usuario_id'] = $this->getIdUser();
                        $historico['solicitacao_id'] = $solicitacao['id'];
                        $crud->create("INSERT INTO cofisc_historico_solicitacao (data, descricao, usuario_id, solicitacao_id) VALUES (:data, :descricao, :usuario_id, :solicitacao_id) ", $historico);
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

    public function consultar_denuncia($page = 1) {
        if ($this->checkUser()) {
            $view = "cofisc/denuncia/consulta";
            $dados = array();
            $crudModel = new crud_db();
            $dados['tipo_protocolo'] = $crudModel->read("SELECT * FROM cofisc_tipo_protocolo ORDER BY tipo_protocolo ASC");
            $dados['documento'] = $crudModel->read("SELECT * FROM cofisc_tipo_documento ORDER BY documento ASC");
            $dados['origem'] = $crudModel->read("SELECT * FROM cofisc_origem ORDER BY origem ASC");
            $dados['tipo_denuncia'] = $crudModel->read("SELECT * FROM cofisc_tipo_denuncia ORDER BY tipo_denuncia ASC");
            $dados['cidade'] = $crudModel->read("SELECT * FROM cidade");
            $dados['bairro'] = $crudModel->read("SELECT * FROM bairro WHERE cidade_id=1 ORDER BY bairro ASC");

            $sql = "SELECT p.data_protocolo, p.numero_protocolo, p.ano_protocolo, d.* FROM cofisc_protocolo as p INNER JOIN cofisc_denuncia as d WHERE d.protocolo_id=p.id";
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
                $total_registro = $crudModel->read_specific("SELECT COUNT(d.id) AS qtd FROM cofisc_protocolo as p INNER JOIN cofisc_denuncia as d WHERE d.protocolo_id=p.id");
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

    public function denuncia($id) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT p.data_protocolo, p.numero_protocolo, p.ano_protocolo, p.numero_oficio, p.ano_oficio, p.numero_memorando, p.ano_memorando, tp.tipo_protocolo, td.documento, o.origem, d.*, tds.tipo_denuncia, c.cidade, b.bairro, u.nome as tecnico FROM cofisc_protocolo AS p INNER JOIN cofisc_tipo_protocolo AS tp INNER JOIN cofisc_tipo_documento AS td INNER JOIN cofisc_origem AS o INNER JOIN cofisc_denuncia AS d INNER JOIN cofisc_tipo_denuncia AS tds INNER JOIN cidade AS c INNER JOIN bairro AS b INNER JOIN usuario as u WHERE p.protocolo_id = tp.id AND p.tipo_documento_id = td.id AND p.origem_id = o.id AND d.protocolo_id = p.id AND d.tipo_denuncia_id = tds.id AND d.cidade_id = c.id AND d.bairro_id = b.id AND d.usuario_id = u.id AND md5(d.id)=:id", array('id' => $id));
            if (!empty($resultado)) {
                $dados = array();
                $dados['result'] = $resultado;
                $view = "cofisc/denuncia/denuncia";
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

}
