<?php

class Message
{
    public function goMessage(){
        include_once 'Models/product.php';
        include_once 'Models/message.php';
        if (isset($_POST['id_product']) && isset($_POST['id_seller'])) {
        $id_product = $_POST['id_product'];
        $id_seller = $_POST['id_seller'];
        $id_buyer = 2;
        $product = OneProductByID($id_product);
        $messages = getMessage($id_seller, $id_buyer, $id_product);

        include 'Views/header.php';
        include 'Views/sendMessage.php';
        } else {
            echo "Erreur";
        }
}
    public function sendMessage()
    {
        include_once 'Models/message.php';

        if (isset($_POST["sendMessage"])) {
            $id_product = $_POST["id_product"];
            $id_seller = $_POST['id_seller'];
            $id_buyer = 2;
            $message = $_POST['message'];

            sendMessage($id_seller, $id_buyer, $message, $id_product);
            header('Location: /');
        } else {
            echo "Erreur";
        }
    }

    public function displayConversation(){
        include_once 'Models/message.php';
        $id_buyer = 2;
        $conversations = getConversation($id_buyer);
        include 'Views/header.php';
        include 'Views/displayConversation.php';
    }
}
