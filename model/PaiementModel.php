<?php


class PaiementModel {
    private $secretKey;
           
   
    public function __construct($secretKey) {
        $this->secretKey = $secretKey;
        Stripe::setApiKey($secretKey);
    }

    public function processCreditCardPayment($token, $amount, $currency = 'eur') {
        try {
            // Créez un paiement avec l'API Stripe
            $paymentIntent = PaymentIntent::create([
                'payment_method' => $token,
                'amount' => $amount,
                'currency' => $currency,
                'confirmation_method' => 'automatic',
                'confirm' => true,
            ]);

            // Traitez le paiement ou enregistrez les informations dans votre base de données
            // Vous pouvez accéder aux informations du paiement via $paymentIntent

            return true; // Le paiement a réussi
        } catch (\Stripe\Exception\CardException $e) {
            // Gérez les erreurs de carte
            return false;
        } catch (\Stripe\Exception\StripeException $e) {
            // Gérez les autres erreurs Stripe
            return false;
        }
    }
// Utilisation :
// $paiementModel = new PaiementModel('votre_clé_secrète_stripe');
// $paiementModel->processCreditCardPayment($token, $amount);
    }

   

?>
