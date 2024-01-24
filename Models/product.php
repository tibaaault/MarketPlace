<?php
require_once 'dbConnect.php';

class ProductModel {

    private $db;

    public function __construct() {
        $this->db = Connexion::getInstance();
    }

function getAllProducts()
{
    
    try {
        $statement = $this->db->prepare("SELECT * FROM product");
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $products;
}

function getOneProductByID($id_product)
{

    try {
        $statement = $this->db->prepare("SELECT * FROM product INNER JOIN user ON product.id_seller = user.id WHERE id_product = :id_product");
        $statement = $this->db->prepare("SELECT 
        product.id_product AS product_id,
        product.name AS product_name,
        product.price,
        product.type,
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

function getProductsBySeller($id_seller)
{

    try {
        $statement = $this->db->prepare("SELECT 
        product.id_product AS product_id,
        product.name AS product_name,
        product.price,
        product.description,
        product.img_url
        FROM product INNER JOIN user ON product.id_seller = user.id WHERE id = :id_seller");
        $statement->execute(array(
            'id_seller' => $id_seller
        ));
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $products;
}

function addProductBDD($name, $price, $type, $img_url, $description, $seller_id)
{

    try {
        $statement = $this->db->prepare("INSERT INTO product (name, price, type, img_url, description, id_seller) VALUES (:name, :price, :type, :img_url, :description, :id_seller)");
        $statement->execute(array(
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'img_url' => $img_url,
            'description' => $description,
            'id_seller' => $seller_id
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


function modifyProductBDD($id_product, $name, $price, $type, $img_url, $description)
{

    try {
        $statement = $this->db->prepare("UPDATE product SET name = :name, price = :price, type = :type, img_url = :img_url, description = :description WHERE id_product = :id_product");
        $statement->execute(array(
            'id_product' => $id_product,
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'img_url' => $img_url,
            'description' => $description
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function deleteProduct($id_product)
{

    try {
        $statement = $this->db->prepare("DELETE FROM product WHERE id_product = :id_product");
        $statement->execute(array(
            'id_product' => $id_product
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getRatingProduct()
{

    try {
        $statement = $this->db->prepare("SELECT id_product, AVG(rating) AS rating FROM review GROUP BY id_product HAVING rating IS NOT NULL");
        $statement->execute();
        $rating = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $rating;
}


}