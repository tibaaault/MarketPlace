<?php

session_start();

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    echo '<h2>Contenu du panier :</h2>';

    foreach ($_SESSION['cart'] as $product) {
        echo 'ID: ' . $product['id'] . '<br>';
        echo 'Nom: ' . $product['name'] . '<br>';
        echo 'Prix: ' . $product['price'] . '<br>';
        echo 'Quantité: ' . $product['quantity'] . '<br>';
        echo '<hr>';
    }
} else {
    echo 'Le panier est vide.';
}
