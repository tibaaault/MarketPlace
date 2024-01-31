<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
}


$publishableKey = 'pk_test_51OalQpHZxzLfNhVMoT7wY6YoQRAL4g3QZKC1F7sAkFAqjTVYzzLD4TGbge49khAPwlBAazK1S5YE1tjqxK864Mq400MLZduVfZ';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Page de Paiement</title>
    <!-- Inclure Stripe.js pour le paiement par carte bancaire -->
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .espacepaiement {
            font-size: 20px;
            /* Taille du texte */
        }

        .hidden {
            display: none;
        }

        .submite {
            background-color: darkgreen;
        }
    </style>
</head>

<body>
    <form action="./model/PaiementModel.php" method="POST" id="payment-form">
        <div>
            <input type="radio" id="credit_card" name="payment_method" value="credit_card" checked>
            <label for="credit_card">Payer par carte bancaire</label>
        </div>
        <div>
            <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer">
            <label for="bank_transfer">Payer par virement bancaire</label>
        </div>

        <!-- Détails de la carte pour le paiement par CB -->
        <div id="card-details" class="espacepaiement">
            <label for="card-element">
                <h3>Carte de crédit ou de débit</h3>
            </label>
            <div id="card-element">
                <!-- Un élément Stripe sera inséré ici. -->
            </div>
            <button class="submite" type="submit"><h3>Soumettre le paiement</h3></button>
            <!-- Utilisé pour afficher les erreurs de formulaire -->
            <div id="card-errors" role="alert"></div>
        </div>

        <!-- Informations pour le virement bancaire -->
        <div id="bank-details" class="hidden">
            <p>Veuillez effectuer le virement sur le compte suivant :</p>
            <p>IBAN: FR76XXXXXXXXXXXXXXXXXXXXXX</p>
            <p>BIC: XXXXXXXX</p>
            <h4>Si vous optez pour ce moyen de paiement, veuillez effectuer le virement et attendre la confirmation par mail.</h4>
           <h3> Merci pour votre confiance à bientôt!</h3>
        </div>
    </form>

    <script>
        // Créez une instance de Stripe
        var stripe = Stripe('<?php echo $publishableKey; ?>');
        var elements = stripe.elements();

        // Personnalisez l'élément Stripe Card
        var style = {
            base: {
                fontSize: '16px',
                color: '#32325d',
            },
        };

        // Créez une instance de l'élément Carte
        var card = elements.create('card', { style: style });

        // Ajoutez une instance de l'élément Carte au div#card-element
        card.mount('#card-element');

        // Gérez la soumission du formulaire et créez le token
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Vérifiez quelle méthode de paiement a été choisie
            var paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            if (paymentMethod === 'credit_card') {
                stripe.createToken(card).then(function (result) {
                    if (result.error) {
                        // Informez l'utilisateur s'il y a une erreur
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        
                        stripeTokenHandler(result.token);
                    }
                });
            } else if (paymentMethod === 'bank_transfer') {
              
                // Pour cet exemple, nous allons simplement soumettre le formulaire.
                form.submit();
            }
        });

        function stripeTokenHandler(token) {
            // Insérez le token ID dans le formulaire pour qu'il soit soumis au serveur
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Soumettez le formulaire
            form.submit();
        }

        // Gérer l'affichage des options de paiement en fonction de la sélection de l'utilisateur
        document.getElementById('payment-form').addEventListener('change', function (event) {
            var cardDetails = document.getElementById('card-details');
            var bankDetails = document.getElementById('bank-details');
            if (event.target.value === 'credit_card') {
                cardDetails.style.display = 'block';
                bankDetails.style.display = 'none';
            } else if (event.target.value === 'bank_transfer') {
                cardDetails.style.display = 'none';
                bankDetails.style.display = 'block';
            }
        });
    </script>
</body>

</html>
