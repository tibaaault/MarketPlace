<?php
session_start();


require_once 'autoloader.php';
Autoloader::register();
require_once 'routeur.php';
// require_once 'assets/bootstrapAssets.php';



$uri = $_SERVER['REQUEST_URI'];
$router = new Routeur();


if ($_SERVER['REQUEST_METHOD'] !== 'POST' || 
(strpos($uri, '/signup') === false && strpos($uri, '/signin') === false)) {
    require_once 'assets/bootstrapAssets.php';
}

$router->route($uri);

