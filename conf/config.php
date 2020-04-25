<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

define('APP_NAME', "gLedger");

define('BASE_URL', "http://".$_SERVER['HTTP_HOST']."/gledger/");

define('PROJ_DIR', "gledger");

define('D_S', DIRECTORY_SEPARATOR);
define('PAGE_DIR', ROOT . 'pages' . D_S);
define('INCL_DIR', ROOT . 'incl' . D_S);
define('LIB_DIR', ROOT . 'libraries' . D_S);
define('MOD_DIR', ROOT . 'modules' . D_S);

require CONF_DIR . 'db.config.php';

spl_autoload_register(function ($class_name){
    $class_file = ROOT . $class_name . '.php';
    if (file_exists($class_file))
        require $class_file;
});