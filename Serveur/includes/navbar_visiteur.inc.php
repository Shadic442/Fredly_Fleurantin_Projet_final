<!-- debut du nav -->
<script src="/ProjetFinEtudes/Client/js/connexion/vueConnexion.js"></script>
<script src="/ProjetFinEtudes/Client/js/connexion/requetesConnexion.js"></script>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <a class="navbar-brand" href="#"></a>

        <img src="/ProjetFinEtudes/Client/images/logo.png" class="image-border" alt="photo" style="width: 48px" />
        <a class="navbar-brand" href="#"></a>
        <a class="navbar-brand">GigaChad</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/ProjetFinEtudes/index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ProjetFinEtudes/Serveur/Exercice/page_exercice.php">Wiki</a>
            </li>
        </ul>
    </div>
    <!-- <div class="mx-auto order-0"> -->
    <div class="container-fluid justify-content-center">
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 justify-content-end">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link  " data-bs-toggle="dropdown">Ouvrir une session</a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                    <li>
                        <form id="modalConnexion" name="modalConnexion" class="px-4 py-3">
                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail1" class="form-label">Courriel</label>
                                <input type="email" class="form-control" id="courrielc" name="courrielc" placeholder="courriel@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword1" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="passwordc" name="passwordc" placeholder="Mot de passe">
                            </div>
                            <button type="button" onClick="validerFormConnex();" class="bn boutonHover">Me
                                connecter</button>
                            <span class="col-md-6 msgErreur" id="msgErreurConnex"></span>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/ProjetFinEtudes/Serveur/membre/Inscription.php">Première fois?
                            Inscrivez-vous maintenant.</a>

                    </li>
                </ul>
            </li>
        </ul>
    </div>

</nav>
<!-- fin du nav -->