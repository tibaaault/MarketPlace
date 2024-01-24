<?php
include_once 'Models/product.php';
include_once 'Models/comment.php';
include_once 'Models/seller.php';


class Seller
{
    private $productModel;
    private $commentModel;
    private $sellerModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->commentModel = new CommentModel();
        $this->sellerModel = new SellerModel();
    }

    public function seller()
    {
        if (isset($_POST['id_seller'])) {
            $id_seller = $_POST['id_seller'];
            $seller = $this->sellerModel->getSeller($id_seller);
            $productsSeller = $this->productModel->getProductsBySeller($id_seller);
            $nbrProducts = count($productsSeller);
            include 'Views/header.php';
            include 'Views/seller.php';
        } else {
            echo "Erreur";
        }
    }

    public function isSeller()
    {
        $id = $_SESSION['id'];
        $isSeller = $this->sellerModel->getTypeUser($id);
        $_SESSION['isSeller'] = $isSeller[0]['role'];
    }
}
