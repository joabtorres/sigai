<?php

class loginController extends controller {

    public function index() {
        $viewName = "login";
        $dados = array();
        $_SESSION = array();
        if (isset($_POST['nSalvar'])) {
            if (!empty($_POST['nUsuario']) && !empty($_POST['nSenha'])) {
                $usuarioModel = new usuario();
                $user = array('usuario' => addslashes($_POST['nUsuario']), 'senha' => md5(sha1($_POST['nSenha'])));
                $resultado = $usuarioModel->read_specific('SELECT * FROM usuario WHERE usuario=:usuario AND senha=:senha AND status = 1', $user);
                if (!$resultado) {
                    $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> O Campo Usuário e/ou Senha está incorreto!';
                }
            } else {
                $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> O Campo Usuário e/ou Senha não está preenchido!';
            }
            if (!isset($dados['erro']) && empty($dados['erro'])) {

                $this->setUser($resultado);
                
                $url = "location: " . BASE_URL . "home";
                header($url);
            }
        }

        $this->loadView($viewName, $dados);
    }

}
