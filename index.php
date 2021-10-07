<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('ROOT', dirname(__FILE__));

use src\Components\Router;
require_once 'public/header.php';
require_once(ROOT.'/src/Components/Router.php');

$router = new Router();
$router->run();