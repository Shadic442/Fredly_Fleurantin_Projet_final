let EnregistrerPlan = () => {
  let formEnregistrerPlan = new FormData(
    document.getElementById("formEnregistrerPlan")
  );
  formEnregistrerPlan.append("table", "plan");
  formEnregistrerPlan.append("action", "enregistrerPlan");

  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: formEnregistrerPlan,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (reponse) {
      chargerPlanByIdmAJAX();
    },
    fail: (e) => {},
  });
};

let chargerPlanByIdmAJAX = () => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      table: "plan",
      action: "listerPlanByIdm",
    },
    success: (reponse) => {
      montrerVuePlan("listerPlanByIdm", reponse);
    },
    error: function (xhr) {
      console.log(xhr.responseText);
    },
  });
}

let getAllExercicePlanifieAJAX = (idp) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      idp: idp,
      table: "exercice_planifier",
      action: "getAll",
    },
    success: (reponse) => {
      montrerVuePlan("getAllExercicePlanifie", reponse);
    },
    error: function (xhr) {
    },
  });
}

let supprimerPlan = (idp) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      idp: idp,
      table: "plan",
      action: "supprimer",
    },
    success: (reponse) => {
      chargerPlanByIdmAJAX();
      $("#presentation_Section").html("");
    },
    fail: (e) => {},
  });
};

let supprimerExercicePlanifie = (idep) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      idep: idep,
      table: "exercice_planifier",
      action: "supprimer",
    },
    success: (reponse) => {
      getAllExercicePlanifieAJAXGetIdp();
    },
    fail: (e) => {},
  });
};

let changerSelectPlan = (idp) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      idp: idp,
      table: "plan",
      action: "changerSelect",
    },
    success: (reponse) => {
    },
    error: function (xhr) {
      console.log(xhr.responseText);
    },
  });
};

let getAllExercicePlanifieAJAXGetIdp = () => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      table: "plan",
      action: "getSelected",
    },
    success: (reponse) => {
      getAllExercicePlanifieAJAX(reponse.plan.idp);
    },
    error: function (xhr) {
    },
  });
}

let afficherFormAjouterExercicePlanGetIdp = (exerciceIde) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      table: "plan",
      action: "getSelected",
    },
    success: (reponse) => {
      afficherFormAjouterExercicePlan(reponse.plan.idp, exerciceIde);
    },
    error: function (xhr) {
    },
  });
}

let EnregistrerExercicePlan = () => {
  let formEnregistrerExercicePlan = new FormData(
    document.getElementById("formAjouterExercicePlan")
  );
  formEnregistrerExercicePlan.append("table", "exercice_planifier");
  formEnregistrerExercicePlan.append("action", "ajouter");

  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: formEnregistrerExercicePlan,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (reponse) {
      getAllExercicePlanifieAJAXGetIdp();
    },
    fail: (e) => {
    },
  });
};
