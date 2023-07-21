<?php session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == "A") {
  include_once("../includes/navbar_admin.inc.php");
} else if (isset($_SESSION['role']) && $_SESSION['role'] == "M") {
  include_once("../includes/navbar_membre.inc.php");
} else {
  include_once("../includes/navbar_visiteur.inc.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <title>GigaChad-Fitness</title>
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="../../Client/css/style.css" />
  <link rel="stylesheet" href="../../Client/css/styleExercice.css" />
  <link rel="stylesheet" href="../../Client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css" />
  <script src="../../Client/utilitaires/jquery-3.6.0.min.js"></script>
  <script src="../../Client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
  <script src="../../client/js/session/vueSession.js"></script>
  <script src="../../client/js/connexion/vueConnexion.js"></script>
  <script src="../../client/js/exercice/requetesExercice.js"></script>
  <script src="../../client/js/exercice/vueExercice.js"></script>
  <script src="../../client/js/membre/requetesMembre.js"></script>
  <script src="../../client/js/membre/vueMembre.js"></script>
  <script>
    window.onload = (event) => {
      chargerExerciceAJAX();
    };
  </script>

</head>

<body>
  <div class="container-fluid" id="pageExercicerows">
    <div class="row">
      <div class="col-3">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
          <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
              <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-4">
              <h1>Exercice</h1>
            </span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <div class="d-flex" role="search">
                <input id="barRecherche" class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
                <button class="btn btn-outline-success" onclick="chargerExerciceParRechercheAJAX()">Recherche</button>
              </div>
            </li>
            <hr>
            <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap" />
              </svg>
              <span class="fs-4">
                <h3>Catégories</h3>
              </span>
            </a>
            <hr>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceAJAX()">Tous</a>
            </li>
            <hr>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(1)">Abdominaux</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(2)">Épaules</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(3)">Biceps</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(4)">Triceps</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(5)">Avant-Bras</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(6)">Pectoraux</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(7)">Dos</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(8)">Trapeze</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(9)">Quadriceps</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(10)">Ischio-jambiers</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-dark" onclick="chargerExerciceParCatAJAX(11)">Mollets</a>
            </li>
          </ul>
          <hr>
        </div>
      </div>
      <div class="col-9 justify-content-center" id="cardcontainer">

      </div>
    </div>
  </div>
</body>
<?php include_once("../../Serveur/includes/footer.inc.php") ?>
