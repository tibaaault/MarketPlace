<?php
class Seller
{
    public function seller()
    {
        include_once 'Models/seller.php';

        if (isset($_POST['id_seller'])) {
            $id_seller = $_POST['id_seller'];
            $seller = getSeller($id_seller);
            $productsSeller = ProductsBySeller($id_seller);
            $nbrProducts = count($productsSeller);
            include 'Views/header.php';
            include 'Views/seller.php';
        } else {
            echo "Erreur";
        }
    }
}
