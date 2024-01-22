<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = $this->connexion();
    }

    public function createUser($username, $password) {
        try {
            // Vérifier si l'utilisateur existe déjà
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                throw new Exception("L'utilisateur existe déjà.");
            }

            // Créer un nouvel utilisateur
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function authenticate($username, $password) {
        try {
            // Récupérer le mot de passe haché de l'utilisateur
            $stmt = $this->db->prepare("SELECT password FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $hashedPassword = $stmt->fetchColumn();

                // Vérifier si le mot de passe correspond
                return password_verify($password, $hashedPassword);
            }

            return false;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    private function connexion()
    {
        try {
            $db = new PDO("mysql:host=localhost:3306;dbname=marketPlace", "root", "root123");
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
