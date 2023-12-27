<?php
class Product
{
    public function displayProduct()
    {
        include_once 'Models/product.php';

        if (isset($_POST['id_product'])) {
            $id_product = $_POST['id_product'];
            $product = OneProductByID($id_product);
            $productsSeller = ProductsBySeller($product[0]['seller_id']);
            include 'Views/header.php';
            include 'Views/product.php';
        } else {
            echo "Erreur";
        }
    }
}
