<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Résultats de la requête</title>
    <style>
        .resultRow {
            margin-bottom: 5rem !important;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <div class="row mt-3">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/user">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/product">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/review">Avis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/purchase">Achats</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" id="searchInput" placeholder="Rechercher...">
        </div>
    </div>

    <div id="resultats" class="mt-3">
        <?php
        foreach ($data as $ligne) {
            echo "<div class='row mb-2 resultRow'>";
            foreach ($ligne as $colonne => $valeur) {
                echo "<div class='col-md-4'>";
                echo "<label for='" . htmlspecialchars($colonne) . "'>" . htmlspecialchars($colonne) . "</label>";
                echo "<input type='text' class='form-control' id='" . htmlspecialchars($colonne) . "' value='" . ($valeur !== null ? htmlspecialchars($valeur) : '') . "'>";
                echo "</div>";
            }
            if (!$read) {
                echo "<div class='col-md-2'>";
                echo "<button type='button' class='btn btn-primary btn-modifier' onclick='modifierEnregistrement(this)'>Modifier</button>";
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo "<button type='button' class='btn btn-danger btn-supprimer' onclick='supprimerEnregistrement(this)'>Supprimer</button>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div>
</div>


<script>

function modifierEnregistrement(button) {
    var row = button.closest('.row');
    var inputs = row.querySelectorAll('input');
    var values = ['update', ...Array.from(inputs).map(input => input.value)];

    // Utilisez AJAX pour envoyer les données au serveur
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
        }
    };
    var data = 'values=' + encodeURIComponent(JSON.stringify(values));
    xhr.send(data);
}

function supprimerEnregistrement(button) {
    var row = button.closest('.row');
    var inputs = row.querySelectorAll('input');
    var values = ['delete', ...Array.from(inputs).map(input => input.value)];

    // Utilisez AJAX pour envoyer les données au serveur
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
        }
    };
    var data = 'values=' + encodeURIComponent(JSON.stringify(values));
    xhr.send(data);
}


</script>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();

        var resultRows = document.querySelectorAll('.resultRow');

        resultRows.forEach(function(row) {
            var inputs = row.querySelectorAll('input');

            var found = Array.from(inputs).some(function(input) {
                return input.value.toLowerCase().includes(searchValue);
            });

            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
