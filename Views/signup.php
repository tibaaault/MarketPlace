<?php

function isLoggedIn() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    return isset($_SESSION['id']);
}

if (isLoggedIn()) {
    // session_destroy();
    header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        .additional-fields {
            display: none;
        }
        .form-check-input[type=radio]:checked:after {
            left: 10px;
        }
        .highlighted {
            border: 1px solid red;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1>Inscription</h1>
    <form id="registrationForm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstName">Prénom</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Nom</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Rôle</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="roleBuyer" value="buyer" checked>
                <label class="form-check-label" for="roleBuyer">Acheteur</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="roleSeller" value="seller">
                <label class="form-check-label" for="roleSeller">Vendeur</label>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group additional-fields">
            <label for="facAddress">Adresse de facturation</label>
            <input type="text" class="form-control" id="facAddress" name="facAddress">
        </div>
        <div class="form-group additional-fields">
            <label for="businessName">Nom de l'entreprise</label>
            <input type="text" class="form-control" id="businessName" name="businessName">
        </div>
        <div class="form-group additional-fields">
            <label for="siret">SIRET</label>
            <input type="text" class="form-control" id="siret" name="siret">
        </div>
        <div><a href="/signin">Déjà inscrit ?</a></div><br>
        <p id="errMsg"></p>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let roleInputs = document.querySelectorAll('input[name="role"]');
        let additionalFields = document.querySelectorAll('.additional-fields');

        roleInputs.forEach((roleInput) => {
            roleInput.addEventListener("change", () => {
                additionalFields.forEach((field) => {
                    if (roleInput.value === "seller") {
                        field.style.display = 'block';
                    } else {
                        field.style.display = 'none';
                    }
                });
            });
        });

        document.getElementById('registrationForm').addEventListener("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            let role = formData.get('role');
            
            let requiredFields = [];
            if (role === "buyer") {
                requiredFields = ['firstName', 'lastName', 'email', 'password', 'role'];
            } else if (role === "seller") {
                requiredFields = ['firstName', 'lastName', 'email', 'password', 'role', 'address', 'facAddress', 'businessName', 'siret'];
            } else {
                console.log('Rôle non valide.');
                return;
            }

            resetFieldHighlight();

            for (let field of requiredFields) {
                if (!formData.get(field)) {
                    highlightField(field);
                }
            }

            if (document.querySelectorAll('.highlighted').length > 0) return;

            let fetchOptions = {
                method: 'POST',
                body: formData,
            };

            fetch("/signup", fetchOptions)
                .then(response => response.json())
                .then(data => {
                    console.log('Réponse du serveur :', data);
                    if (data.success) {
                        window.location = "/signin";
                    } else {
                        let errMsg = document.querySelector("#errMsg");
                        errMsg.innerText = data.message;
                        setTimeout(() => errMsg.innerText = "", 3000);
                    }
                })
                .catch(error => console.error('Erreur lors de l\'envoi de la requête :', error));
        });

        const highlightField = (fieldName) => {
            let field = document.querySelector('[name="' + fieldName + '"]');
            if (field) {
                field.classList.add('highlighted');
            }
        }

        const resetFieldHighlight = () => {
            let highlightedFields = document.querySelectorAll('.highlighted');
            highlightedFields.forEach((field) => {
                field.classList.remove('highlighted');
            });
        }

    });
</script>
</body>
</html>
