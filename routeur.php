<?php

class Routeur
{
    public function route($uri)
    {
        switch ($uri) {
            case '/home':
                $controller = new HomePage();
                $controller->displayHomePage();
                break;
            default:
                $controller = new HomePage();
                $controller->displayHomePage();
                break;
        }
    }
}
