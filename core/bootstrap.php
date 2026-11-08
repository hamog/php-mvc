<?php
// composer autoloading
require_once BASE_DIR . '/vendor/autoload.php';

use Core\Libraries\Config;
use Core\Libraries\Router;

session_start();

// load configs
Config::load();

define("BASE_URL", Config::get('base_url'));

// routing
$router = new Router();
$router->resolve();
