<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
</head>

<body>

    <div class="container-fluid">
        <!-- <div class="d-flex" style="height:100px;"></div> -->
        <div class="row h-100 text-dark">
            <!-- Colonne pour les filtres -->
            <div class="card shadow-lg col-xl-4 col-sm border pt-5">
                <div class="col-xl-10 col-sm mx-auto">
                    <h1>Filtres <i class="fas fa-filter fa-fw"></i></h1>
                    <div class="d-flex" style="height: 20px;"></div>
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" id="search" placeholder="Rechercher un article" aria-label="SearchBar" aria-describedby="button-search" />
                        <button class="btn btn-outline-secondary" type="button" id="searchButton">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="d-flex" style="height: 20px;"></div>
                    <p class='h4'>Catégories</p>
                    <hr class="w-100" />

                    <div class="btn-group dropdown w-100">
                        <select class="form-select" name="type" required>
                            <option value="All">Toutes les catégories</option>
                            <option value="Digital">Digital</option>
                            <option value="Immobilier">Immobilier</option>
                            <option value="Mode">Mode</option>
                        </select>
                    </div>
                    <!-- Prix -->
                    <div class="d-flex" style="height: 60px;"></div>
                    <p class='h4'>Prix</p>
                    <hr class="w-100" />
                    <div class="d-flex" style="height: 20px;"></div>
                    <div class="d-flex justify-content-center">
                        <div class="input-group mb-3 me-2">
                            <input type="text" class="form-control" placeholder="Prix min" id="minPrice" aria-label="Prix min" aria-describedby="button-addon2" oninput="this.value = this.value.replace(/[^0-9]/g, ''); filterProducts();">
                            <span class="input-group-text" id="button-addon2">€</span>
                        </div>
                        <div class="input-group mb-3 ms-2">
                            <input type="text" class="form-control" placeholder="Prix max" id="maxPrice" aria-label="Prix max" aria-describedby="button-addon2" oninput="this.value = this.value.replace(/[^0-9]/g, ''); filterProducts();">
                            <span class="input-group-text" id="button-addon2">€</span>
                        </div>
                    </div>
                    <!-- Note -->
                    <div class="d-flex" style="height: 60px;"></div>
                    <p class='h4'>Note</p>
                    <hr class="w-100" />
                    <div class="d-flex" style="height: 20px;"></div>
                    <div class="d-flex justify-content-center">
                        <div class="input-group mb-3 me-2">
                            <input type="text" class="form-control" placeholder="Note min" id="minNote" aria-label="Note min" aria-describedby="button-addon2" oninput="this.value = this.value.replace(/[^0-9]/g, ''); filterProducts();">
                            <span class="input-group-text" id="button-addon2">/5</span>
                        </div>
                        <div class="input-group mb-3 ms-2">
                            <input type="text" class="form-control" placeholder="Note max" id="maxNote" aria-label="Note max" aria-describedby="button-addon2" oninput="this.value = this.value.replace(/[^0-9]/g, ''); filterProducts();">
                            <span class="input-group-text" id="button-addon2">/5</span>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Colonne pour les articles -->
            <div class="col-xl-8 col-sm text-center border pt-5">
                <div class="col-xl-10 mx-auto">
                    <h1>Articles</h1>
                    <div class="d-flex" style="height: 50px;"></div>
                    <div class="row d-flex flex-wrap" id="productsContainer">
                        <?php foreach ($products as $product) {
                            $product['price'] = str_replace('.', ',', $product['price']);
                        ?>
                            <div class="col-xl-4 mb-5 product-card" data-category="<?= $product['type'] ?>">
                                <div class='card shadow-lg col-xl-12 col-sm-6 border pt-5 mx-auto' style="height:450px;">
                                    <div style="height: 200px;">
                                        <img src='./Pictures/<?= $product['img_url'] ?>' class='img-fluid mx-auto h-75 d-inline-block'>
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title pb-1'><?= $product['name'] ?></h5>
                                        <p class='card-text h5 pb-4'>Prix <?= $product['price'] ?>€</p>
                                        <?php foreach ($ratings as $rating) {
                                            if ($rating['id_product'] == $product['id_product']) { ?>
                                                <p class='card-text h5 pb-4' data-note="<?= $rating['rating'] ?>">Note <?= number_format($rating['rating'], 2) ?>/5</p>
                                            <?php } else { ?>
                                                <p class='card-text h5 pb-4' data-note="0">Aucune note</p>
                                        <?php }
                                        } ?>

                                        <form action="/product" method="post">
                                            <input class="d-none" type="text" name="id_product" value="<?= $product['id_product'] ?>" />
                                            <button type="submit" class='btn btn-primary btn-lg'>Voir le produit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./Views/js/filters.js"></script>

</html>