<?php
session_start();


require_once 'autoloader.php';
Autoloader::register();
require_once 'routeur.php';
require_once 'assets/bootstrapAssets.php';



$uri = $_SERVER['REQUEST_URI'];
$router = new Routeur();
$router->route($uri);
