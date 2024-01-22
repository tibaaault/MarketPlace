<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        document.getElementById('registrationForm').addEventListener("submit", function (e) {
            e.preventDefault();
            // Ajoutez ici la logique pour traiter le formulaire
            console.log(new FormData(this));
        });
    });
</script>
</body>
</html>
