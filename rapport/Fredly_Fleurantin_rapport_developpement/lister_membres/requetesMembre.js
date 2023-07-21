let validerInscription = (courriel) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      courriel: courriel,
      table: "membre",
      action: "valider",
    },
    success: (reponse) => {
      actionMembre("validerInscription", reponse);
    },
    fail: (e) => {},
  });
};

let InscriptionMembre = () => {
  let formInscription = new FormData(
    document.getElementById("formInscription")
  );
  formInscription.append("table", "membre");
  formInscription.append("action", "enregistrerMembre");

  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: formInscription,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (reponse) {
      actionMembre("enregistrerMembre", reponse);
    },
    fail: (e) => {},
  });
};

let chargerMembresAJAX = () => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: {
      table: "membre",
      action: "lister",
    },
    dataType: "json",
    success: (listeMembres) => {
      montrerVue("listerMembres", listeMembres);
    },
    fail: (err) => {
      console.log("pas de liste : " + err);
    },
  });
};

let changerEtatMembre = (idm) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      idm: idm,
      table: "membre",
      action: "changerEtat",
    },
    success: (reponse) => {
    },
    error: function (xhr) {
    },
  });
};

let getMembreCourant = () => {
  $.ajax({
    type: "POST",
    url: "/ProjetFinEtudes/routes.php",
    dataType: "json",
    data: {
      table: "membre",
      action: "get_current",
    },
    success: (reponse) => {
      actionProfil("afficherDonneesModifier", reponse);
    },
    fail: (e) => {
      console.log("fail membre courant");
    },
  });
};

let getMembreCourantProfile = () => {
  $.ajax({
    type: "POST",
    url: "/ProjetFinEtudes/routes.php",
    dataType: "json",
    data: {
      table: "membre",
      action: "get_current",
    },
    success: (reponse) => {
      actionProfil("afficherProfile", reponse);
    },
    fail: (e) => {
    },
  });
};


let getMembreCourantPlan = () => {
  $.ajax({
    type: "POST",
    url: "/ProjetFinEtudes/routes.php",
    dataType: "json",
    data: {
      table: "membre",
      action: "get_current",
    },
    success: (reponse) => {
      actionMembre("afficherDonneesAjouterPlan", reponse);
    },
    fail: (e) => {
      console.log("fail membre courant");
    },
  });
};

let modifierMembre = () => {
  let formMembre = new FormData(document.getElementById("formProfile"));
  formMembre.append("table", "membre");
  formMembre.append("action", "modifier");
  $.ajax({
    type: "POST",
    url: "/ProjetFinEtudes/routes.php",
    data: formMembre,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (reponse) {
      actionProfil("modifier", reponse);
    },
    fail: function (e) {
    },
  });
};
