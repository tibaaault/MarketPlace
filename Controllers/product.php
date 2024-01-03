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

    public function addNewProduct()
    {
        include 'Views/header.php';
        include 'Views/addNewProduct.php';
    }

    public function addProductBDD()
    {
        include_once 'Models/product.php';

        if (isset($_POST['addProductBDD'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            $description = $_POST['description'];
            // $seller_id = $_SESSION['id'];
            $seller_id = 1;
            if (isset($_FILES["img_url"]) && $_FILES["img_url"]["error"] == UPLOAD_ERR_OK) {
                $targetDir = "/Users/thibault/Code/GitHub/MarketPlace/Pictures/"; // Remplacez cela par le chemin de votre dossier
                $img_url = $_FILES["img_url"]["name"];
                $targetFile = $targetDir . basename($_FILES["img_url"]["name"]);

                // Déplacer le fichier téléchargé vers le dossier cible
                if (move_uploaded_file($_FILES["img_url"]["tmp_name"], $targetFile)) {
                    echo "L'image a été téléchargée avec succès.";
                } else {
                    echo "Une erreur s'est produite lors du téléchargement de l'image.";
                }
            } else {
                echo "Une erreur s'est produite lors du téléchargement de l'image.";
            }
            $addProduct = addProductBDD($name, $price, $type, $img_url, $description, $seller_id);

            include 'Views/header.php';
            header('Location: /');
        } else {
            echo "Erreur";
        }
    }
    function displaySellerProducts()
    {
        include_once 'Models/product.php';
        // $products = ProductsBySeller($_SESSION['id']);
        $products = ProductsBySeller(1);
        include 'Views/header.php';
        include 'Views/displaySellerProducts.php';
    }
}
