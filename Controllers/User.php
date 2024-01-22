<?php

include_once 'Models/User.php';

class User 
{

    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleSignup();
        } else {
            include 'Views/header.php';
            include 'Views/signup.php';
        }
    }

    private function handleSignup() {
        // Validation des données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            // Appeler la fonction du modèle pour créer un nouvel utilisateur
            $this->userModel->createUser($username, $password);

            // Rediriger vers la page de connexion (ou afficher un message de succès)
            header('Location: login.php');
            exit;
        } catch (Exception $e) {
            // En cas d'erreur, afficher un message d'erreur
            $error = $e->getMessage();
            require_once 'app/views/register.php';
        }
    }

    public function signin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleSignin();
        } else {
            include 'Views/header.php';
            include 'Views/signin.php';
        }
    }

    private function handleSignin() {
        // Validation des données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            // Appeler la fonction du modèle pour créer un nouvel utilisateur
            $this->userModel->createUser($username, $password);

            // Rediriger vers la page de connexion (ou afficher un message de succès)
            header('Location: login.php');
            exit;
        } catch (Exception $e) {
            // En cas d'erreur, afficher un message d'erreur
            $error = $e->getMessage();
            require_once 'app/views/register.php';
        }
    }

}