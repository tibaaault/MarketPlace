<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification produit</title>
</head>

<body>
    <div class="container">
        <div class="col-xl-11 mx-auto">
            <div class="d-flex" style="height: 100px;"></div>
            <form action="/modifyProductBDD" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_product" class="d-none" value="<?= $product[0]['product_id'] ?>" />
                <div class="row">
                    <div class="col-xl-5 col-sm">
                        <div class="">
                            <p class="h2 text-center">Changer le nom ?</p>
                            <input type="hidden" name="default_name" value="<?= $product[0]['product_name'] ?>" />
                            <input type="text" name="name" class="form-control border border-primary" value="<?= $product[0]['product_name'] ?>" />
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm d-flex align-items-center pt-5">
                        <i class="fa-regular fa-arrow-trend-down fa-2xl" style="font-size:100px"></i>
                    </div>
                </div>
                <div class="d-flex" style="height: 70px;"></div>
                <div class="col-xl-11 col-sm d-flex justify-content-end">
                    <div class="col-xl-5 col-sm d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-arrow-turn-down fa-flip-horizontal pt-5" style="font-size:100px"></i>
                    </div>
                    <div class="col-xl-6 col-sm">
                        <label class="h5" for="typeNumber">Voulez vous changer le prix ?</label>
                        <div class="col-xl-3">
                            <input type="hidden" name="default_price" value="<?= $product[0]['price'] ?>" />
                            <input type="text" name="price" class="form-control border border-primary" value="<?= $product[0]['price'] ?>" />
                            <!-- <input type="text" name="price" value="<?= $product[0]['price'] ?>" class="form-control border border-primary" min="0" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" /> -->
                        </div>
                    </div>
                </div>
                <div class="d-flex" style="height: 70px;"></div>
                <div class="col-xl-11 col-sm">
                    <div class="row">
                        <div class="col-xl-6 col-sm">
                            <label class="h5" for="typeNumber">La catégorie de l'article ?</label>
                            <input type="hidden" name="default_type" value="<?= $product[0]['type'] ?>"/>
                            <select class="form-select" name="type">
                                <option><?= $product[0]['type'] ?></option>
                                <option value="Digital">Digital</option>
                                <option value="Immobilier">Immobilier</option>
                                <option value="Mode">Mode</option>
                            </select>
                        </div>
                        <div class="col-xl-5 col-sm d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-arrows-turn-right fa-rotate-90 pt-5" style="font-size:100px"></i>
                        </div>
                    </div>
                </div>
                <div class="d-flex" style="height: 70px;"></div>
                <div class="col-xl-11 col-sm d-flex justify-content-end">
                    <div class="col-xl-5 col-sm d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-file-arrow-down pt-5" style="font-size:100px"></i>
                    </div>
                    <div class="col-xl-6 col-sm">
                        <p class="h2 text-center">Changer la description de l'article ?</p><br>
                        <div class="">
                            <label class="h5" for="form12">Pensez à la mise en forme !</label>
                            <textarea class="form-control border border-primary" name="description" rows="3" placeholder="Description de l'article" required><?= $product['0']['description'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex" style="height: 90px;"></div>
                <p class="h2 text-center">L'image</p><br>
                <div class="col-xl-12 col-sm">
                    <div class="row">
                        <div class="col-xl-6 col-sm d-flex align-items-center justify-content-center">
                            <input type="file" class="form-control border border-primary" name="img_url" id="img_url" accept="image/*" />
                        </div>
                        <div class="col-xm-6 col-sm mx-auto text-center">
                            <img src="/Pictures/<?= $product[0]['img_url'] ?>" alt="Image du produit" style="height: 200px; width: auto;">
                        </div>
                    </div>
                </div>
                <div class="d-flex" style="height: 90px;"></div>
                <div class="col-xl-11 col-sm mx-auto text-center">
                    <button type="submit" class="btn btn-primary btn-lg" name="modifyProductBDD">Modifier le produit</button>
                </div>
            </form>
            <div class="d-flex" style="height: 90px;"></div>
            <form action="/deleteProduct" method="post">
                <div class="col-xl-11 col-sm mx-auto text-center">
                    <input type="hidden" name="id_product" class="d-none" value="<?= $product[0]['product_id'] ?>" />
                    <h3>Vous voulez supprimer le produit ?</h3>
                    <p class="h5">Attention, cette action est irréversible !</p>
                    <div class="d-flex" style="height: 30px;"></div>
                    <button type="submit" class="btn btn-primary btn-lg" name="deleteProduct">Supprimer le produit</button>
                </div>
            </form>
            <div class="d-flex" style="height: 300px;"></div>
        </div>
    </div>
</body>

</html>