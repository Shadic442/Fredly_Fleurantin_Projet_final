let actionMembre = (action, donnees) => {
  switch (action) {
    case "validerInscription":
      if (donnees.OK) {
        InscriptionMembre();
      } else {
        $("#msgErreurInscription").html(donnees.msg);
      }
      break;
    case "enregistrerMembre":
      if (donnees.OK) {
        location.replace("../../index.php");
      } else {
        $("#msgErreurInscription").html(donnees.msg);
      }
      break;


    case "afficherDonneesAjouterPlan":
      if (donnees.success) {
        document.getElementById("idm").value = donnees.membre["idm"];
      } else {
        $("#msgErreurEnreg").html(
          "Problème avec la récupération de vos données"
        );
      }
      break;

    case "afficherProfile":
      if (donnees.success) {
        document.getElementById("imgprofil").src =
          "photoMembres/" + donnees.membre["photo"];
        document.getElementById("nameprofil").innerHTML =
          donnees.membre["prenom"] + " " + donnees.membre["nom"];
        document.getElementById("courrielprofil").innerHTML =
          donnees.membre["courriel"];
      } else {
        $("#msgErreurEnreg").html(
          "Problème avec la récupération de vos données"
        );
      }
      break;
  }
};

let actionProfil = (action, donnees) => {
  switch (action) {
    case "afficherDonneesModifier":
      if (donnees.success) {
        document.getElementById("imgprofil").src =
          "photoMembres/" + donnees.membre["photo"];
        document.getElementById("prenom").value = donnees.membre["prenom"];
        document.getElementById("nom").value = donnees.membre["nom"];
        document.getElementById("telephone").value =
          donnees.membre["telephone"];
        document.getElementById("daten").value = donnees.membre["daten"];
        document.getElementById("sexe").value = donnees.membre["sexe"];
        document.getElementById("photoOriginal").value =
          donnees.membre["photo"];
      } else {
        $("#msgErreurEnreg").html(
          "Problème avec la récupération de vos données"
        );
      }
    case "afficherProfile":
      if (donnees.success) {
        document.getElementById("imgprofil").src =
          "photoMembres/" + donnees.membre["photo"];
        document.getElementById("nameprofil").innerHTML =
          donnees.membre["prenom"] + " " + donnees.membre["nom"];
        document.getElementById("courrielprofil").innerHTML =
          donnees.membre["courriel"];
      } else {
        $("#msgErreurEnreg").html(
          "Problème avec la récupération de vos données"
        );
      }
      break;
  }
};

const regExpTelephone = new RegExp("^[0-9-+]{9,15}$");
const regExpPass = new RegExp("[A-Za-z0-9]{8,20}$");
const regExpCourriel = new RegExp("[a-z0-9]+@[a-z]+.[a-z]{2,3}");

let validerFormInscription = () => {
  const pass = $("#pass").val();
  const confirmpass = $("#confirmpass").val();
  const telephone = $("#telephone").val();
  const prenom = $("#prenom").val();
  const nom = $("#nom").val();
  const courriel = $("#courriel").val();
  const sexe = $("#sexe").val();
  const daten = $("#daten").val();

  if (
    pass == "" ||
    confirmpass == "" ||
    prenom == "" ||
    nom == "" ||
    courriel == "" ||
    telephone == "" ||
    daten == ""
  ) {
    $("#msgErreurInscription").html("Remplissez tous les champs obligatoires!");
  } else if (sexe == undefined) {
    $("#msgErreurInscription").html("veuillez choisir un sexe!");
  } else if (!regExpTelephone.test(telephone)) {
    $("#msgErreurInscription").html(
      "Votre numero de téléphone n'a pas le bon format! (ex: 514-742-9956)"
    );
  } else if (!regExpPass.test(pass)) {
    $("#msgErreurInscription").html(
      "Votre mot de passe doit être composé de lettres et/ou de chiffres et doit avoir 8 à 20 caractères!"
    );
  } else if (!regExpCourriel.test(courriel)) {
    $("#msgErreurInscription").html("Entrez un courriel valide!");
  } else if (Date.now() < new Date(daten).getTime()) {
    $("#msgErreurInscription").html("Entrez une date valide!");
  } else if (pass != confirmpass) {
    $("#msgErreurInscription").html(
      "Votre mot de pass ne correspond pas à la confirmation!"
    );
  } else {
    $("#msgErreurInscription").html("valide!");
    validerInscription(courriel);
  }
};

let remplirLigne = (unMembre) => {
  let rep = "<tr>";
  rep += " <td>" + unMembre.idm + "</td>";
  rep += " <td>" + unMembre.courriel + "</td>";
  rep += " <td>" + unMembre.prenom + "</td>";
  rep += " <td>" + unMembre.nom + "</td>";
  rep += " <td>" + unMembre.etat + "</td>";
  rep +=
    ' <td><button type="button" class="boutonChangerEtat"onClick=modifierEtatMembre(' +
    unMembre.idm +
    "),chargerMembresAJAX();>Changer État</button></td>";
  rep += " <td></td>";
  rep += " </tr>";
  return rep;
};

let listerMembres = (listeMembres) => {
  let contenu = "";
  for (let unMembre of listeMembres) {
    contenu += remplirLigne(unMembre);
  }
  document.getElementById("emp_body").innerHTML = contenu;
};

let montrerVue = (action, donnees) => {
  switch (action) {
    case "listerMembres":
      if (donnees.OK) {
        listerMembres(donnees.listeMembres);
      } else {
        afficherMessage(donnees.msg);
      }
      break;
  }
};

let modifierEtatMembre = (idm) => {
  changerEtatMembre(idm);
};

function genererPageProfil() {
  genererPageProfilHTML();
}

let validerFormModifier = () => {
  const prenom = $("#prenom").val();
  const nom = $("#nom").val();
  const telephone = $("#telephone").val();
  const daten = $("#daten").val();

  $("#msgErreurProfil").html("");

  if (prenom == "" || nom == "" || telephone == "" || daten == "") {
    $("#msgErreurProfil").html("Remplissez tous les champs obligatoires!");
  } else if (!regExpTelephone.test(telephone)) {
    $("#msgErreurProfil").html(
      "Votre numero de téléphone n'a pas le bon format! (ex: 514-742-9956)"
    );
  } else if (Date.now() < new Date(daten).getTime()) {
    $("#msgErreurProfil").html("Entrez une date valide!");
  } else {
    $("#msgErreurProfil").html("Votre Profil à modifié!");
    modifierMembre();
  }
};

function genererPageProfilHTML() {
  getMembreCourantProfile();
  contenu = `



  <div class="container rounded   mt-5 mb-5" id="box">

        <div class=" row align-items-start  ">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img id="imgprofil" class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold text-white" id="nameprofil">aa</span>
                <span class="text-white-50" id="courrielprofil">aa</span>
                <br>
                <button class="bn boutonHover" profile-button" id="paddingDesBouton" onClick="genererModifierMembre()" type="button">Modifier votre profil</button>
                <br>
            </div>
        </div>
        
        <!-- Debut du contenu de présentation -->
      <div id="presentation_SectionMembre" class="container-fluid"></div>
      <!-- Fin du contenu de présentation -->

</div>
</div>
</div>

  <!-- Fin du modal pour modifier le profil -->`;
  $("#presentation_Section").html(contenu);
}

function genererModifierMembre() {
  getMembreCourant();

  contenu = `
  <!-- debut du modal pour modifier le profil -->

  <form id="formProfile" method="POST" enctype="multipart/form-data">
    <div class="p-3 py-5">
      <div class="d-flex justify-content-between  align-items-center">
        <h4 class="text-right text-white">Paramètres du compte</h4>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">

          <div class="form-outline">
            <label class="couleurStyle" for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="par Defaut" class="form-control form-control-lg" />
          </div>

        </div>
        <div class="col-md-6 mb-4">
          <input type="hidden" id="idm" name="idm">

          <div class="form-outline">
            <label class="couleurStyle" for="nom">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control form-control-lg" />
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="form-outline">
            <label class="couleurStyle" for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg" />
          </div>


        </div>
        <div class=" col-md-6 mb-4 ">
        <div class="form-outline">

        <label for="sexe" class="col-sm-2 col-form-label couleurStyle">Sexe</label>
        <select class="form-select " id="sexe" name="sexe">
            <option selected disabled value="">Choisir</option>
            <option value="F">Féminin</option>
            <option value="M">Masculin</option>
            <option value="A">Autres</option>
        </select>
        </div>
        </div>
      </div>

     
      <div class="row">
        <div class="col-6 mb-4">
          <div class="form-outline datepicker w-100">
            <label for="daten" class="couleurStyle">Date de naissance</label>
            <input type="date" class="form-control" id="daten" name="daten" />
          </div>
        </div>
        <div class="col-6 mb-4">
          <div class="form-outline">
            <label for="photo" class="couleurStyle">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" />
          </div>
        </div>

        <input type="hidden" id="photoOriginal" name="photoOriginal" class="form-control form-control-lg" />

      </div>

      <div class="mt-5 text-center"><button class="bn boutonHover" profile-button" type="submit"
          onClick="validerFormModifier();">Sauvegarder les changements</button></div>

      <div><span class="col-md-6 msgErreur" id="msgErreurProfil"></span></div>

    </div>
  </form>

  <!-- Fin du modal pour modifier le profil -->`;
  $("#presentation_SectionMembre").html(contenu);
}

function AfficherFormAjouterPlan() {
  getMembreCourantPlan();

  form = `
  <!--modal enregistrer plan-->
    <div class="modal fade" id="enregPlanModal" tabindex="-1" aria-labelledby="planModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="planModal">Ajouter un Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="formEnregistrerPlan" method="POST" enctype="multipart/form-data" class="row g-3" onSubmit="return validerFormEnreg();">
                        <div class="form-group row" style="visibility:hidden;">
                            <label for="idMembre" class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="idm" name="idm" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button class="bn boutonHover" onClick='ajouterPlan();'>ajouter plan</button>
                    <span class="col-md-6 msgErreur" id="msgErreurAjouterPlan"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin du modal pour enregistrer le plan -->`;
  document.getElementById("contenuForm").innerHTML = form;
  $("#enregPlanModal").modal("show");
}
