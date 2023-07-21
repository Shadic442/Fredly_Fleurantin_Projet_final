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
    <title>Profil</title>
    <script src="../../client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="../../client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../Client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Client/utilitaires/icons-1.8.1/bootstrap-icons.css">
    <link rel="stylesheet" href="../../Client/css/style.css">
    <link rel="stylesheet" href="../../Client/css/styleMembre.css">
    <script src="../../client/js/session/vueSession.js"></script>
    <script src="../../Client/js/membre/vueMembre.js"></script>
    <script src="../../Client/js/membre/requetesMembre.js"></script>
</head>

<?php include_once("../../Serveur/includes/navbar_membre.inc.php") ?>

<body onload="genererPageProfil()">

    <!-- Debut du contenu de présentation -->
    <div id="presentation_Section" class="container-fluid"></div>
    <!-- Fin du contenu de présentation -->

    <?php include_once("../../Serveur/includes/footer.inc.php") ?>

</body>

</html>