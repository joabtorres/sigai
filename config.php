<?php

/*
 * config.php  - Este arquivo contem informações referente a: Conexão com banco de dados e URL Pádrão
 */

require 'environment.php';
$config = array();
if (ENVIRONMENT == 'development') {
    //Raiz
    define("BASE_URL", "http://localhost/sigai/");
    //nome do projeto
    define("NAME_PROJECT", "SIGAI - Sistema de Gerenciamento de Atividades Internas para SEMMA");
    //Nome do banco
    $config['dbname'] = 'bd_semma_sigai';
    //host
    $config['host'] = 'localhost';
    //usuario
    $config['dbuser'] = 'root';
    //senha
    $config['dbpass'] = '';
} else {
     //Raiz
    define("BASE_URL", "http://192.168.1.110/sigai/");
    //nome do projeto
    define("NAME_PROJECT", "SIGAI - Sistema de Gerenciamento de Atividades Internas para SEMMA");
    //Nome do banco
    $config['dbname'] = 'bd_semma_sigai';
    //host
    $config['host'] = 'localhost';
    //usuario
    $config['dbuser'] = 'root';
    //senha
    $config['dbpass'] = '';
}
?>
