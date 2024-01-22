<?php

include_once 'Models/product.php';

function sendMessage($id_seller, $id_buyer, $message, $id_product)
{
    $db = Connexion();

    try {
        $message = addslashes($message);
        $statement = $db->prepare("INSERT INTO message (message, date_send, message_from, message_to, id_product) VALUES (:message, NOW(), :id_buyer, :id_seller, :id_product)");
        $statement->execute(array(
            'message' => $message,
            'id_buyer' => $id_buyer,
            'id_seller' => $id_seller,
            'id_product' => $id_product
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getMessage($id_seller, $id_buyer, $id_product)
{
    $db = Connexion();
    try {
        $statement = $db->prepare("SELECT * FROM message WHERE (message_to = :id_seller AND message_from = :id_buyer OR message_to = :id_buyer AND message_from = :id_seller ) AND id_product = :id_product");
        $statement->execute(array(
            'id_seller' => $id_seller,
            'id_buyer' => $id_buyer,
            'id_product' => $id_product
        ));
        $message = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $message;
}

function getConversation($id_buyer)
{
    $db = Connexion();
    try {
        $statement = $db->prepare("SELECT * FROM message INNER JOIN product ON message.id_product = product.id_product WHERE message_from = :id_buyer");
        $statement->execute(array(
            'id_buyer' => $id_buyer
        ));
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $messages;
}