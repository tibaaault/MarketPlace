<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .additional-fields {
            display: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
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
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var roleInputs = document.querySelectorAll('input[name="role"]');
        var additionalFields = document.querySelectorAll('.additional-fields');

        roleInputs.forEach(function (roleInput) {
            roleInput.addEventListener("change", function () {
		additionalFields.forEach(function (field) {
                    if (roleInput.value === 'seller') {
                        field.style.display = 'block';
                    } else {
                        field.style.display = 'none';
                    }
                });
            });
        });

        document.getElementById('registrationForm').addEventListener("submit", function (e) {
            e.preventDefault();
            // Ajoutez ici la logique pour traiter le formulaire
            console.log(new FormData(this));
        });
    });
</script>
</body>
</html>
