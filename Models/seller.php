<?php

class SellerModel {

    private $db;

    public function __construct() {
        $this->db = Connexion::getInstance();
    }

function getSeller($id_seller)
{

    try {
        $statement = $this->db->prepare("SELECT * FROM user WHERE id = :id_seller");
        $statement->execute(array(
            'id_seller' => $id_seller
        ));
        $seller = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $seller;
}

function getTypeUser($id)
{

    try {
        $statement = $this->db->prepare("SELECT role FROM user WHERE id = :id");
        $statement->execute(array(
            'id' => $id
        ));
        $isSeller = $statement->fetchAll(PDO::FETCH_ASSOC);
      
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

   return $isSeller;
}

}