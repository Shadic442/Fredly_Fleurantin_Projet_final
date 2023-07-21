<!-- le contenu qui sera affiché -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <a class="navbar-brand" href="#"></a>

        <img src="/ProjetFinEtudes/Client/images/logo.png" class="image-border " alt="photo" style="width: 48px" />
        <a class="navbar-brand" href="#"></a>
        <a class="navbar-brand">Giga M</a>
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
                <a class="nav-link" href="/ProjetFinEtudes/Serveur/Membre/membre_page.php">Horaire</a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 justify-content-end">
        <a data-bs-toggle="dropdown" class="bougerAgauche">
            <div class='image-profile-cropper'>
                <img class='customNavBarPhotoCSS' src='/ProjetFinEtudes/Serveur/Membre/photoMembres/<?php echo $_SESSION['photo'] ?>' alt='photo'>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
            <li class="nav-item">
                <a class="dropdown-item" href='/ProjetFinEtudes/Serveur/Membre/Profil.php'>Profil</a>
            </li>
            <div class="dropdown-divider"></div>
            <li class="nav-item">
                <!-- button déconnecter -->
                <a class="dropdown-item">
                    <button class="bn boutonHover" onClick="deconnecter();">Déconnexion</button>
                    <form id="dc" action="/ProjetFinEtudes/Serveur/Page/Session/deconnexion.php" method="POST">
                    </form>
                </a>
            </li>
        </ul>
    </div>
</nav>