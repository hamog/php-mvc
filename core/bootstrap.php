<?php
// composer autoloading
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Libraries\Config;
use Core\Libraries\Router;

// load configs
Config::load();

// routing
$router = new Router();
$router->resolve();