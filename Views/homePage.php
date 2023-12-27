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
                        <input type="text" class="form-control" placeholder="Rechercher un article" aria-label="SearchBar" aria-describedby="button-search" />
                        <button class="btn btn-outline-secondary" type="button" id="search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <div class="d-flex" style="height: 20px;"></div>
                    <p class='h4'>Catégories</p>
                    <hr class="w-100" />

                    <div class="btn-group dropdown w-100">
                        <button class="btn btn-secondary btn-lg dropdown-toggle" type="input" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choisir une catégorie
                        </button>
                        <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Digital</a>
                            <a class="dropdown-item" href="#">Immobilier</a>
                            <a class="dropdown-item" href="#">Mode</a>
                        </div>
                    </div>
                    <!-- Prix -->
                    <div class="d-flex" style="height: 60px;"></div>
                    <p class='h4'>Prix</p>
                    <hr class="w-100" />
                    <div class="d-flex" style="height: 20px;"></div>

                    <div class="d-flex justify-content-center">
                        <div class="input-group mb-3 me-2">
                            <input type="text" class="form-control" placeholder="Prix min" aria-label="Prix min" aria-describedby="button-addon2" oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                            <span class="input-group-text" id="button-addon2">€</span>
                        </div>
                        <div class="input-group mb-3 ms-2">
                            <input type="text" class="form-control" placeholder="Prix max" aria-label="Prix max" aria-describedby="button-addon2" oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                            <span class="input-group-text" id="button-addon2">€</span>
                        </div>
                    </div>




                </div>
            </div>

            <!-- Colonne pour les articles -->
            <div class="col-xl-8 col-sm text-center border pt-5">
                <div class="col-xl-10 mx-auto">
                    <h1>Articles</h1>
                    <div class="d-flex" style="height: 50px;"></div>
                    <div class="row d-flex flex-wrap">
                        <?php foreach ($products as $product) {
                        ?>
                            <div class="col-xl-4 mb-5">
                                <div class='card shadow-lg col-xl-12 col-sm-6 border pt-5 mx-auto' style="height:450px;">
                                    <div style="height: 200px;">
                                        <img src='./Pictures/<?= $product['img_url'] ?>.png' class='img-fluid mx-auto h-75 d-inline-block'>
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title pb-1'><?= $product['name'] ?></h5>
                                        <p class='card-text h5 pb-4'>Prix <?= $product['price'] ?>€</p>
                                        <form action="/product" method="post">
                                            <input class="d-none" type="text" name="id_product" value="<?= $product['id_product'] ?>" />
                                            <button type="submit"  class='btn btn-primary btn-lg'>Voir le produit</button>
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
<script src="./js/homePage.js"></script>

</html>