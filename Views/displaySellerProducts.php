<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Vendeur</title>
</head>

<body>
    <div class="container">
        <div class="d-flex" style="height: 100px;"></div>
        <div class="col-xl-12">
            <div class="row">
                <?php
                foreach ($products as $product) {
                ?>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card shadow-lg col-sm border text-center">
                            <div class="mx-auto text-center p-3">
                                <img src='./Pictures/<?= $product['img_url'] ?>' class='img-fluid' alt='<?= $product['product_name'] ?>' style="height: 200px; width: auto;">
                            </div>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h4 text-center'><?= $product['product_name'] ?></p>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h4 text-center'><?= $product['price'] ?>€</p>
                            <form action="/product" method="post">
                                <input class="d-none" type="text" name="id_product" value="<?= $product['product_id'] ?>" />
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