<?php

class Routeur
{
    public function route($uri)
    {
        if (isset($_SESSION['id'])) {
            $controller = new Seller();
            $controller->isSeller();
        }


        switch ($uri) {
            case '/product':
                $controller = new Product();
                $controller->displayProduct();
                break;
            case '/seller':
                $controller = new Seller();
                $controller->seller();
                break;
            case '/newProduct':
                $controller = new Product();
                $controller->addNewProduct();
                break;
            case '/addProduct':
                $controller = new Product();
                $controller->addProductBDD();
                break;
            case '/displaySellerProducts':
                $controller = new Product();
                $controller->displaySellerProducts();
                break;
            case '/modifyProduct':
                $controller = new Product();
                $controller->modifyProduct();
                break;
            case '/modifyProductBDD':
                $controller = new Product();
                $controller->modifyProductBDD();
                break;
            case '/deleteProduct':
                $controller = new Product();
                $controller->deleteProduct();
                break;
            case '/goMP':
                $controller = new Message();
                $controller->goMessage();
                break;
            case '/sendMessage':
                $controller = new Message();
                $controller->sendMessage();
                break;
            case '/conversation':
                $controller = new Message();
                $controller->displayConversation();
                break;
            case '/signup':
                $controller = new User();
                $controller->signup();
                break;
            case '/signin':
                $controller = new User();
                $controller->signin();
                break;
            default:
                $controller = new HomePage();
                $controller->displayHomePage();
                break;
        }
    }
}
