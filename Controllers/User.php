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
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $address = $_POST['address'];
        $facAddress = $_POST['facAddress'];
        $businessName = $_POST['businessName'];
        $siret = $_POST['siret'];

        try {
            $this->userModel->createUser($firstName, $lastName, $email, $password, $role, $address, $facAddress, $businessName, $siret);

            $response = array('success' => true);
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            $response = array('success' => false, 'message' => $error);
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
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
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $this->userModel->login($email, $password);

            $response = array('success' => true);
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        } catch (Exception $e) {
            $error = $e->getMessage();
            $response = array('success' => false, 'message' => $error);
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }

}