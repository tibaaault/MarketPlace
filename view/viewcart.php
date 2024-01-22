<?php
//voir le panier 
session_start();
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    echo 'Votre panier est vide.';
} else {
    // Incluez votre fichier de connexion à la base de données
    $host = 'localhost:8889';
    $user = 'user';
    $password = '';
    $database = 'marketPlace';

    // Créez la connexion à la base de données
    $votreConnexion = mysqli_connect($host, $user, $password, $database);


// Affichez les détails des produits dans le panier
foreach ($_SESSION['cart'] as $product) {
    // Récupérez les informations du produit depuis la base de données
    $productId = $product['id']; // Supposons que l'ID du produit est stocké dans la clé 'id'
    $query = "SELECT * FROM product WHERE id_product = $productId";
    $result = mysqli_query($votreConnexion, $query);

    if ($result) {
        $productDetails = mysqli_fetch_assoc($result);

        // Affichez les détails du produit
        echo 'Nom du produit: ' . $productDetails['name'] . '<br>';
        echo 'Prix: ' . $productDetails['price'] . '<br>';
        echo 'Quantité: ' . $product['quantity'] . '<br>';
        echo 'Type: ' . $productDetails['type'] . '<br>';
        echo 'Description: ' . $productDetails['description'] . '<br>';
        echo 'image: ' . $productDetails['img_url'] . '<br>';
        // Ajoutez d'autres informations selon votre structure de base de données

        echo '<br>';
    } else {
        echo 'Erreur lors de la récupération des informations du produit.';
    }
}

// Ajoutez un bouton pour passer à la page de paiement
echo '<a href="./pagepaiement.php">Paiement</a>';

// Fermez la connexion à la base de données si vous l'avez ouverte
mysqli_close($votreConnexion);
}
?>

