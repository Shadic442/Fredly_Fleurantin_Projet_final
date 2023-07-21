<?php session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == "A") {
  include_once("Serveur/includes/navbar_admin.inc.php");
} else if (isset($_SESSION['role']) && $_SESSION['role'] == "M") {
  include_once("Serveur/includes/navbar_membre.inc.php");
} else {
  include_once("Serveur/includes/navbar_visiteur.inc.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <title>GigaChad-Fitness</title>
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="Client/css/style.css" />
  <link rel="stylesheet" href="Client/css/styleMembre.css" />
  <link rel="stylesheet" href="Client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css" />
  <script src="client/utilitaires/jquery-3.6.0.min.js"></script>
  <script src="client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
  <script src="client/js/membre/vueMembre.js"></script>
  <script src="client/js/membre/requetesMembre.js"></script>
  <script src="client/js/session/vueSession.js"></script>
  <script src="client/js/connexion/vueConnexion.js"></script>
  <script src="client/js/membre/requetesMembre.js"></script>
  <script src="client/js/membre/vueMembre.js"></script>
</head>

<body>

  <!-- Debut slides -->
  <div class="slides">
    <div class="slide">
      <img src="client/images/Gigachad.jpg" alt="" class="slide-image" />
      <div class="centered">Motivation</div>
    </div>
    <div class="slide slide-2">
      <img src="client/images/gigachadarnold.jpg" alt="" class="slide-image" />
      <div class="centered">Discipline</div>
    </div>
    <div class="slide slide-3">
      <img src="client/images/gigachad1.jpg" alt="" class="slide-image" />
      <div class="centered">MUSCLE</div>
    </div>
  </div>
  <!-- Fin slides -->


  <div class="center-twa">

    <div class="container">
      <h1>Banque d'exercice</h1>
      <div class="row">
        <div class="col-md-3">
          <div class="imgAbt">
            <img width="220" height="220" src="client/images/dumbell.jpg" />
          </div>
        </div>
        <div class="col-md-9">
          <!-- <p>Consulter notre librairie d'exercice détaillé!
            Inspirer vous pour vos entrainement et varier vos exercice!
          </p> -->
          <p>
            Si vous cherchez à vous mettre en forme ou à améliorer votre routine d'entraînement, notre liste d'exercices
            est l'endroit idéal pour commencer. Que vous soyez débutant ou athlète confirmé, vous y trouverez des exercices
            variés pour tous les niveaux de forme physique. Notre liste d'exercices a été conçue pour vous aider à atteindre
            vos objectifs de remise en forme en vous fournissant des options d'entraînement adaptées à vos besoins. Nous avons
            rassemblé une grande variété d'exercices, pour
            vous offrir une expérience d'entraînement complète et variée. Avec un description claire
            pour chaque exercice, notre liste d'exercices est un excellent point de départ pour tout programme de remise en forme.
            Venez la consulter et commencez votre voyage vers une vie plus saine et plus active dès aujourd'hui!


          </p>
        </div>
      </div>

      <h1 style="text-align: right;">Planifier</h1>
      <div class="row">
        <div class="col-md-9">
          <!-- <p>Planifier vos sessions d'entrainement en détail avec une liste d'exercice à faire. Vos semaine seront
            détaillé à l'avance.</p> -->
          <p>
            Planifier votre entraînement physique présente de nombreux avantages pour
            votre santé et votre bien-être général. Tout d'abord, cela vous permet de suivre un programme cohérent
            et de travailler de manière plus efficace pour atteindre vos objectifs. Cela peut inclure des séances d'entraînement
            ciblées pour améliorer votre force, votre endurance, votre flexibilité ou votre agilité. En planifiant votre entraînement,
            vous pouvez également éviter la procrastination et rester motivé à chaque étape de votre parcours de remise en forme.
            En outre, cela peut vous aider à éviter les blessures en vous assurant de ne pas vous surentraîner ou de négliger des
            zones importantes de votre corps. Enfin, la planification de votre entraînement physique peut vous aider à établir des
            routines saines et
            à améliorer votre discipline, ce qui peut se traduire par une meilleure qualité de vie globale.

          </p>
        </div>
        <div class="col-md-3">
          <div class="imgAbt">
            <img width="220" height="220" src="client/images/clock.jpg" />
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>

  <?php include_once("Serveur/includes/footer.inc.php") ?>
  </div>
</body>

</html>