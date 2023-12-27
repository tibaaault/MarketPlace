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
            default:
                $controller = new HomePage();
                $controller->displayHomePage();
                break;
        }
    }
}
