document.addEventListener("DOMContentLoaded", function () {
    var select = document.querySelector('select[name="type"]');
    console.log("Select element:", select);

    select.addEventListener("change", filterProducts);

    function filterProducts() {
        console.log("Change event triggered");
        var selectedCategory = select.value;
        var productCards = document.querySelectorAll("#productsContainer .product-card");

        productCards.forEach(function (card) {
            var cardCategory = card.getAttribute("data-category");

            console.log("Selected Category:", selectedCategory);
            console.log("Card Category:", cardCategory);

            if (selectedCategory === "All" || selectedCategory === cardCategory) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }
});
