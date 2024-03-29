<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary py-4">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Mettre le logo du site -->
            <a class="navbar-brand mt-2 mt-lg-0" href="/home">
                <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy" />
            </a>
            <ul class="navbar-nav me-auto mb-2 ms-5 mb-lg-0">
                <li class="nav-item">
                    <span class="h4"><a class="nav-link" href="/home">MarketPlace</a></span>
                </li>
                <li class="nav-item">
                    <span class="h4"><a class="nav-link" href="/home">Accueil</a></span>
                </li>
                <!-- Ajouter condition d'affichage
                Si la personne connectée est un vendeur (son rôle est à 1) alors afficher 'Ajouter un produit'
                sinon le cacher -->
                <?php
                if (isset($_SESSION['isSeller']) && $_SESSION['isSeller'] == 1) {
                ?>
                    <li class="nav-item">
                        <span class="h4"><a class="nav-link" href="/newProduct">Ajouter un produit</a></span>
                    </li>
                    <li class="nav-item">
                        <span class="h4"><a class="nav-link" href="/displaySellerProducts">Mes produit</a></span>
                    </li>
                <?php }
                ?>
                <!-- Jusqu'à ici -->
                <?php
                if (isset($_SESSION['id']) && $_SESSION['id'] == 0) { ?>
                    <li class="nav-item ms-4">
                        <span class="h4"><a class="nav-link" href="/admin/user">PanelAdmin</a></span>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart fa-xl"></i>

            </a>
            <?php
            if (isset($_SESSION['id'])) {
            ?>
                <a class="text-reset me-3" href="/conversation">
                    <i class="fas fa-envelope fa-xl"></i>
                </a>
            <?php } else { ?>
                <a class="text-reset me-3" href="/signin">
                    <i class="fas fa-envelope fa-xl"></i>
                </a>
            <?php } ?>
            <!-- Avatar -->
            <div class="dropdown">
                <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow" href="/signin" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="50" alt="Black and White Portrait of a Man" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="/signin">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->