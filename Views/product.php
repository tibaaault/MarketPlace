<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Produit</title>
</head>

<body>
    <div class="container">
        <div class="col-xl-10 mx-auto">
            <div class="d-flex" style="height: 100px;"></div>
            <?php
            foreach ($product as $product => $value) {
            ?>
                <div class="col-xl-12">
                    <div class='card shadow-lg col-sm border pt-5'>
                        <div class='col-xl-10 col-sm mx-auto'>
                            <h1 class="card-title pb-1 text-center"><?= $value['product_name'] ?></h1>
                            <div class='d-flex' style='height: 20px;'></div>
                            <div class="mx-auto text-center">
                                <img src='./Pictures/<?= $value['img_url'] ?>.png' class='img-fluid' alt='<?= $value['name'] ?>' style="height: 300px; width: auto;">
                            </div>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h4'>Prix <?= $value['price'] ?>€</p>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h2 text-center'>Description de l'article</p>
                            <p class='p' style="font-size:20px;"><?= nl2br($value['description']) ?></p>
                            <div class='d-flex' style='height: 20px;'></div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-sm">
                                <p class='h2 text-center'>Vendeur</p>
                            </div>
                            <div class="col-xl-4 col-sm">
                                <p class='lead'>Prénom : <?= $value['seller_name'] ?></p>
                                <p class='lead'>Nom : <?= $value['seller_firstname'] ?></p>
                                <p class='lead'>Email : <?= $value['seller_email'] ?></p>
                            </div>
                            <div class="col-xl-4 col-sm">
                                <a href="" class="btn btn-primary btn-lg">Contacter le vendeur</a>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-lg py-4">Ajouter au panier</a>
                    </div>
                    <div class='d-flex' style='height: 50px;'></div>
                    <div class="col-xl-6 col-sm mx-auto text-center">
                        <a href="/" class="btn btn-primary btn-lg">Retour à l'accueil</a>
                    </div>
                    <div class='d-flex' style='height: 200px;'></div>
                </div>
        </div>
    <?php
            }
    ?>

    <div class="col-xl-12">
        <p class="h2">Autres articles du vendeur</p>
        <div class="row d-flex flex-wrap">
            <?php
            foreach ($productsSeller as $productsSeller => $value) {
            ?>
                <div class="col-xl-3 mb-5">
                    <div class='card shadow-lg col-xl-12 col-sm border mx-auto' style="height:350px;">
                        <img src='./Pictures/<?= $value['img_url'] ?>.png' class='img-fluid mx-auto d-inline-block pt-3' style="height: 150px; width: auto;">
                        <div class='card-body'>
                            <h5 class='card-title pb-1'><?= $value['name'] ?></h5>
                            <p class='card-text h5 pb-4'>Prix <?= $value['price'] ?>€</p>
                            <form action="/product" method="post">
                                <input class="d-none" type="text" name="id_product" value="<?= $value['id_product'] ?>" />
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