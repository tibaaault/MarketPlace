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


function AllProducts(){
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
    
