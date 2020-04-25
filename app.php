<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

// error_reporting(0);

use libraries\Router;
use libraries\Session;

require CONF_DIR . 'config.php';

$Route = new Router();

$Route->add('/', 'Dashboard');
$Route->add('/dashboard', 'Dashboard');
$Route->add('/ledger', 'Ledger');
$Route->add('/expenses', 'Expenses');
$Route->add('/login', 'Login');


$Route->add('/logout', function (){
    Session::destroy();

});


$Route->deploy();
