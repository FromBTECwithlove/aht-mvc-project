<?php

use MVC_Project\Dispatcher;
use MVC_Project\Config\Core;
use MVC_Project\Router;
use MVC_Project\Request;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require_once __DIR__ . '/../vendor/autoload.php';

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>