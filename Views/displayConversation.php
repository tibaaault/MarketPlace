<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
</head>

<body>
    <div class="d-flex" style="height: 100px;"></div>
    <div class="container">
        <div class="col-xl-10 col-sm mx-auto text-center">
            <?php
            $displayedConversations = array(); // Tableau pour suivre les conversations déjà affichées
            if (empty($conversation)) { ?>
                <div class="col-xl-12">
                   <div class="card shadow-lg col-sm border text-center">
                       <div class="mx-auto text-center p-3">
                           <p class='h4 text-center'>Vous n'avez pas encore de conversation en cours</p>
                       </div>
                   </div>
                   <div class='d-flex' style='height: 20px;'></div>
               </div>
           <?php }
            foreach ($conversations as $conversation) {
                
                $productId = $conversation['id_product'];
                // Vérifier si la conversation a déjà été affichée
                if (!in_array($productId, $displayedConversations)) {
                    // Marquer la conversation comme affichée
                    $displayedConversations[] = $productId;

                    // Afficher la conversation
                ?>
                    <form action="/goMP" method="post" style="cursor: pointer;" onclick="this.submit();">
                        <input class="d-none" type="text" name="id_product" value="<?= $conversation['id_product'] ?>" />
                        <input class="d-none" type="text" name="id_seller" value="<?= $conversation['id_seller'] ?>" />
                        <div class="col-xl-12">
                            <div class="row border">
                                <div class="col-xl-2">
                                    <img src='./Pictures/<?= $conversation['img_url'] ?>' class='img-fluid' style="height: 90px; width: auto;">
                                </div>
                                <div class="col-xl-3 d-flex align-items-center justify-content-center">
                                    <p class="lead"><?= $conversation['name'] ?></p>
                                </div>
                                <div class="col-xl-3 d-flex align-items-center justify-content-center">
                                    <p class="lead"><?= $conversation['price'] ?>€</p>
                                </div>
                                <div class="col-xl-4 d-flex align-items-center justify-content-center">
                                    <p class="lead"><?= $conversation['message'] ?></p>
                                </div>
                            </div>
                        </div>
                    </form>
            <?php }
            }
            ?>
        </div>
    </div>
</body>

</html>