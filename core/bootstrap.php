<?php
//debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// composer autoloading
require_once BASE_DIR . '/vendor/autoload.php';

use Core\Libraries\Config;
use Core\Libraries\Router;

session_start();

// load configs
Config::load();

define("BASE_URL", Config::get('base_url'));

date_default_timezone_set('Asia/Tehran');

// routing
$router = new Router();
$router->resolve();
