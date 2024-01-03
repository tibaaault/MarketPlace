<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Vendeur</title>
</head>

<body>
    <div class="container">
        <div class="col-xl-10 mx-auto">
            <div class="d-flex" style="height: 100px;"></div>
            <?php
            foreach ($seller as $seller => $value) {
            ?>
                <div class="col-xl-12 card shadow-lg col-sm border">
                    <div class="row d-flex">
                        <div class="col-xl-6 col-sm border ps-5 py-5">
                            <p class='h2 text-center'>Fiche Vendeur</p>
                            <div class='d-flex' style='height: 20px;'></div>
                            <div class="mx-auto text-center">
                                <p class='lead'>Prénom : <?= $value['name'] ?></p>
                                <p class='lead'>Nom : <?= $value['firstname'] ?></p>
                                <p class='lead'>Email : <?= $value['email'] ?></p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm border ps-5 py-5">
                            <p class="h4 text-center">Nombre de produits en vente</p>
                            <div class='d-flex' style='height: 30px;'></div>
                            <p class="display-5 text-center"><?= $nbrProducts ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="d-flex" style="height: 100px;"></div>
        <div class="col-xl-12">
            <div class="row">
                <?php
                foreach ($productsSeller as $productSeller) {
                ?>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card shadow-lg col-sm border text-center">
                            <div class="mx-auto text-center p-3">
                                <img src='./Pictures/<?= $productSeller['img_url'] ?>' class='img-fluid' alt='<?= $productSeller['product_name'] ?>' style="height: 200px; width: auto;">
                            </div>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h4 text-center'><?= $productSeller['product_name'] ?></p>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h4 text-center'><?= $productSeller['price'] ?>€</p>
                            <form action="/product" method="post">
                                <input class="d-none" type="text" name="id_product" value="<?= $productSeller['product_id'] ?>" />
                                <button type="submit" class='btn btn-primary btn-lg'>Voir le produit</button>
                            </form>
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>