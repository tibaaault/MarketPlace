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

    public function isSeller( )
    {
        include_once 'Models/seller.php';

        $id = $_SESSION['id'];
        $isSeller = getTypeUser($id);
        $_SESSION['isSeller'] = $isSeller[0]['role'];
    }
}
