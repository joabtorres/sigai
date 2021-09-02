<?php

class usuarioController extends controller {

    public function index() {
        
    }

    public function cadastro() {
        if ($this->checkUser() == 10) {
            $dados = array();
            $viewName = "usuario/cadastro";
            $crudModel = new crud_db();
            $usuarioModel = new usuario;
            $dados['setores'] = $crudModel->read("SELECT * FROM setor");
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $arrayCad = array();
                $arrayErro = array();
                $erro = array();
                //setor
                $arrayCad['setor_id'] = addslashes($_POST['nSetor']);
                //portaria
                $arrayCad['portaria'] = addslashes($_POST['nMatricula']);
                //cargo
                $arrayCad['cargo'] = addslashes($_POST['nCargo']);
                //portaria
                $arrayCad['nome'] = addslashes($_POST['nNome']);
                //usuario
                if (!empty($_POST['nUsuario'])) {
                    $arrayCad['usuario'] = addslashes($_POST['nUsuario']);
                    if ($usuarioModel->read_specific('SELECT * FROM usuario WHERE usuario=:usuario', array('usuario' => $arrayCad['usuario']))) {
                        $arrayErro['usuario']['msg'] = 'usuário já cadastrado';
                        $arrayErro['usuario']['class'] = 'is-invalid';
                        $erro['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível cadastrar um usuario já cadastrado, por favor informe outro nome de usuário';
                        $erro['class'] = 'alert-danger';
                        $arrayCad['usuario'] = null;
                    }
                }
                //email
                if (!empty($_POST['nEmail'])) {
                    $arrayCad['email'] = addslashes($_POST['nEmail']);
                    if ($usuarioModel->read_specific('SELECT * FROM usuario WHERE email=:email', array('email' => $arrayCad['email']))) {
                        $arrayErro['email']['msg'] = 'E-mail já cadastrado';
                        $arrayErro['email']['class'] = 'is-invalid';
                        $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível cadastrar um e-mail já cadastrado, por favor informe outro endereço de e-mail';
                        $dados['erro']['class'] = 'alert-danger';
                        $arrayCad['email'] = null;
                    }
                }
                //senha
                if (!empty($_POST['nSenha']) && !empty($_POST['nRepetirSenha'])) {
                    //senha
                    if ($_POST['nSenha'] == $_POST['nRepetirSenha']) {
                        $arrayCad['senha'] = $_POST['nSenha'];
                    } else {
                        $arrayErro['senha']['msg'] = "Os campos 'Senha' e 'Repetir Senha' não estão iguais! ";
                        $arrayErro['senha']['class'] = 'is-invalid';
                    }
                }
                //cargo
                $arrayCad['acesso'] = addslashes($_POST['nAcesso']);
                //data
                $arrayCad['cadastro'] = date('Y-m-d');
                //imagem
                if (isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) {
                    $arrayCad['imagem'] = $_FILES['tImagem-1'];
                }
                //status
                $arrayCad['status'] = !empty($_POST['nStatus']) ? 1 : 0;

                $dados['arrayCad'] = $arrayCad;
                $dados['arrayErro'] = $arrayErro;

                if (empty($arrayErro)) {
                    $usuarioModel->create($arrayCad);
                    $dados['erro']['msg'] = '<i class="fa fa-check" aria-hidden="true"></i> Cadastro realizado com sucesso!';
                    $dados['erro']['class'] = 'alert-success';
                    $_POST = array();
                }
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function editar($cod) {
        if (($this->checkUser() && $cod == md5($_SESSION['usuario']['id'])) || ($this->checkUser() >= 10)) {
            $dados = array();
            $viewName = "usuario/editar";
            $crudModel = new crud_db();
            $usuarioModel = new usuario;
            $usuario = $crudModel->read_specific("SELECT * FROM usuario WHERE md5(id)=:id", array('id' => $cod));
            if ($this->checkSetor() == 10) {
                $setor = $crudModel->read("SELECT * FROM setor");
            } else {
                $setor = $crudModel->read("SELECT * FROM setor WHERE id=:id", array('id' => $usuario['setor_id']));
            }
            $dados['setores'] = $setor;
            $dados['arrayCad'] = $usuario;
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $arrayCad = array();
                $arrayErro = array();
                $erro = array();
                //id
                $arrayCad['id'] = addslashes($_POST['nId']);
                //setor
                $arrayCad['setor_id'] = addslashes($_POST['nSetor']);
                //portaria
                $arrayCad['portaria'] = addslashes($_POST['nMatricula']);
                //cargo
                $arrayCad['cargo'] = addslashes($_POST['nCargo']);
                //portaria
                $arrayCad['nome'] = addslashes($_POST['nNome']);
                //usuario
                if (!empty($_POST['nUsuario'])) {
                    $arrayCad['usuario'] = addslashes($_POST['nUsuario']);
                    if ($usuarioModel->read_specific('SELECT * FROM usuario WHERE usuario=:usuario AND id!=:id', array('usuario' => $arrayCad['usuario'], 'id' => $arrayCad['id']))) {
                        $arrayErro['usuario']['msg'] = 'usuário já cadastrado';
                        $arrayErro['usuario']['class'] = 'is-invalid';
                        $erro['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível cadastrar um usuario já cadastrado, por favor informe outro nome de usuário';
                        $erro['class'] = 'alert-danger';
                        $arrayCad['usuario'] = null;
                    }
                }
                //email
                if (!empty($_POST['nEmail'])) {
                    $arrayCad['email'] = addslashes($_POST['nEmail']);
                    if ($usuarioModel->read_specific('SELECT * FROM usuario WHERE email=:email AND id!=:id', array('email' => $arrayCad['email'], 'id' => $arrayCad['id']))) {
                        $arrayErro['email']['msg'] = 'E-mail já cadastrado';
                        $arrayErro['email']['class'] = 'is-invalid';
                        $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível cadastrar um e-mail já cadastrado, por favor informe outro endereço de e-mail';
                        $dados['erro']['class'] = 'alert-danger';
                        $arrayCad['email'] = null;
                    }
                }
                //senha
                if (!empty($_POST['nSenha']) && !empty($_POST['nRepetirSenha'])) {
                    //senha
                    if ($_POST['nSenha'] == $_POST['nRepetirSenha']) {
                        $arrayCad['senha'] = $_POST['nSenha'];
                    } else {
                        $arrayErro['senha']['msg'] = "Os campos 'Senha' e 'Repetir Senha' não estão iguais! ";
                        $arrayErro['senha']['class'] = 'is-invalid';
                    }
                }
                //acesso
                if (isset($_POST['nAcesso']) && !empty($_POST['nAcesso'])) {
                    $arrayCad['acesso'] = addslashes($_POST['nAcesso']);
                } else {
                    $arrayCad['acesso'] = $dados['arrayCad']['acesso'];
                }
                //imagem
                if (isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) {
                    $arrayCad['imagem'] = $_FILES['tImagem-1'];
                }

                //imagem
                if (isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) {
                    $arrayCad['imagem'] = $_FILES['tImagem-1'];
                    $arrayCad['img_atual'] = $_POST['nImagem'];
                } else if (!empty($_POST['nImagem'])) {
                    $arrayCad['imagem'] = $_POST['nImagem'];
                } else {
                    $arrayCad['imagem'] = $dados['arrayCad']['imagem'];
                    $arrayCad['delete_img'] = true;
                }
                //status
                if (isset($_POST['nStatus']) && !empty($_POST['nStatus'])) {
                    $arrayCad['status'] = !empty($_POST['nStatus']) ? 1 : 0;
                }
                $dados['arrayCad'] = $arrayCad;
                $dados['arrayErro'] = $arrayErro;

                if (empty($arrayErro)) {
                    $dados['arrayCad'] = $usuarioModel->update($arrayCad);
                    $dados['erro']['msg'] = '<i class="fa fa-check" aria-hidden="true"></i> Alteração realizada com sucesso!';
                    $dados['erro']['class'] = 'alert-success';
                    if ($arrayCad['id'] == $this->getIdUser()) {
                        $this->setUser($arrayCad);
                    }

                    $_POST = array();
                } else {
                    if (empty($dados['erro'])) {
                        $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha todos os campos obrigatórios (*).';
                        $dados['erro']['class'] = 'alert-danger';
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
        if ($this->checkUser()) {
            $view = "usuario/consulta";
            $dados = array();
            $crudModel = new crud_db();
            $sql = "SELECT u.*, s.nome as setor, s.abreviacao FROM usuario as u INNER JOIN setor as s WHERE u.setor_id=s.id ";
            $arrayForm = array();
            if (isset($_GET['nBuscarBT'])) {
                $parametros = "?nSelectBuscar=" . $_GET['nSelectBuscar'] . "&nCampo=" . $_GET['nCampo'] . "&nBuscarBT=BuscarBT";
                $filtra_por = addslashes($_GET['nSelectBuscar']);
                $campo = addslashes($_GET['nCampo']);
                if ($filtra_por == "Nome") {
                    $sql .= " AND u.nome LIKE :campo ";
                    $arrayForm['campo'] = "%" . $campo . "%";
                } else {
                    $sql .= " AND u.email LIKE :campo ";
                    $arrayForm['campo'] = "%" . $campo . "%";
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
                $sql .= " LIMIT $indice,$limite ";
                $usuarios = $crudModel->read($sql, $arrayForm);
            } else {
                //paginacao
                $limite = 30;
                $total_registro = $crudModel->read_specific("SELECT COUNT(id) AS qtd FROM usuario");
                $paginas = $total_registro['qtd'] / $limite;
                $indice = 0;
                $pagina_atual = (isset($page) && !empty($page)) ? addslashes($page) : 1;
                $indice = ($pagina_atual - 1) * $limite;
                $dados["paginas"] = $paginas;
                $dados["pagina_atual"] = $pagina_atual;
                $dados['metodo_buscar'] = "";
                $sql .= " LIMIT $indice,$limite";
                $usuarios = $crudModel->read($sql);
            }
            //criando nova senha
            if (isset($_POST['nEnviar'])) {
                $email = addslashes(trim($_POST['nEmail']));
                $_POST = null;
                if ($this->validar_email($email) && $this->recuperar($email)) {
                    echo '<script>$("#modal_confirmacao_email").modal();</script>';
                } else {
                    echo '<script>$("#modal_invalido_email").modal();</script>';
                }
            }
            $dados['usuarios'] = $usuarios;
            $this->loadTemplate($view, $dados);
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    public function excluir($id) {
        if ($this->checkUser() && $this->checkSetor() == 10) {
            $crudModel = new usuario();
            if ($crudModel->remove(array('id' => addslashes($id)))) {
                $url = "location: " . BASE_URL . 'usuario/consultar/';
                header($url);
            }
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    /**
     * Está função verifica se o usuário está cadastrado no sistema, se ele estive será criado uma nova senha e enviado para o respectivo email
     * @return bollean 
     * @access private
     * @author Joab Torres <joabtorres1508@gmail.com>
     * 
     */
    private function recuperar($email) {
        if ($this->checkUser() != 4) {
            $usuarioModel = new usuario();
            $senha = $usuarioModel->newpassword($email);
            if ($senha) {
                // envia email ao usuário
                $assunto = NAME_PROJECT;
                $destinatario = $email;
                $mensagem = '<!DOCTYPE html>
			<html lang="pt-br">
			<head>
				<meta charset="UTF-8">
				<title>' . $assunto . '</title>
			</head>
			<body>
				<div style="width: 98%;display: block;margin: 10px auto;padding: 0;font-family: sans-serif, Arial;border : 2px solid #357ca5;">
				<h3 style="background: #357ca5;color: white;padding: 10px;margin: 0;">Nova Senha! <br/> <small>' . $assunto . ' - Nova Senha</small></h3>
					<p style="padding: 10px;line-height: 30px;">
                                            Você solicitou uma nova senha de acesso ao <b>' . $assunto . '</b>, confira abaixo sua nova senha de acesso: <br/>
                                            <span style="font-weight:bold">Email: </span><span style="color: #357ca5;">' . $email . '</span><br/>
                                            <span style="font-weight:bold">Nova Senha: </span> <span style="color: #357ca5;">' . $senha . '</span><br/>
                                                 <a href="' . BASE_URL . '" style="text-decoration: none;">Carregar Página</a>
					</p>
				</div>
			</body>
			</html>';
                $assunto .= " - NOVA SENHA";
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
                $headers .= 'From: ' . $assunto . ' <joabtorres.develop@gmail.com>' . "\r\n";
                $headers .= 'X-Mailer: PHP/' . phpversion();
                mail($destinatario, $assunto, $mensagem, $headers);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Está função verifica  se o e-mail do usuário é valido, ou seja, se seu servido de email existe.
     * @param String $email
     * @return bollean 
     * @access private
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    private function validar_email($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            list($usuario, $dominio) = explode("@", $email);
            if (checkdnsrr($dominio, 'MX')) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
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
