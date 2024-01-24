<?php

class Connexion
{
    private static $instance = null;
    private $db;

    private function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost:8889;dbname=marketPlace", "root", "root");
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance->db;
    }
}
