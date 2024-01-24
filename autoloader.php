<?php

// Autoloader.php
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($className) {
            $controllerFile = __DIR__ . '/Controllers/' . $className . '.php';
            $modelFile = __DIR__ . '/Models/' . $className . '.php';
            
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
            } elseif (file_exists($modelFile)) {
                require_once $modelFile;
            }
        });
    }
}
