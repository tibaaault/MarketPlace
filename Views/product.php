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
                                            <div class='d-flex' style='height: 20px;'></div>
                                            <?php if (!isset($_SESSION['id']) && (!isset($_SESSION['isSeller']))) { ?>
                                                <a href="/signin">
                                                    <input class="d-none" type="text" name="id_seller" value="<?= $value['seller_id'] ?>" />
                                                    <input class="d-none" type="text" name="id_product" value="<?= $id_product ?>" />
                                                    <button type="submit" class='btn btn-primary btn-lg'>Envoyer un message au vendeur</button>
                                                </a>
                                            <?php } elseif ($_SESSION['isSeller'] == 0) { ?>
                                                <form action="/goMP" method="post">
                                                    <input class="d-none" type="text" name="id_seller" value="<?= $value['seller_id'] ?>" />
                                                    <input class="d-none" type="text" name="id_product" value="<?= $id_product ?>" />
                                                    <button type="submit" class='btn btn-primary btn-lg'>Envoyer un message au vendeur</button>
                                                </form>
                                            <?php } ?>

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
                            <?php
                            foreach ($ratings as $rating) {
                                if ($rating['id_product'] == $id_product) {
                                    $productRating = $rating['rating'];
                                    break;
                                }
                            } ?>

                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h3 text-dark'>Notation</p>
                            <div class='d-flex' style='height: 20px;'></div>
                            <?php if (isset($productRating)) { ?>
                                <p class='card-text h5 pb-4' data-note="<?= $productRating ?>">Note <?= number_format($productRating, 2) ?>/5</p>
                            <?php } else { ?>
                                <p class='card-text h5 pb-4' data-note="0">Aucune note</p>
                            <?php } ?>
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                        <hr>
                        <hr>
                        <div class='col-xl-11 col-sm mx-auto'>
                            <div class='d-flex' style='height: 20px;'></div>
                            <p class='h3 text-dark'>Commentaire</p>
                        </div>
                        <div class='d-flex' style='height: 20px;'></div>
                        <?php foreach ($comments as $comment) {
                            if (empty($comment['comment'])) {
                                continue;
                            }
                        ?>
                            <div class="col-xl-8 mx-auto pb-1">
                                <div class="card shadow-lg p-2">
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="col-xl-4 col-sm ">
                                            <p class="card-title h5">Prénom : <?= $comment['name'] ?></p>
                                            <p class="card-title h5">Note : <?= $comment['rating'] ?></p>
                                        </div>
                                        <div class="col-xl-8 col-sm">
                                            <p class='card-body h5 pb-4 border'><?= $comment['comment'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <div class='d-flex' style='height: 50px;'></div>
                        <?php if (isset($_SESSION['id'])) { ?>
                            <!-- <form action="/addComment" method="post">
                                <div class="col-xl-11 col-sm mx-auto">
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <p class='h3 text-dark'>Ajouter un commentaire</p>
                                        </div>
                                        <div class="col-xl-7 col-sm">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm">
                                                    <select class="form-select" name="rating" aria-label="Default select example" required>
                                                        <option selected>Note</option>
                                                        <option value="1">1/5</option>
                                                        <option value="2">2/5</option>
                                                        <option value="3">3/5</option>
                                                        <option value="4">4/5</option>
                                                        <option value="5">5/5</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-8 col-sm">
                                                    <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3" placeholder="Votre commentaire" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='d-flex' style='height: 20px;'></div>
                                <div class="col-xl-11 col-sm mx-auto">
                                    <input class="d-none" type="text" name="id_product" value="<?= $id_product ?>" />
                                    <div class="col-xl-7 col-s mx-auto text-center">
                                        <button type="submit" class='btn btn-primary btn-lg'>Envoyer</button>
                                    </div>
                                </div>
                            </form> -->
                            <form action="/addComment" method="post">
                            <div class="col-xl-11 col-sm mx-auto">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <p class='h3 text-dark'>Ajouter un commentaire</p>
                                    </div>
                                    <div class="col-xl-7 col-sm">
                                        <div class="row">
                                            <div class="col-xl-4 col-sm">
                                                <div class="rating" style='height: 50px;'>
                                                    <input id="star5" name="rating" type="radio" value="5" class="radio-btn hide" />
                                                    <label for="star5">☆</label>
                                                    <input id="star4" name="rating" type="radio" value="4" class="radio-btn hide" />
                                                    <label for="star4">☆</label>
                                                    <input id="star3" name="rating" type="radio" value="3" class="radio-btn hide" />
                                                    <label for="star3">☆</label>
                                                    <input id="star2" name="rating" type="radio" value="2" class="radio-btn hide" />
                                                    <label for="star2">☆</label>
                                                    <input id="star1" name="rating" type="radio" value="1" class="radio-btn hide" />
                                                    <label for="star1">☆</label>
                                            <div class="clear"></div>
                                                    <style>
                                                    .rating {
                                                    unicode-bidi: bidi-override;
                                                    direction: rtl;
                                                    }

                                                    .rating > label {
                                                    display: inline-block;
                                                    position: relative;
                                                    width: 0.8em;
                                                    font-size: 2rem; /* Taille des étoiles */
                                                    color: #C5C5C5; /* Couleur par défaut des étoiles */
                                                    cursor: pointer;
                                                    }

                                                    .rating > label:hover,
                                                    .rating > label:hover ~ label,
                                                    .rating > input.radio-btn:checked ~ label {
                                                    color: #FFC107; /* Couleur des étoiles sélectionnées */
                                                    }

                                                    .radio-btn {
                                                    display: none;
                                                    }

                                                    .clear {
                                                    clear: both;
                                                    }
                                                    </style>
                                            </div>
                                            </div>
                                            <div class="col-xl-8 col-sm">
                                                <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3" placeholder="Votre commentaire" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='d-flex' style='height: 20px;'></div>
                            <div class="col-xl-11 col-sm mx-auto">
                                <input class="d-none" type="text" name="id_product" value="<?= $id_product ?>" />
                                <div class="col-xl-7 col-s mx-auto text-center">
                                    <button type="submit" class='btn btn-primary btn-lg'>Envoyer</button>
                                </div>
                            </div>
                        </form>
                            <div class='d-flex' style='height: 50px;'></div>
                        <?php } ?>
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