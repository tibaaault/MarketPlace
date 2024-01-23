<?php

class AdminModel
{
    private $db;

    public function __construct() {
        $this->db = $this->connexion();
    }

    public function getUser() {
        $stmt = $this->db->prepare("SELECT * FROM user");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct() {
        $query = "SELECT product.*, user.email AS seller_email
                FROM product
                INNER JOIN user ON user.id = product.id_seller";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReview() {
        $query = "SELECT review.*, product.name AS product_name, user.email AS user_email
                  FROM review
                  INNER JOIN product ON product.id_product = review.id_product
                  INNER JOIN user ON user.id = review.id_user";
    
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getPurchase() {
        $query = "SELECT purchase.*, product.name AS product_name, purchase_detail.id_product, purchase_detail.quantity, purchase_detail.price, user.email AS user_email
                  FROM purchase
                  INNER JOIN purchase_detail ON purchase.id_purchase = purchase_detail.id_purchase
                  INNER JOIN product ON product.id_product = purchase_detail.id_product
                  INNER JOIN user ON user.id = purchase.id_user";
    
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    // 

    public function setUser($values) {
        $action = $values[0];
    
        if ($action === 'update') {
            $query = "UPDATE user SET 
                email = ?,
                password = ?,
                name = ?, 
                firstname = ?, 
                role = ?, 
                address = ?, 
                fac_address = ?, 
                business_name = ?, 
                siret = ?
                WHERE id = ?";
    
            $stmt = $this->db->prepare($query);
    
            $stmt->bindParam(1, $values[2]); // email
            $stmt->bindParam(2, $values[3]); // password
            $stmt->bindParam(3, $values[4]); // name
            $stmt->bindParam(4, $values[5]); // firstname
            $stmt->bindParam(5, $values[6]); // role
            $stmt->bindParam(6, $values[7]); // address
            $stmt->bindParam(7, $values[8]); // fac_address
            $stmt->bindParam(8, $values[9]); // business_name
            $stmt->bindParam(9, $values[10]); // siret
            $stmt->bindParam(10, $values[1]); // id
    
            $stmt->execute();
        } elseif ($action === 'delete') {
            $query = "DELETE FROM user WHERE id = ?";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $values[1]); // id
    
            $stmt->execute();
        } else {
            throw new Exception('Action non reconnue.');
        }
    }
    
    

    public function setProduct($values) {
        $action = $values[0];
    
        if ($action === 'update') {
            $query = "UPDATE product SET 
                name = ?,
                price = ?,
                type = ?, 
                img_url = ?, 
                description = ?
                WHERE id_product = ?";
    
            $stmt = $this->db->prepare($query);
    
            $stmt->bindParam(1, $values[2]); // name
            $stmt->bindParam(2, $values[3]); // price
            $stmt->bindParam(3, $values[4]); // type
            $stmt->bindParam(4, $values[5]); // img_url
            $stmt->bindParam(5, $values[6]); // description
            $stmt->bindParam(6, $values[1]); // id_product
    
            $stmt->execute();
        } elseif ($action === 'delete') {
            $query = "DELETE FROM product WHERE id_product = ?";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $values[1]); // id_product
    
            $stmt->execute();
        } else {
            throw new Exception('Action non reconnue.');
        }
    }
    

    public function setReview($values) {
        $action = $values[0];
    
        if ($action === 'update') {
            $query = "UPDATE review SET 
                rating = ?,
                comment = ?,
                date_review = ?,
                id_user = ?,
                id_product = ?
                WHERE id_review = ?";
    
            $stmt = $this->db->prepare($query);
    
            $stmt->bindParam(1, $values[2]); // rating
            $stmt->bindParam(2, $values[3]); // comment
            $stmt->bindParam(3, $values[4]); // date_review
            $stmt->bindParam(4, $values[5]); // id_user
            $stmt->bindParam(5, $values[6]); // id_product
            $stmt->bindParam(6, $values[1]); // id_review
    
            $stmt->execute();
        } elseif ($action === 'delete') {
            $query = "DELETE FROM review WHERE id_review = ?";
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $values[1]); // id_review
    
            $stmt->execute();
        } else {
            throw new Exception('Action non reconnue.');
        }
    }


    private function connexion()
    {
        try {
            // $db = new PDO("mysql:host=localhost:3306;dbname=marketPlace", "root", "root123");
            $db = new PDO("mysql:host=localhost:8889;dbname=marketPlace", "root", "root");
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}