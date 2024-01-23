<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau produit</title>
</head>

<body>
    <div class="container">
        <div class="col-xl-11 mx-auto">
            <div class="d-flex" style="height: 100px;"></div>
            <form action="/addProduct" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-5 col-sm">
                        <p class="h2">Commençons par l'essentiel</p><br>
                        <div class="form-outline">
                            <label class="h5" for="form12">Quel est le titre du produit ?</label>
                            <input type="text" name="name" class="form-control border border-primary" required />
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
                        <p class="h2">Enchaînons par le plus important</p><br>
                        <label class="h5" for="typeNumber">Quel sera le prix de votre article ?</label>
                        <div class="col-xl-3">
                            <input type="number" name="price" class="form-control border border-primary" min="0" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" placeholder="100" required />
                        </div>
                    </div>
                </div>
                <div class="d-flex" style="height: 70px;"></div>
                <div class="col-xl-11 col-sm">
                    <div class="row">
                        <div class="col-xl-6 col-sm">
                            <p class="h2 text-center">Une petite information qui peut être utile</p><br>
                            <label class="h5" for="typeNumber">Quelle est la catégorie de votre article ?</label>
                            <select class="form-select" name="type" required>
                                <option disabled>Choisir la catégorie</option>
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
                        <p class="h2 text-center">Une petite description pour donner envie</p><br>
                        <div class="">
                            <label class="h5" for="form12">Pensez à la mise en forme !</label>
                            <textarea class="form-control border border-primary" name="description" rows="3" placeholder="Description de l'article" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex" style="height: 90px;"></div>
                <p class="h2 text-center">Une petite image pour donner envie d'acheter</p><br>
                <div class="col-xl-11 col-sm d-flex justify-content-end">
                    <div class="form-outline">
                        <input type="file" class="form-control border border-primary" name="img_url" id="img_url" accept="image/*" required />
                    </div>
                </div>
                <div class="d-flex" style="height: 90px;"></div>
                <div class="col-xl-11 col-sm mx-auto text-center">
                    <button type="submit" class="btn btn-primary btn-lg" name="addProductBDD">Ajouter le produit</button>
                </div>
            </form>
            <div class="d-flex" style="height: 300px;"></div>
        </div>
    </div>
</body>

</html>