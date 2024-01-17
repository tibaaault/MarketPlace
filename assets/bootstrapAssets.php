<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Liens des assets -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css">

<script>
document.addEventListener("DOMContentLoaded", function () {
    var select = document.querySelector('select[name="type"]');
    var searchInput = document.getElementById('search');
    var minPriceInput = document.getElementById('minPrice');
    var maxPriceInput = document.getElementById('maxPrice');

    select.addEventListener("change", filterProducts);
    searchInput.addEventListener("input", filterProducts);
    minPriceInput.addEventListener("input", filterProducts);
    maxPriceInput.addEventListener("input", filterProducts);

    function filterProducts() {
        var selectedCategory = select.value;
        var searchText = searchInput.value.toLowerCase();
        var minPrice = parseFloat(minPriceInput.value) || 0;
        var maxPrice = parseFloat(maxPriceInput.value) || Number.MAX_SAFE_INTEGER;
        var productCards = document.querySelectorAll("#productsContainer .product-card");

        productCards.forEach(function (card) {
            var cardCategory = card.getAttribute("data-category");
            var cardProductName = card.querySelector('.card-title').textContent.toLowerCase();
            var cardPrice = parseFloat(card.querySelector('.card-text').textContent.split(' ')[1].replace(',', '.')) || 0;

            if ((selectedCategory === "All" || selectedCategory === cardCategory) &&
                (cardProductName.includes(searchText) || searchText === "") &&
                (cardPrice >= minPrice && cardPrice <= maxPrice)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }
});

</script>
