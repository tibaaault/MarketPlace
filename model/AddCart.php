<?php
class AddCart {
    private $db;
    private $isRun;
    public function __construct($db) {
        $this->db = $db;
    }

    public function addToCart($productId) {
        // Récupérer les informations du produit depuis la base de données
        $query = "SELECT * FROM product WHERE id_product = :productId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();


    
            // Assurez-vous que la clé 'cart' existe dans la session
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // Ajouter le produit au panier
            $productToAdd = array(
                'id' => $productDetails['id_product'],
                'name' => $productDetails['name'],
                'type' => $productDetails['type'],
                'price' => $productDetails['price'],
                'quantity' => 1, // Vous pouvez ajuster la quantité selon vos besoins
            );

            $_SESSION['cart'][] = $productToAdd;

            return true; // Indique que l'ajout au panier a réussi
        }
    
} 

// Exemple d'utilisation
// Supposons que $db est votre objet de connexion à la base de données (PDO)
//$addCart = new AddCart($db);

// Supposons que $productId est l'ID du produit que vous souhaitez ajouter au panier
//$productId = 1;

// Appel de la méthode addToCart pour ajouter le produit au panier
//$result = $addCart->addToCart($productId);

if ($result) {
    echo 'Produit ajouté au panier avec succès!';
} else {
    echo 'Erreur lors de l\'ajout au panier. Le produit n\'existe peut-être pas.';
}