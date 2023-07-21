<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />

  <title>GigaChad-Fitness</title>
  <link rel="shortcut icon" href="#">
  <link rel="stylesheet" href="../../Client/css/style.css" />
  <link rel="stylesheet" href="../../Client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css" />
  <script src="../../client/utilitaires/jquery-3.6.0.min.js"></script>
  <script src="../../client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
  <script src="../../client/js/membre/vueMembre.js"></script>
  <script src="../../client/js/membre/requetesMembre.js"></script>

</head>

<body background="../../Client/images/Gym.png">
  <!-- debut du nav -->

  <!-- fin du nav -->
  <!-- Inscription -->
  <div class="row justify-content-center align-items-center">
    <div class="col-12 col-lg-9 ">
      <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
        <div class="card-body p-4 ">
          <button class="bn boutonHover" onclick="history.back()">Accueil</button>

          <h3 class=" mb-4 pb-2 pb-md-0 ">Inscription</h3>

          <form class=" modal-content animate" enctype="multipart/form-data" name="formInscription" id="formInscription"
            method="POST">
            <div class="row">
              <div class="col-md-6 mb-4">

                <div class="form-outline">
                  <label class="form-label" for="prenom">Prénom</label>
                  <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" />
                </div>

              </div>
              <div class="col-md-6 mb-4">

                <div class="form-outline">
                  <label class="form-label" for="nom">Nom</label>
                  <input type="text" id="nom" name="nom" class="form-control form-control-lg" />
                </div>

              </div>
            </div>

            <div class="row">

              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <label class="form-label" for="pass">Mot de Passe</label>
                  <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                </div>
              </div>

              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <label class="form-label" for="confirmpass">Confimer Mot de Passe</label>
                  <input type="password" id="confirmpass" name="confirmpass" class="form-control form-control-lg" />
                </div>
              </div>


            </div>

            <div class="row">
              <div class="col-md-6 mb-4 pb-2">

                <div class="form-outline">
                  <label class="form-label" for="courriel">Courriel</label>
                  <input type="email" id="courriel" name="courriel" class="form-control form-control-lg" />
                </div>

              </div>
              <div class="col-md-6 mb-4 pb-2">

                <div class="form-outline">
                  <label class="form-label" for="telephone">Téléphone</label>
                  <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg" />
                </div>

              </div>
            </div>

            <div class="row">


              <div class="col-md-6">
                <label for="sexe" class="form-label">Sexe</label>
                <select class="form-select" id="sexe" name="sexe" aria-describedby="validationServer04Feedback">
                  <option selected disabled value="">Choisir</option>
                  <option value="F">Féminin</option>
                  <option value="M">Masculin</option>
                  <option value="A">Autres</option>
                </select>
              </div>

              <div class="col-6 mb-4">
                <div class="form-outline datepicker w-100">
                  <label for="daten" class="form-label">Date de naissance</label>
                  <input type="date" class="form-control" id="daten" name="daten" />
                </div>
              </div>



              <div class="col-6">

                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" />
              </div>

            </div>

            <div class="mt-4 pt-2">
              <button class="bn boutonHover" type="button" onClick="validerFormInscription();">Enregistrer</button>
              <span class="col-md-6 msgErreur" id="msgErreurInscription"></span>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Fin Inscription -->
</body>

</html>