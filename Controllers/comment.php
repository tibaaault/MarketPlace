<?php
include_once 'Models/comment.php';

class Comment
{

    private $commentModel;

    public function __construct() {
        $this->commentModel = new CommentModel();
    }
    
    public function addComment(){
        include_once 'Models/comment.php';

        if (isset($_POST['id_product'])) {
                $id_product = $_POST['id_product'];
                $comment = $_POST['comment'];
                $id_user = $_SESSION['id'];
                $rating = $_POST['rating'];
                $this->commentModel->addCommentBDD($rating, $comment, $id_user, $id_product);
                header('Location: /');

            } else {
                echo "Erreur";
            }
        }

    }

