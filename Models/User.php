<?php

class UserModel {
    private $db;

    public function __construct() {
        $this->db = $this->connexion();
    }

    public function createUser($firstName, $lastName, $email, $password, $role, $address, $facAddress, $businessName, $siret) {

        if ($role == 'buyer') {
            $this->validateBuyerData($firstName, $lastName, $email, $password, $role);
        } else if ($role == 'seller') {
            $this->validateSellerData($firstName, $lastName, $email, $password, $role, $address, $facAddress, $businessName, $siret);
        } else {
            throw new Exception('Rôle non valide.');
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->insertUser($firstName, $lastName, $email, $hashedPassword, $role, $address, $facAddress, $businessName, $siret);
    }

    private function validateBuyerData($firstName, $lastName, $email, $password, $role) {
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($role)) {
            throw new Exception('Veuillez remplir tous les champs.');
        }
    }

    private function validateSellerData($firstName, $lastName, $email, $password, $role, $address, $facAddress, $businessName, $siret) {
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($role) || empty($address) || empty($facAddress) || empty($businessName) || empty($siret)) {
            throw new Exception('Veuillez remplir tous les champs.');
        }
    }

    private function insertUser($firstName, $lastName, $email, $password, $role, $address, $facAddress, $businessName, $siret) {
        try {
            if ($this->emailExists($email)) {
                throw new Exception('Cet e-mail est déjà utilisé.');
            }

            $roleValue = ($role == 'buyer') ? 0 : 1;

            $stmt = $this->db->prepare("INSERT INTO user (name, firstname, email, password, role, address, fac_address, business_name, siret) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $lastName);
            $stmt->bindParam(2, $firstName);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $password);
            $stmt->bindParam(5, $roleValue);
            $stmt->bindParam(6, $address);
            $stmt->bindParam(7, $facAddress);
            $stmt->bindParam(8, $businessName);
            $stmt->bindParam(9, $siret);

            $stmt->execute();
        } catch (Exception $e) {
            throw new Exception('Erreur lors de l\'insertion dans la base de données : ' . $e->getMessage());
        }
    }

    private function emailExists($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
        $stmt->bindParam(1, $email);
        $stmt->execute();
    
        return $stmt->fetchColumn() > 0;
    }

    public function login($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT id, password, role FROM user WHERE email = ?");
            $stmt->bindParam(1, $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $this->startUserSession($user['id']);

                return true;
            } else {
                throw new Exception('Identifiants invalides.');
            }
        } catch (Exception $e) {
            throw new Exception('Erreur lors de la connexion : ' . $e->getMessage());
        }
    }

    private function startUserSession($userId) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        $_SESSION['id'] = $userId;
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
