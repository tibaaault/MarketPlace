<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout au Panier</title>
</head>
<body>

    <h1>test=Ajout au Panier</h1>

    <?php
    // Vérifier si un message d'ajout au panier existe dans la session
    if (isset($_SESSION['add_to_cart_message'])) {
        echo '<p>' . $_SESSION['add_to_cart_message'] . '</p>';
        unset($_SESSION['add_to_cart_message']); // Supprimer le message après l'affichage
    }
    ?>

    <a href="Views/viewcart.php">Afficher le Panier</a>

</body>
</html>
