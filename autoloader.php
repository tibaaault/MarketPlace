<?php

// Autoloader.php
class Autoloader {
    public static function register() {
        spl_autoload_register(function($className) {
            $file = __DIR__ . '/Controllers/' . $className . '.php';
            if (file_exists($file)) {
                require_once $file;
            }
        });
    }
}