<?php

class semmaController extends controller {

    public function index() {
        if ($this->checkUser() && $this->checkSetor() == 10) {
            $viewName = "semma/semma-cadastro";
            $dados = array();
            $crud = new crud_db();
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $arrayCad = array();
                //id
                $arrayCad['id'] = $_POST['iId'];
                //iNome
                $arrayCad['nome'] = $_POST['nNome'];
                //nAbrevicao
                $arrayCad['abreviacao'] = $_POST['nAbrevicao'];
                //endereco
                $arrayCad['endereco'] = $_POST['nEndereco'];
                //nCEP
                $arrayCad['cep'] = $_POST['nCEP'];
                //nCNPJ
                $arrayCad['data'] = $_POST['nCNPJ'];
                //iTelefone
                $arrayCad['telefone'] = $_POST['nTelefone'];
                //nEmail
                $arrayCad['email'] = $_POST['nSite'];
                //nSite
                $arrayCad['site'] = $_POST['nSite'];

                if (isset($_FILES['nFile']) && $_FILES['nFile']['error'] == 0) {
                    $arrayCad['figura'] = $this->save_image($_FILES['nFile']);
                    if ($arrayCad['figura'] != null) {
                        if (!empty($_POST['nFileEnviado'])) {
                            $crudModel->delete_file($_POST['nFileEnviado']);
                        }
                    }
                } else {
                    $arrayCad['figura'] = $_POST['nFileEnviado'];
                }
                $resultado = $crudModel->up("INSERT INTO chamado (setor_id, usuario_id, status_id, assunto, data, descricao, anexo) VALUES (:setor_id, :usuario_id, :status_id, :assunto, :data, :descricao, :anexo) ", $arrayCad);
                if ($resultado) {
                    $dados['erro'] = array('class' => 'alert-success', 'msg' => '<i class="fa fa-check-circle" aria-hidden="true"></i> Cadastro realizado com sucesso!');
                } else {
                    $dados['chamado'] = $arrayCad;
                }
            }
            $dados['arrayCad'] = $crud->read_specific("SELECT * FROM empresa");
            $this->loadTemplate($viewName, $dados);
        }
    }

    public function setores() {
        if ($this->checkUser()) {
            $viewName = "home";
            $dados = array();
            $this->loadTemplate($viewName, $dados);
        }
    }

    /**
     * Está função é responsável para salva uma imágem no diretório uploads/usuarios/
     * @access public
     * @return boolean TRUE or FALSE
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    private function save_image($file) {
        $imagem = array();
        $largura = 225;
        $altura = 85;
        $imagem['temp'] = $file['tmp_name'];
        $imagem['extensao'] = explode(".", $file['name']);
        $imagem['extensao'] = strtolower(end($imagem['extensao']));
        $imagem['name'] = md5(rand(1000, 900000) . time()) . '.' . $imagem['extensao'];
        $imagem['diretorio'] = 'uploads/empresa';
        if ($imagem['extensao'] == 'jpg' || $imagem['extensao'] == 'jpeg' || $imagem['extensao'] == 'png') {

            list($larguraOriginal, $alturaOriginal) = getimagesize($imagem['temp']);


            $ratio = max($largura / $larguraOriginal, $altura / $alturaOriginal);
            $alturaOriginal = $altura / $ratio;
            $larguraOriginal = $largura / $ratio;


            $imagem_final = imagecreatetruecolor($largura, $altura);

            if ($imagem['extensao'] == 'jpg' || $imagem['extensao'] == 'jpeg') {
                $imagem_original = imagecreatefromjpeg($imagem['temp']);
                imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
                imagejpeg($imagem_final, $imagem['diretorio'] . "/" . $imagem['name'], 90);
            } else if ($imagem['extensao'] == 'png') {
                $imagem_original = imagecreatefrompng($imagem['temp']);
                imagecopyresampled($imagem_final, $imagem_original, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
                imagepng($imagem_final, $imagem['diretorio'] . "/" . $imagem['name']);
            }
            return $imagem['diretorio'] . "/" . $imagem['name'];
        } else {
            return null;
        }
    }

}
