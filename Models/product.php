<?php


function Connexion()
{
    try {
        $db = new PDO("mysql:host=localhost:8889;dbname=marketPlace", "root", "root");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}


function AllProducts()
{
    $db = Connexion();

    try {
        $statement = $db->prepare("SELECT * FROM product");
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $products;
}

function OneProductByID($id_product)
{
    $db = Connexion();

    try {
        $statement = $db->prepare("SELECT * FROM product INNER JOIN user ON product.id_seller = user.id WHERE id_product = :id_product");
        $statement = $db->prepare("SELECT 
        product.id_product AS product_id,
        product.name AS product_name,
        product.price,
        product.description,
        product.img_url,
        user.id AS seller_id,
        user.name AS seller_name,
        user.firstname AS seller_firstname,
        user.email AS seller_email
        FROM product
        INNER JOIN user ON product.id_seller = user.id
        WHERE product.id_product = :id_product");

        $statement->execute(array(
            'id_product' => $id_product
        ));
        $product = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $product;
}

function ProductsBySeller($id_seller)
{
    $db = Connexion();
    try {
        $statement = $db->prepare("SELECT * FROM product INNER JOIN user ON product.id_seller = user.id WHERE id = :id_seller");
        $statement->execute(array(
            'id_seller' => $id_seller
        ));
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $products;
}
