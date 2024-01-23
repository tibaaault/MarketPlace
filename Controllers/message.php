<?php

class Message
{
    public function goMessage()
    {
        include_once 'Models/product.php';
        include_once 'Models/message.php';
        if (isset($_POST['id_product']) && isset($_POST['id_seller'])) {
            if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 0) {
                $id_product = $_POST['id_product'];
                $id_seller = $_POST['id_seller'];
                $id_buyer = $_SESSION['id'];
                $product = OneProductByID($id_product);
                $messages = getMessageBuyer($id_seller, $id_buyer, $id_product);

                include 'Views/header.php';
                include 'Views/sendMessage.php';
            } elseif (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
                $id_product = $_POST['id_product'];
                $id_seller = $_POST['id_seller'];
                $product = OneProductByID($id_product);
                $messages = getMessageSeller($id_seller, $id_product);

                include 'Views/header.php';
                include 'Views/sendMessage.php';
            } else {
                echo "Erreur";
            }
        }
    }
    public function sendMessage()
    {
        include_once 'Models/message.php';

        if (isset($_POST["sendMessage"])) {
            if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 0) {
                $id_product = $_POST["id_product"];
                $id_seller = $_POST['id_seller'];
                $id_buyer = $_SESSION['id'];
                $message = $_POST['message'];
                sendMessageBuyer($id_seller, $id_buyer, $message, $id_product);
                header('Location: /');
            } elseif (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
                $id_product = $_POST["id_product"];
                $id_seller = $_SESSION['id'];
                $id_buyer = $_POST['id_buyer'];
                $message = $_POST['message'];
                sendMessageSeller($id_seller, $id_buyer, $message, $id_product);
                header('Location: /');
            } else {
                echo "Erreur";
            }
        }
    }

    public function displayConversation()
    {
        include_once 'Models/message.php';

        if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 0) {
            $id_buyer = $_SESSION['id'];
            $conversations = getConversationBuyer($id_buyer);
            include 'Views/header.php';
            include 'Views/displayConversation.php';
        } elseif (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
            $id_seller = $_SESSION['id'];
            $conversations = getConversationSeller($id_seller);
            include 'Views/header.php';
            include 'Views/displayConversation.php';
        } else {
            echo 'Erreur';
        }
    }
}
