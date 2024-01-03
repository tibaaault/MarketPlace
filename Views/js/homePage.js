// Initialization for ES Users
import { Dropdown, Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Dropdown, Ripple });

document.getElementById('searchForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Empêcher la soumission normale du formulaire
    var searchTerm = document.querySelector('[name="searchInput"]').value;

    // Effectuer une requête AJAX vers le serveur pour récupérer les résultats
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Mettre à jour la liste des produits avec les résultats de recherche
            var productsContainer = document.getElementById('productsContainer');
            productsContainer.innerHTML = xhr.responseText;
        }
    };

    xhr.open("POST", "/search", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("searchInput=" + encodeURIComponent(searchTerm));
});