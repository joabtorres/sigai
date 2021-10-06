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
class fiscController extends controller {

    public function index() {
        if ($this->checkUser()) {
            $this->loadView('404');
        } else {
            $url = "location: " . BASE_URL . "home";
            header($url);
        }
    }

    function verificar_alteracoes($array1, $array2) {
        $array_de = array_diff($array2, $array1);
        $array_para = array_diff($array1, $array2);
        $msg .= 'Foi realizado as seguintes alterações no banco de dados';
        if (is_array($array_para)) {
            $msg .= '</br></br>';
            $msg .= '<b>ANTES:</b></br>';
            $msg .= '------------------------------</br>';
            foreach ($array_de as $key => $valeu) {
                $msg .= $key . ': ' . $valeu;
            }
            $msg .= '</br>';
            $msg .= '</br>';
            $msg .= '<b>ATUALIZADO(S) PARA:</b></br>';
            $msg .= '------------------------------</br>';
            foreach ($array_para as $key => $valeu) {
                $msg .= $key . ': ' . $valeu;
            }
        } else {
            $msg .= '</br>';
            $msg .= '<b>Nenhuma modificação relizada:</b></br>';
            $msg .= '------------------------------';
        }
        return $msg;
    }

    public function get_tipo_documento() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $protocolo_id = addslashes($_POST['protocolo_id']);
            if (isset($_POST['id_user'])) {
                $user_id = addslashes($_POST['id_user']);
            }
            $usuarios = $crudModel->read("SELECT * FROM fisc_tipo_documento WHERE protocolo_id=:id ORDER BY documento ASC", array('id' => $protocolo_id));
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

    public function get_search_tipo_documento() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $protocolo_id = addslashes($_POST['protocolo_id']);
            if (isset($_POST['id_user'])) {
                $user_id = addslashes($_POST['id_user']);
            }
            $usuarios = $crudModel->read("SELECT * FROM fisc_tipo_documento WHERE protocolo_id=:id ORDER BY documento ASC", array('id' => $protocolo_id));
            if (!isset($user_id)) {
                echo '<option value="" selected = "selected" >Todos </option>';
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
            $resultado = $crudModel->read("SELECT * FROM bairro WHERE cidade_id=:id ORDER BY bairro ASC", array('id' => $cidade_id));

            if (!isset($bairro_id)) {
                echo '<option value="" selected = "selected" disabled="disabled">Selecione o bairro </option>';
            }
            foreach ($resultado as $indice) {
                if (isset($bairro_id) && $indice['id'] == $bairro_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['bairro'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['bairro'] . '</option>';
                }
            }
        }
    }

    public function get_search_infracao() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $tipo_denuncia_id = addslashes($_POST['tipo_denuncia_id']);
            if (isset($_POST['infracao_id'])) {
                $infracao_id = addslashes($_POST['infracao_id']);
            }
            $resultado = $crudModel->read("SELECT * FROM fisc_tipo_infracao WHERE tipo_denuncia_id=:id ORDER BY infracao ASC", array('id' => $tipo_denuncia_id));

            if (!isset($infracao_id)) {
                echo '<option value="" selected = "selected" >Todas </option>';
            }
            foreach ($resultado as $indice) {
                if (isset($infracao_id) && $indice['id'] == $infracao_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['infracao'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['infracao'] . '</option>';
                }
            }
        }
    }

    public function get_search_classificacao() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $infracao_id = addslashes($_POST['infracao_id']);
            if (isset($_POST['classificacao_id'])) {
                $classificacao_id = addslashes($_POST['classificacao_id']);
            }
            $resultado = $crudModel->read("SELECT * FROM fisc_tipo_classificao WHERE infracao_id=:id ORDER BY classificacao ASC", array('id' => $infracao_id));
            if (!isset($classificacao_id)) {
                echo '<option value="" selected = "selected" >Todas </option>';
            }
            if (!empty($resultado) && is_array($resultado)) {
                foreach ($resultado as $indice) {
                    if (isset($classificacao_id) && $indice['id'] == $classificacao_id) {
                        echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['classificacao'] . '</option>';
                    } else {
                        echo '<option value = "' . $indice['id'] . '">' . $indice['classificacao'] . '</option>';
                    }
                }
            }
        }
    }

    public function get_infracao() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $tipo_denuncia_id = addslashes($_POST['tipo_denuncia_id']);
            if (isset($_POST['infracao_id'])) {
                $infracao_id = addslashes($_POST['infracao_id']);
            }
            $resultado = $crudModel->read("SELECT * FROM fisc_tipo_infracao WHERE tipo_denuncia_id=:id ORDER BY infracao ASC", array('id' => $tipo_denuncia_id));

            if (!isset($infracao_id)) {
                echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo da infração </option>';
            }
            foreach ($resultado as $indice) {
                if (isset($infracao_id) && $indice['id'] == $infracao_id) {
                    echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['infracao'] . '</option>';
                } else {
                    echo '<option value = "' . $indice['id'] . '">' . $indice['infracao'] . '</option>';
                }
            }
        }
    }

    public function get_classificacao() {
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $infracao_id = addslashes($_POST['infracao_id']);
            if (isset($_POST['classificacao_id'])) {
                $classificacao_id = addslashes($_POST['classificacao_id']);
            }
            $resultado = $crudModel->read("SELECT * FROM fisc_tipo_classificao WHERE infracao_id=:id ORDER BY classificacao ASC", array('id' => $infracao_id));
            if (!isset($classificacao_id)) {
                echo '<option value="" selected="selected" disabled="disabled">Selecione o tipo da classificação  </option>';
            }
            if (!empty($resultado) && is_array($resultado)) {
                foreach ($resultado as $indice) {
                    if (isset($classificacao_id) && $indice['id'] == $classificacao_id) {
                        echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['classificacao'] . '</option>';
                    } else {
                        echo '<option value = "' . $indice['id'] . '">' . $indice['classificacao'] . '</option>';
                    }
                }
            }
        }
    }

}
