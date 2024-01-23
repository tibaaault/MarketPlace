<!-- viewcart.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>

<body>

    <h1>Panier</h1>

    <?php
    // Vérifiez si le panier est vide
    if (empty($_SESSION['cart'])) {
        echo '<p>Le panier est vide.</p>';
    } else {
        // Affichez les détails des produits dans le panier
        foreach ($_SESSION['cart'] as $product) {
            // Récupérez les informations du produit depuis la base de données
            $productId = $product['id']; // Supposons que l'ID du produit est stocké dans la clé 'id'
            $query = "SELECT * FROM product WHERE id_product = $productId";
            $result = mysqli_query($votreConnexion, $query);

            if ($result) {
                $productDetails = mysqli_fetch_assoc($result);

                // Affichez les détails du produit
                echo '<p>Nom du produit: ' . $productDetails['name'] . '</p>';
                echo '<p>Prix: ' . $productDetails['price'] . '</p>';
                echo '<p>Quantité: ' . $product['quantity'] . '</p>';
                echo '<p>Type: ' . $productDetails['type'] . '</p>';
                echo '<p>Description: ' . $productDetails['description'] . '</p>';
                echo '<p>Image: ' . $productDetails['img_url'] . '</p>';
                // Ajoutez d'autres informations selon votre structure de base de données

                echo '<hr>';
            } else {
                echo '<p>Erreur lors de la récupération des informations du produit.</p>';
            }
        }

        // Ajoutez un bouton pour passer à la page de paiement
        echo '<a href="./pagepaiement.php">Paiement</a>';
    }
    ?>

</body>

</html>
