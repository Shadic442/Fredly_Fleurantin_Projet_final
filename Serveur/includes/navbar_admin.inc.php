<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <a class="navbar-brand" href="#"></a>
        <img src="/ProjetFinEtudes/Client/images/logo.png" class="image-border" alt="photo" style="width: 48px" />
        <a class="navbar-brand" href="#"></a>
        <a class="navbar-brand">GigaChad</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/ProjetFinEtudes/index.php">Accueil</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="/ProjetFinEtudes/Serveur/Exercice/page_exercice.php">Wiki</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ProjetFinEtudes/Serveur/Admin/admin_page.php">Admin</a>
            </li>
        </ul>
    </div>

    <button class="bn boutonHover" onClick="deconnecter();">Déconnexion</button>
    <form id="dc" action="/ProjetFinEtudes/Serveur/Page/Session/deconnexion.php" method="POST"></form>
</nav>