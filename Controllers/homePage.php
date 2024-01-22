<?php
class HomePage
{
    public function displayHomePage()
    {   
        include_once 'Models/product.php';
        $products = AllProducts();
        $ratings = RatingProduct();
        include 'Views/header.php';
        include 'Views/homePage.php';
    }
}
