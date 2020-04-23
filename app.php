<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));
use libraries\Router;

require CONF_DIR . 'config.php';

$Route = new Router();

$Route->add('/', 'Dashboard');
$Route->add('/dashboard', 'Dashboard');


$Route->deploy();
