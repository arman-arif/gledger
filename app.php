<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

require CONF_DIR . 'config.php';

$Route = new Router();

$Route->add('/', 'dashboard');
$Route->add('/dashboard', 'dashboard');


$Route->deploy();
