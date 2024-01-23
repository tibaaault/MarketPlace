<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header('Location: login.php');
    exit();
}

// L'utilisateur est connecté, continuer avec le reste du code

// Vérifiez si l'ID du produit est passé en tant que paramètre
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Récupérez les informations du produit depuis la base de données
    $query = "SELECT * FROM product WHERE id_product = $productId";
    $result = mysqli_query($votreConnexion, $query);

    if ($result) {
        $productDetails = mysqli_fetch_assoc($result);

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
} else {
    echo 'ID du produit non spécifié.';
}

// Un bouton pour afficher le panier
echo '<a href="./views/viewcart.php">Afficher le panier</a>';

// Fermez la connexion à la base de données si vous l'avez ouverte
mysqli_close($votreConnexion);
?>
