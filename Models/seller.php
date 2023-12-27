<?php
include_once 'Models/product.php';

function getSeller($id_seller)
{
    $db = Connexion();
    try {
        $statement = $db->prepare("SELECT * FROM user WHERE id = :id_seller");
        $statement->execute(array(
            'id_seller' => $id_seller
        ));
        $seller = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $seller;
}
