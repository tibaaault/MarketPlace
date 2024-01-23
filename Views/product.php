<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Produit</title>
</head>

<body>
    <div class="container">
        <div class="col-xl-11 mx-auto">
            <div class="d-flex" style="height: 100px;"></div>
            <?php
            foreach ($product as $product => $value) {
                $id_product = $value['product_id'];
            ?>
                <div class="col-xl-12">
                    <div class='card shadow-lg col-sm border pt-5'>
                        <div class='col-xl-11 col-sm mx-auto'>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class='d-flex' style='height: 20px;'></div>
                                    <div class="mx-auto text-center">
                                        <img src='./Pictures/<?= $value['img_url'] ?>' class='img-fluid' style="height: 300px; width: auto;">
                                    </div>
                                </div>
                                <div class="col-xl-4 border border-2 rounded-9 border-dark p-4">
                                    <p class='h2 text-center'>Vendeur</p>
                                    <div class='d-flex' style='height: 20px;'></div>
                                    <div class="col-xl-9 col-sm mx-auto">
                                        <p class='lead'><b>Prénom : </b><?= $value['seller_name'] ?></p>
                                        <p class='lead'><b>Nom : </b><?= $value['seller_firstname'] ?></p>
                                        <p class='lead'><b>Email :</b> <?= $value['seller_email'] ?></p>
                                        <div class='d-flex' style='height: 20px;'></div>
                                        <div class="col-xl-12 col-sm mx-auto text-center">
                                            <form action="/seller" method="post">
                                                <input class="d-none" type="text" name="id_seller" value="<?= $value['seller_id'] ?>" />
                                                <button type="submit" class='btn btn-primary btn-lg'>Afficher la page du vendeur</button>
                                            </form>
                                            <form action="/goMP" method="post">
                                                <input class="d-none" type="text" name="id_seller" value="<?= $value['seller_id'] ?>" />
                                                <input class="d-none" type="text" name="id_product" value="<?= $id_product ?>" />
                                                <button type="submit" class='btn btn-primary btn-lg'>Envoyer un message au vendeur</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='d-flex' style='height: 20px;'></div>
                            <div class="col-xl-8 col-sm">
                                <h1 class="card-title pb-1"><?= $value['product_name'] ?></h1>
                            </div>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='lead' style="font-size: 28px;">Prix de l'article <b><?= $value['price'] ?>€</b></p>
                            <div class='d-flex' style='height: 20px;'></div>
                            <hr>
                            <div class='d-flex' style='height: 20px;'></div>
                            <hr>
                            <p class='h3 text-dark'>Description</p>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='lead ps-3' style="font-size:20px;"><?= nl2br($value['description']) ?></p>
                            <div class='d-flex' style='height: 20px;'></div>
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                        <hr>
                        <hr>
                        <div class='col-xl-11 col-sm mx-auto'>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h3 text-dark'>Notation</p>
                            <div class='d-flex' style='height: 20px;'></div>
                            <?php foreach ($ratings as $rating) {
                                if ($rating['id_product'] == $id_product) { ?>
                                    <p class='card-text h5 pb-4' data-note="<?= $rating['rating'] ?>">Note <?= number_format($rating['rating'], 2) ?>/5</p>
                                <?php } else { ?>
                                    <p class='card-text h5 pb-4' data-note="0">Aucune note</p>
                            <?php }
                            } ?>
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                        <hr>
                        <hr>
                        <div class='col-xl-11 col-sm mx-auto'>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h3 text-dark'>Commentaire</p>
                            <div class='d-flex' style='height: 20px;'></div>

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
                if ($id_product == $value['product_id']) {
                    continue;
                }
                $value['price'] = str_replace('.', ',', $value['price']);
            ?>
                <div class="col-xl-3 mb-5">
                    <div class='card shadow-lg col-xl-12 col-sm border mx-auto' style="height:350px;">
                        <img src='./Pictures/<?= $value['img_url'] ?>' class='img-fluid mx-auto d-inline-block pt-3' style="height: 150px; width: auto;">
                        <div class='card-body text-center'>
                            <h5 class='card-title pb-1'><?= $value['product_name'] ?></h5>
                            <p class='card-text h5 pb-4'>Prix <?= $value['price'] ?>€</p>
                            <form action="/product" method="post">
                                <input class="d-none" type="text" name="id_product" value="<?= $value['product_id'] ?>" />
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