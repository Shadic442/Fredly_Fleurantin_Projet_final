<?php
session_start();
if (!isset($_SESSION['courriel'])) {

    header('Location: ../../index.php?msg=Vous+devez+vous+connecter');
    exit;
}
if ($_SESSION['role'] == "M") {

    header('Location: ../Membre/membre_page.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="../../client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="../../client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="../../Client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Client/utilitaires/icons-1.8.1/bootstrap-icons.css">
    <link rel="stylesheet" href="../../Client/css/style.css">
    <link rel="stylesheet" href="../../Client/css/styleAdmin.css">
    <script src="../../client/js/admin/vueAdmin.js"></script>
    <script src="../../client/js/admin/requetesAdmin.js"></script>
    <script src="../../client/js/session/vueSession.js"></script>
    <script src="../../Client/js/membre/requetesMembre.js"></script>
    <script src="../../Client/js/membre/vueMembre.js"></script>
    <script src="../../Client/js/connexion/requetesConnexion.js"></script>
    <script src="../../Client/js/connexion/vueConnexion.js"></script>
    <script src="../../Client/js/exercice/requetesExercice.js"></script>
    <script src="../../Client/js/exercice/vueExercice.js"></script>
</head>

<?php include_once("../../Serveur/includes/navbar_admin.inc.php") ?>

<body onLoad='chargerExerciceAdminAJAX()'>
    <div class="row">
        <div id="leftdiv" class="col-3">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;  ">
                <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                    </svg>
                    <span class="fs-4">Admin</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <button class="nav-link link-dark" onClick='genererCRUDMembres(),chargerMembresAJAX()'>Liste des
                            membres</button>
                    </li>
                    <li>
                        <button class="nav-link link-dark" onClick='genererAjouterExercice()'>Ajouter un exercice</button>
                    </li>
                    <li>
                        <button class="nav-link link-dark" onClick='chargerExerciceAdminAJAX()'>Liste d'exercice</button>
                    </li>

                </ul>
            </div>
        </div>
        <div id="rightcontainer" class="col-9">
            <!-- le modal qui sera affiché -->
            <div id='modal'></div>
            <!-- Modal du panier -->

            <div id="pagecontent">
                <div id="modal_Section" class="container-fluid">
                </div>
                <!-- Debut du contenu de présentation -->
                <div id="presentation_Section" class="container-fluid"></div>
                <div id="ajouter_Section" class="container-fluid"></div>

                <!-- Fin du contenu de présentation -->
            </div>
        </div>
</body>

</html>