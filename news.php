<?php
error_reporting(E_ALL);
define('ROOT', dirname(__FILE__));
require_once (ROOT . '/components/Router.php');
require_once ROOT . '/components/Db.php';
$router = new Router();
$router->run();
