<?php

include_once 'Models/Admin.php';

class Admin 
{

    private $adminModel;

    public function __construct() {
        $this->adminModel = new AdminModel();
    }

    private function checkAdmin() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['id']) || $_SESSION['id'] != 0) {
            header('Location: /');
        }
    }
    public function user() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->adminModel->getUser();
            $read = false;
            include 'Views/admin.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->adminModel->setUser(json_decode($_POST['values'], true));
        }
    }
    
    public function product() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->adminModel->getProduct();
            $read = false;
            include 'Views/admin.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->adminModel->setProduct(json_decode($_POST['values'], true));
        }
    }

    public function review() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->adminModel->getReview();
            $read = false;
            include 'Views/admin.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->adminModel->setReview(json_decode($_POST['values'], true));
        }
    }

    public function purchase() {
        $this->checkAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->adminModel->getPurchase();
            $read = true;
            include 'Views/admin.php';
        }
    }

}