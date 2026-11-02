<?php
// composer autoloading
require_once BASE_DIR . '/vendor/autoload.php';

use Core\Libraries\Config;
use Core\Libraries\Router;

// load configs
Config::load();

// routing
$router = new Router();
$router->resolve();