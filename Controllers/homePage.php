<?php

include_once 'Models/product.php';
include_once 'Models/comment.php';
class HomePage
{

    private $productModel;
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
        $this->productModel = new ProductModel();
    }
    public function displayHomePage()
    {
        $products = $this->productModel->getAllProducts();
        $ratings = $this->productModel->getRatingProduct();
        include 'Views/header.php';
        include 'Views/homePage.php';
    }
}
