<?php
session_start();
if (!isset($_SESSION['courriel'])) {

    header('Location: ../../index.php?msg=Vous+devez+vous+connecter');
    exit;
}
if ($_SESSION['role'] == "A") {

    header('Location: ../Admin/admin_page.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre</title>
    <script src="../../client/utilitaires/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="#">
    <script src="../../client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../Client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Client/utilitaires/icons-1.8.1/bootstrap-icons.css">
    <link rel="stylesheet" href="../../Client/css/style.css">
    <link rel="stylesheet" href="../../Client/css/styleMembre.css">
    <link rel="stylesheet" href="../../Client/css/styleExercice.css">
    <script src="../../client/js/session/vueSession.js"></script>
    <script src="../../Client/js/membre/vueMembre.js"></script>
    <script src="../../Client/js/membre/requetesMembre.js"></script>
    <script src="../../Client/js/Plan/requetesPlan.js"></script>
    <script src="../../Client/js/Plan/vuePlan.js"></script>
    <script src="../../Client/js/Exercice/requetesExercice.js"></script>
    <script src="../../Client/js/Exercice/vueExercice.js"></script>
    <script>
        window.onload = (event) => {
            chargerPlanByIdmAJAX();
            chargerExerciceParCat(0);
            getAllExercicePlanifieAJAXGetIdp();
        };
    </script>
</head>

<body>
    <?php include_once("../../Serveur/includes/navbar_membre.inc.php") ?>

    <div id='contenuForm'></div>

    <div class="container-fluid">
        <div class=" row">
            <div class="col" id="pagePlanGauche">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light ">
                    <ul class="nav nav-pills flex-column  ">
                        <a class="d-flex align-items-center  mb-md-0 me-md-auto link-dark text-decoration-none ">
                            <svg class="bi me-2" width="40" height="32">
                                <use xlink:href="#bootstrap" />
                            </svg>
                            <span class="fs">
                                <h3>Plan</h3>
                            </span>
                        </a>
                        <li class="nav-item">
                            <a href="#" class="nav-link link-dark" onClick='AfficherFormAjouterPlan()'>Ajouter un
                                plan</a>
                        </li>
                        <hr>
                    </ul>
                    <div id='listePlans' class='scrollview1'></div>
                </div>
            </div>

            <!-- Debut du contenu de présentation -->
            <div id="presentation_Section" class="col-8 wrap scrollview2"></div>
            <!-- Fin du contenu de présentation -->

            <div class="col" id="pagePlanDroite">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light agrandir">
                    <ul class="nav nav-pills flex-column mb-auto ">
                        <a class=" mb-md-0 me-md-auto link-dark text-decoration-none ">

                            <span class="fs">
                                <h4>Liste d'exercice</h4>
                            </span>
                        </a>

                        <select class="form-select" onchange="chargerExerciceParCat(value);"
                            aria-label="Default select example">
                            <option selected value="0">Tous</option>
                            <option value="1">Abdominaux</option>
                            <option value="2">Épaules</option>
                            <option value="3">Biceps</option>
                            <option value="4">Triceps</option>
                            <option value="5">Avant-Bras</option>
                            <option value="6">Pectoraux</option>
                            <option value="7">Dos</option>
                            <option value="8">Trapèze</option>
                            <option value="9">Quadriceps</option>
                            <option value="10">Ischio-jambiers</option>
                            <option value="11">Mollets</option>
                        </select>
                        <hr>

                        <li class="nav-item scrollview1 ">
                            <div id="listerexdansplan" name="listerexdansplan"></div>

                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div id='modal'></div>

    <?php include_once("../../Serveur/includes/footer.inc.php") ?>

</body>

</html>