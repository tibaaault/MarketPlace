<?php

class ProductModel {
    private $connexion;

    public function __construct($host, $user, $password, $database) {
        $this->connexion = mysqli_connect($host, $user, $password, $database);

        if (!$this->connexion) {
            die("Erreur de connexion à la base de données: " . mysqli_connect_error());
        }
    }

    public function getProductDetails($productId) {
        $query = "SELECT * FROM product WHERE id_product = $productId";
        $result = mysqli_query($this->connexion, $query);

        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }

    // Ajoutez d'autres méthodes liées aux produits ici

    public function closeConnection() {
        mysqli_close($this->connexion);
    }
}
