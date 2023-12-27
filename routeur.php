<?php

class Routeur
{
    public function route($uri)
    {

        switch ($uri) {
            case '/product':
                $controller = new Product();
                $controller->displayProduct();
                break;
            case '/seller':
                $controller = new Seller();
                $controller->seller();
                break;
            default:
                $controller = new HomePage();
                $controller->displayHomePage();
                break;
        }
    }
}
