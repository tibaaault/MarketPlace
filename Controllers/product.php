<?php
class Product
{

    public function displayProduct()
    {
        include_once 'Models/product.php';
        include_once 'Models/comment.php';

        if (isset($_POST['id_product'])) {
            $id_product = $_POST['id_product'];
            $product = OneProductByID($id_product);
            $ratings = RatingProduct();
            $productsSeller = ProductsBySeller($product[0]['seller_id']);
            $comments = CommentProduct($id_product);
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
            $seller_id = $_SESSION['id'];
            // $seller_id = 1;
            if (isset($_FILES["img_url"]) && $_FILES["img_url"]["error"] == UPLOAD_ERR_OK) {
                $targetDir = "/Users/thibault/Code/GitHub/MarketPlace/Pictures/"; // Remplacez cela par le chemin de votre dossier
                $img_url = $_FILES["img_url"]["name"];
                $targetFile = $targetDir . basename($_FILES["img_url"]["name"]);

                // Déplacer le fichier téléchargé vers le dossier cible
                if (move_uploaded_file($_FILES["img_url"]["tmp_name"], $targetFile)) {
                    $lastDot = strrpos($img_url, ".");
                    $extension = substr($img_url, $lastDot + 1);
                    $img_url = uniqid(true) . "." . $extension;
                    rename($targetDir . $_FILES["img_url"]['name'], $targetDir . $img_url);
                    $addProduct = addProductBDD($name, $price, $type, $img_url, $description, $seller_id);
                    echo "L'image a été téléchargée avec succès.";
                } else {
                    echo "Une erreur s'est produite lors du téléchargement de l'image.";
                }
            } else {
                echo "Une erreur s'est produite lors du téléchargement de l'image.";
            }


            include 'Views/header.php';
            header('Location: /');
        } else {
            echo "Erreur";
        }
    }

    function displaySellerProducts()
    {
        include_once 'Models/product.php';
        $products = ProductsBySeller($_SESSION['id']);
        // $products = ProductsBySeller(1);
        include 'Views/header.php';
        include 'Views/displaySellerProducts.php';
    }

    function modifyProduct()
    {
        include_once 'Models/product.php';

        if (isset($_POST['modifyProduct'])) {
            $id_product = $_POST['id_product'];
            $product = OneProductByID($id_product);
            include 'Views/header.php';
            include 'Views/modifyProduct.php';
        } else {
            echo "Erreur";
        }
    }
    function modifyProductBDD()
    {
        include_once 'Models/product.php';

        if (isset($_POST['modifyProductBDD'])) {
            $id_product = $_POST['id_product'];
            $product = OneProductByID($id_product);
            $name = isset($_POST['name']) ? $_POST['name'] : $_POST['default_name'];
            $price = isset($_POST['price']) ? $_POST['price'] : $_POST['default_price'];
            $price = str_replace(',', '.', $price);
            $type = isset($_POST['type']) ? $_POST['type'] : $_POST['default_type'];
            $description = $_POST['description'] ?? $product[0]['description'];
            if (isset($_FILES["img_url"]) && $_FILES["img_url"]["error"] == UPLOAD_ERR_OK) {
                $targetDir = "/Users/thibault/Code/GitHub/MarketPlace/Pictures/"; // Remplacez cela par le chemin de votre dossier
                $img_url = $_FILES["img_url"]["name"];
                $targetFile = $targetDir . basename($_FILES["img_url"]["name"]);

                // Déplacer le fichier téléchargé vers le dossier cible
                if (move_uploaded_file($_FILES["img_url"]["tmp_name"], $targetFile)) {
                    $lastDot = strrpos($img_url, ".");
                    $extension = substr($img_url, $lastDot + 1);
                    $img_url = uniqid(true) . "." . $extension;
                    rename($targetDir . $_FILES["img_url"]['name'], $targetDir . $img_url);
                    ModifyProductBDD($id_product, $name, $price, $type, $img_url, $description);
                    echo "L'image a été téléchargée avec succès.";
                } else {
                    echo "Une erreur s'est produite lors du téléchargement de l'image.";
                }
            } else {
                $img_url = $product[0]['img_url'];
                ModifyProductBDD($id_product, $name, $price, $type, $img_url, $description);
            }

            header('Location: /');
        } else {
            echo "Erreur";
        }
    }

    function deleteProduct()
    {
        include_once 'Models/product.php';

        if (isset($_POST['deleteProduct'])) {
            $id_product = $_POST['id_product'];
            DeleteProduct($id_product);
            header('Location: /');
        } else {
            echo "Erreur";
        }
    }
}
