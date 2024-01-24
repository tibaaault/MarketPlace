<?php
include_once 'Models/message.php';
include_once 'Models/product.php';

class Message
{
    private $messageModel;
    private $productModel;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
        $this->productModel = new ProductModel();
    }

    public function goMessage()
    {

        if (isset($_POST['id_product']) && isset($_POST['id_seller'])) {
            if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 0) {
                $id_product = $_POST['id_product'];
                $id_seller = $_POST['id_seller'];
                $id_buyer = $_SESSION['id'];
                $product = $this->productModel->getOneProductByID($id_product);
                $messages = $this->messageModel->getMessageBuyer($id_seller, $id_buyer, $id_product);

                include 'Views/header.php';
                include 'Views/sendMessage.php';
            } elseif (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
                $id_product = $_POST['id_product'];
                $id_seller = $_POST['id_seller'];
                $product = $this->productModel->getOneProductByID($id_product);
                $messages = $this->messageModel->getMessageSeller($id_seller, $id_product);

                include 'Views/header.php';
                include 'Views/sendMessage.php';
            } else {
                echo "Erreur";
            }
        }
    }
    public function sendMessage()
    {
        if (isset($_POST["sendMessage"])) {
            if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 0) {
                $id_product = $_POST["id_product"];
                $id_seller = $_POST['id_seller'];
                $id_buyer = $_SESSION['id'];
                $message = $_POST['message'];
                $this->messageModel->sendMessageBuyer($id_seller, $id_buyer, $message, $id_product);
                header('Location: /');
            } elseif (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
                $id_product = $_POST["id_product"];
                $id_seller = $_SESSION['id'];
                $id_buyer = $_POST['id_buyer'];
                $message = $_POST['message'];
                $this->messageModel->sendMessageSeller($id_seller, $id_buyer, $message, $id_product);
                header('Location: /');
            } else {
                echo "Erreur";
            }
        }
    }

    public function displayConversation()
    {
        if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 0) {
            $id_buyer = $_SESSION['id'];
            $conversations = $this->messageModel->getConversationBuyer($id_buyer);
            include 'Views/header.php';
            include 'Views/displayConversation.php';
        } elseif (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
            $id_seller = $_SESSION['id'];
            $conversations = $this->messageModel->getConversationSeller($id_seller);
            include 'Views/header.php';
            include 'Views/displayConversation.php';
        } else {
            echo 'Erreur';
        }
    }
}
