<?php
/* define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();
/* define o prazo do cache em 30 minutos */
session_cache_expire(60);
$cache_expire = session_cache_expire();

/* inicia a sessão */
session_start();
header('Cache-Control: no cache');
require 'config.php';
require 'vendor/autoload.php';

spl_autoload_register(function ($class) {
    if (strpos($class, 'Controller') > -1) {
        if (file_exists('controllers/' . $class . '.php')) {
            require_once 'controllers/' . $class . '.php';
        }
    } elseif (file_exists('models/' . $class . '.php')) {
        require_once 'models/' . $class . '.php';
    } elseif (file_exists('core/' . $class . '.php')) {
        require_once 'core/' . $class . '.php';
    }
});

$core = new core();
$core->run();
?>