let montrerVuePlan = (action, donnees) => {
  switch (action) {
    case "listerPlanByIdm":
      if (donnees.OK) {
        listerPlanByIdm(donnees.listePlans);
      }
      break;
    case "getAllExercicePlanifie":
      if (donnees.OK) {
        genererUnPlanDetailler(donnees.listeExercice_Planifiers);
      }
      break;
    case "":
      if (donnees.OK) {

      } else {
        //afficherMessage(donnees.msg);
      }
      break;
  }
};

function ajouterPlan() {
  const nom = $("#nom").val();

  if (nom.trim() == "") {
    $("#msgErreurAjouterPlan").html("veuillez entrer un Nom!");
  } else if (nom.length > 16) {
    $("#msgErreurAjouterPlan").html("veuillez entrer un Nom comportant moins de 16 caractères!");
  } else {
    EnregistrerPlan();
    $("#enregPlanModal").modal("hide");
  }
}

function listerPlanByIdm(listePlans) {
  let contenu = "";
  contenu = '<ul class="nav nav-pills flex-column mb-auto">';
  for (let unPlan of listePlans) {
    contenu += remplirPlan(unPlan);
  }
  contenu += '</ul>';
  $("#listePlans").html(contenu);
}

function remplirPlan(unPlan) {
  let plan = '<li class="nav-item">';
  plan += '<a class="nav-link link-dark" onclick="changerSelectPlan(\'' + unPlan.idp + '\');getAllExercicePlanifieAJAX(\'' + unPlan.idp + '\')">' + unPlan.nom + '</a>';
  plan += '<i class="bi bi-trash" onclick="montrerFormConfirmSupprimerPlan(\'' + unPlan.idp + '\')"></i>';
  plan += '</li>'
  return plan;
}

function genererUnPlanDetailler(ExercicesPlanifie) {
  let jours = ["DIM", "LUN", "MAR", "MER", "JEU", "VEN", "SAM"];
  let j = 1;
  let contenu = "";
  //contenu += '<div class="wrap scrollview1">';
  contenu += '<div class="calendar">';
  contenu += '<div class="calendar">';
  for (let unJour of jours) {
    contenu += '<div class="day ">';
    contenu += '<p class="day-name">' + unJour + '</p>';
    for (let i = 0; i < Object.keys(ExercicesPlanifie).length; i++) {
      if (ExercicesPlanifie[i].idj == j) {
        contenu += '<div class="day-item">';
        contenu += '<span class="day-item-title">' + ExercicesPlanifie[i].nom + '</span>';
        contenu += '<span class="day-item-description">series:' + ExercicesPlanifie[i].series + '</span>';
        contenu += '<span class="day-item-description">repetitions' + ExercicesPlanifie[i].repetitions + '</span>';
        contenu += '<span class="day-item-description">poids:' + ExercicesPlanifie[i].poids + '</span>';
        contenu += '<span class="day-item-description bi bi-trash" onclick="supprimerExercicePlanifie(\'' + ExercicesPlanifie[i].idep + '\')"></span>';

        contenu += '</div>';
      }
    }
    j++;
    contenu += '</div>';
  }
  contenu += '</div>';
  contenu += '</div>';
  contenu += '</div>';
  $("#presentation_Section").html(contenu);
}

function afficherFormAjouterExercicePlan(idp, exerciceIde) {
  let form = `
  <!-- Modal ajouterExercicePlan -->
  <div class="modal fade" id="ajouterExercicePlanModal" tabindex="-1" aria-labelledby="ajouterExercicePlanLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="ajouterExercicePlanLabel">Exercice</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form id="formAjouterExercicePlan">
                <div class="row">
                  <div class="col-md-6 mb-4">
                      <div class="form-outline">
                      <input type="hidden" class="form-control" id="idp" name="idp" value=${idp}>
                      </div>
                  </div>
                  <div class="col-md-6 mb-4">
                      <div class="form-outline">
                      <input type="hidden" class="form-control" id="ide" name="ide" value=${exerciceIde}>
                      </div>
                  </div>
                </div>
                      <div class="row">
                          <div class="col-md-6 mb-4">
                              <div class="form-outline">
                                  <label for="inputSeries" class="col-sm-2 col-form-label">Series</label>
                                  <input type="number" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" id="series" name="series" placeholder="Series" value=0>
                              </div>
                          </div>
                          <div class="col-md-6 mb-4">
                              <div class="form-outline">
                                  <label for="inputRepetition" class="col-sm-2 col-form-label">Répétition</label>
                                  <input type="number" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" id="repetitions" name="repetitions" placeholder="Répétitions" value=0>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6 mb-4">
                              <div class="form-outline">
                                  <label for="inputPoids" class="col-sm-2 col-form-label">Poids</label>
                                  <input type="number" min="0" oninput="this.value = Math.abs(this.value)" class="form-control" id="poids" name="poids" placeholder="Poids" value=0>
                              </div>
                          </div>
                          <div class="col-md-6 mb-4">

                              <div class="form-outline">
                                  <label for="journee" class="col-sm-2 col-form-label">Journée</label>
                                  <select class="form-select" id="idj" name="idj">
                                      <option selected disabled value="">Choisir</option>
                                      <option value="1">Dimanche</option>
                                      <option value="2">Lundi</option>
                                      <option value="3">Mardi</option>
                                      <option value="4">Mercredi</option>
                                      <option value="5">Jeudi</option>
                                      <option value="6">Vendredi</option>
                                      <option value="7">Samedi</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </form>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onClick="validationAjouterExercicePlan()">Ajouter</button>
                  <span class="col-md-6 msgErreur" id="msgErreurFormAjouterEP"></span>
              </div>
          </div>
      </div>
  </div>
  <!-- fin Modal ajouterExercicePlan -->`;
  document.getElementById("contenuForm").innerHTML = form;
  $("#ajouterExercicePlanModal").modal("show");
}

function validationAjouterExercicePlan() {
  const journee = $("#idj").val();
  const idp = $("#idp").val();

  if (journee == undefined) {
    $("#msgErreurFormAjouterEP").html("veuillez entrer une Journée!");
  } else if (idp == "undefined") {
    $("#msgErreurFormAjouterEP").html("veuillez selectionner un Plan!");
  } else {
    $("#msgErreurFormAjouterEP").html("valide!");
    EnregistrerExercicePlan();
    $("#ajouterExercicePlanModal").modal("hide");
  }
}

let montrerFormConfirmSupprimerPlan = (idp) => {
  let form =
    `
  <!-- Modal pour modifier exercice -->
  <div class="modal fade" id="suppModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de vouloir supprimer?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        <button class="btn btn-danger btn-lg"  onclick="supprimerPlan('` + idp + `');hideSuppModalPlan();">Supprimer</button>
        <button class="btn btn-secondary btn-lg"  onclick="hideSuppModalPlan()">Annuler</button>
         
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!-- Fin du modal pour modifier film -->
        `;
  document.getElementById("modal").innerHTML = form;
  $("#suppModal").modal("show");
};

let hideSuppModalPlan = () => {
  $("#suppModal").modal("hide");
}