<?php


function addCommentBDD($rating, $comment, $id_user, $id_product)
{
    $db = Connexion();

    try {
        $comment = addslashes($comment);
        $statement = $db->prepare("INSERT INTO review (rating, comment, date_review, id_user, id_product) VALUES (:rating, :comment, NOW(), :id_user, :id_product)");
        $statement->execute(array(
            'rating' => $rating,
            'comment' => $comment,
            'id_user' => $id_user,
            'id_product' => $id_product
        ));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function CommentProduct($id_product)
{
    $db = Connexion();
    try {
        $statement = $db->prepare("SELECT comment, rating, user.name FROM review INNER JOIN user ON review.id_user = user.id WHERE id_product = :id_product LIMIT 5");
        $statement->execute(array(
            'id_product' => $id_product
        ));
        $comment = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    return $comment;
}

