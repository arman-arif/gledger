<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));


define('PROJ_DIR', "gledger");
define('D_S', DIRECTORY_SEPARATOR);
define('PAGE_DIR', ROOT . 'pages' . D_S);
define('INCL_DIR', ROOT . 'incl' . D_S);
define('LIB_DIR', ROOT . 'lib' . D_S);

require CONF_DIR . 'db.config.php';

spl_autoload_register(function ($class_name){
    $class_file = LIB_DIR . $class_name . '.php';
    if (file_exists($class_file))
        require $class_file;
});