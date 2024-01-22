<?php

require_once 'PaiementModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $model = new PaiementModel();

    $paymentMethod = $_POST['payment_method'];
    if ($paymentMethod === 'credit_card') {
        $token = $_POST['stripeToken'];
    } else {
        $token = null;
    }

    $model->processPayment($paymentMethod, $token);
}

// Redirigez vers la vue de paiement après le traitement
header("Location: paiement_view.php");
exit();


