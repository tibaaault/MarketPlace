<?php
class HomePage
{
    public function displayHomePage()
    {   
        include_once 'Models/product.php';
        $products = AllProducts();

        include 'Views/header.php';
        include 'Views/homePage.php';
    }
}
