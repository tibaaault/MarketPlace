<?php

include_once 'Models/product.php';

function sendMessageBuyer($id_seller, $id_buyer, $message, $id_product)
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

function sendMessageSeller($id_seller, $id_buyer, $message, $id_product)
{
    $db = Connexion();

    try {
        $message = addslashes($message);
        $statement = $db->prepare("INSERT INTO message (message, date_send, message_from, message_to, id_product) VALUES (:message, NOW(), :id_seller, :id_buyer, :id_product)");
        $statement->execute(array(
            'message' => $message,
            'id_seller' => $id_seller,
            'id_buyer' => $id_buyer,
            'id_product' => $id_product
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
function getMessageBuyer($id_seller, $id_buyer, $id_product)
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

function getMessageSeller( $id_seller, $id_product )
{
    $db = Connexion();
    try {
        $statementBuyer = $db->prepare("SELECT * FROM message WHERE message_to = :id_seller AND id_product = :id_product");
        $statementBuyer->execute(array(
            'id_seller' => $id_seller,
            'id_product' => $id_product
        ));
        $message = $statementBuyer->fetchAll(PDO::FETCH_ASSOC);
        $id_buyer = $message[0]['message_from'];
        $statement = $db->prepare("SELECT * FROM message WHERE (message_to = :id_seller AND message_from = :id_buyer OR message_to = :id_buyer AND message_from = :id_seller ) AND id_product = :id_product");
        $statement->execute(array(
            'id_seller' => $id_seller,
            'id_buyer' => $id_buyer,
            'id_product' => $id_product
        ));
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $messages;
}


function getConversationBuyer($id_buyer)
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

function getConversationSeller($id_seller)
{
    $db = Connexion();
    try {
        $statement = $db->prepare("SELECT * FROM message INNER JOIN product ON message.id_product = product.id_product WHERE message_to = :id_seller");
        $statement->execute(array(
            'id_seller' => $id_seller
        ));
        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $messages;
}
