document.addEventListener("DOMContentLoaded", function () {
    var select = document.querySelector('select[name="type"]');
    var searchInput = document.getElementById('search');
    var minPriceInput = document.getElementById('minPrice');
    var maxPriceInput = document.getElementById('maxPrice');
    var minNoteInput = document.getElementById('minNote');
    var maxNoteInput = document.getElementById('maxNote');

    select.addEventListener("change", filterProducts);
    searchInput.addEventListener("input", filterProducts);
    minPriceInput.addEventListener("input", filterProducts);
    maxPriceInput.addEventListener("input", filterProducts);
    minNoteInput.addEventListener("input", filterProducts);
    maxNoteInput.addEventListener("input", filterProducts);

    function filterProducts() {
        var selectedCategory = select.value;
        var searchText = searchInput.value.toLowerCase();
        var minPrice = parseFloat(minPriceInput.value) || 0;
        var maxPrice = parseFloat(maxPriceInput.value) || Number.MAX_SAFE_INTEGER;
        var minNote = parseFloat(minNoteInput.value) || 0;
        var maxNote = parseFloat(maxNoteInput.value) || 5; // Assuming the maximum rating is 5

        var productCards = document.querySelectorAll("#productsContainer .product-card");

        productCards.forEach(function (card) {
            var cardCategory = card.getAttribute("data-category");
            var cardProductName = card.querySelector('.card-title').textContent.toLowerCase();
            var cardPrice = parseFloat(card.querySelector('.card-text').textContent.split(' ')[1].replace(',', '.')) || 0;
            var cardNote = parseFloat(card.querySelector('.card-text[data-note]').getAttribute('data-note')) || 0;

            if ((selectedCategory === "All" || selectedCategory === cardCategory) &&
                (cardProductName.includes(searchText) || searchText === "") &&
                (cardPrice >= minPrice && cardPrice <= maxPrice) &&
                (cardNote >= minNote && cardNote <= maxNote)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }
});
