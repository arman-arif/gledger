<?php
defined('ROOT') or die(header("HTTP/1.1 403 Forbidden"));

// Load environment variables from .env file
require_once __DIR__ . '/env.loader.php';

// Get database configuration from environment variables with fallback defaults
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$dbname = getenv('DB_NAME') ?: 'gledger';

$dsn = "mysql:host=$host;dbname=$dbname";

define('HST', $host);
define('DBN', $dbname);
define('DSN', $dsn);
define('USR', $user);
define('PWD', $pass);