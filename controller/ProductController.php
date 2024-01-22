<?php

require_once 'ProductModel.php';
session_start();

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Instanciez le modèle des produits
    $productModel = new ProductModel('localhost:8889', 'root', 'password', 'marketPlace');

    // Récupérez les informations du produit depuis la base de données
    $productDetails = $productModel->getProductDetails($productId);

    if ($productDetails) {
        // Assurez-vous que la clé 'cart' existe dans la session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Ajoutez le produit au panier
        $productToAdd = array(
            'id' => $productDetails['id_product'],
            'name' => $productDetails['name'],
            'price' => $productDetails['price'],
            'quantity' => 1, // Vous pouvez ajuster la quantité selon vos besoins
        );

        $_SESSION['cart'][] = $productToAdd;

        echo 'Produit ajouté au panier avec succès!';
    } else {
        echo 'Erreur lors de la récupération des informations du produit.';
    }

    // Fermez la connexion à la base de données
    $productModel->closeConnection();
} else {
    echo 'ID du produit non spécifié.';
}

echo '<a href="./pagepaiement.php">Paiement</a> <br>';

// Ajoutez un bouton pour afficher le panier
echo '<a href="./viewcart.php">Afficher le panier</a>';
