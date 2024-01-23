<?php

include_once 'Models/Admin.php';

class Admin 
{

    private $adminModel;

    public function __construct() {
        $this->adminModel = new AdminModel();
    }

    public function user() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->adminModel->getUser();
            $read = false;
            include 'Views/admin.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->adminModel->setUser(json_decode($_POST['values'], true));
        }
    }
    
    public function product() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->adminModel->getProduct();
            $read = false;
            include 'Views/admin.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->adminModel->setProduct(json_decode($_POST['values'], true));
        }
    }

    public function review() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->adminModel->getReview();
            $read = false;
            include 'Views/admin.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->adminModel->setReview(json_decode($_POST['values'], true));
        }
    }

    public function purchase() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data = $this->adminModel->getPurchase();
            $read = true;
            include 'Views/admin.php';
        }
    }

}