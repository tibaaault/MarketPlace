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
    <title>Connexion</title>
    <style>
        .highlighted {
            border: 1px solid red;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <form id="registrationForm">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div><a href="/signup">Pas encore inscrit ?</a></div><br>
        <p id="errMsg"></p>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        document.getElementById('registrationForm').addEventListener("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            
            let requiredFields = ['email', 'password'];

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

            fetch("/signin", fetchOptions)
                .then(response => response.json())
                .then(data => {
                    console.log('Réponse du serveur :', data);
                    if (data.success) {
                        window.location = "/";
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
