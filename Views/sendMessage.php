<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
    <style>
        .message-container {
            min-height: 500px;
            max-height: 500px;
            /* Set a specific height for the message container */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }
    </style>
</head>

<body>
    <div class="d-flex" style="height: 100px;"></div>
    <div class="container">
        <div class="col-xl-10 col-sm mx-auto text-center border">
            <div class="row">
                <div class="col-xl-3">
                    <img src='./Pictures/<?= $product[0]["img_url"] ?>' class='img-fluid' style="height: 100px; width: auto;">
                </div>
                <div class="col-xl-3 d-flex align-items-center justify-content-center">
                    <p class="h3"><?= $product[0]["product_name"] ?></p>
                </div>
                <div class="col-xl-3 d-flex align-items-center justify-content-center">
                    <p class="h3"><?= $product[0]["price"] ?>€</p>
                </div>
            </div>
        </div>
        <div class="col-xl-10 col-sm mx-auto text-center border">
            <div class="message-container">
                <?php
                foreach ($messages as $message) {
                    if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 0) {
                        $id_buyer = $_SESSION['id'];
                        $id_seller = $product[0]['seller_id'];
                    } elseif (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
                        $id_seller = $product[0]['seller_id'];
                        $id_buyer = $messages[0]['message_from'];
                    }
                    if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 0) {
                ?>
                        <div class="col-xl-12 col-sm <?= ($message["message_from"] === $id_buyer) ? 'text-right d-flex justify-content-end' : 'text-left d-flex justify-content-start' ?>">
                            <div class="col-6 mt-2 <?= ($message["message_from"] === $id_buyer) ? 'bg-success text-right d-flex justify-content-end' : 'bg-secondary text-left d-flex justify-content-start' ?>  p-2 rounded">
                                <div class="<?= ($message["message_from"] === $id_buyer) ? ' text-white' : '' ?>">
                                    <p class='lead'><?= stripslashes($message['message']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } elseif (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
                    ?>
                        <div class="col-xl-12 col-sm <?= ($message["message_from"] === $id_seller) ? 'text-right d-flex justify-content-end' : 'text-left d-flex justify-content-start' ?>">
                            <div class="col-6 mt-2 <?= ($message["message_from"] === $id_seller) ? 'bg-success text-right d-flex justify-content-end' : 'bg-secondary text-left d-flex justify-content-start' ?>  p-2 rounded">
                                <div class="<?= ($message["message_from"] === $id_seller) ? ' text-white' : '' ?>">
                                    <p class='lead'><?= stripslashes($message['message']) ?></p>
                                </div>
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>
        </div>
        <div class="col-xl-10 col-sm mx-auto text-center ">
            <form action="/sendMessage" method="post">
                <input type="hidden" name="id_seller" value="<?= $id_seller ?>" />
                <input type="hidden" name="id_buyer" value="<?= $id_buyer ?>" />
                <input type="hidden" name="id_product" value="<?= $product[0]['product_id'] ?>" />
                <textarea class="form-control border border-primary" name="message" id="exampleFormControlTextarea1" rows="3" required></textarea>
                <div class="d-flex" style="height: 20px;"></div>
                <button type="submit" name="sendMessage" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</body>

</html>