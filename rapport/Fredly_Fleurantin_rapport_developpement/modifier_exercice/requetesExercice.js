let validerExercice = (formAjouterExercice) => {
  formAjouterExercice.append("table", "exercice");
  formAjouterExercice.append("action", "ajouter");
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: formAjouterExercice,
    contentType: false,
    processData: false,
    dataType: "text",
    success: (reponse) => {
      genererAjouterExercice();
      $("#msgErreurFormEx").html("Exercice bien enregistrer !");
      setTimeout(()=> {
        $("#msgErreurFormEx").html("");
     }
     ,5000);
      
    },
    fail: (e) => {},
  });
};

let chargerExerciceAJAX = () => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: {
      table: "exercice",
      action: "lister",
    },
    dataType: "json",
    success: (listeExercices) => {
      montrerVueEx("listerExercices", listeExercices);
    },
    fail: (err) => {
      console.log("pas de liste : " + err);
    },
  });
};

let chargerExerciceParCatAJAX = (idc) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: {
      idc: idc,
      table: "exercice",
      action: "categoriser",
    },
    dataType: "json",
    success: (listeExercices) => {
      montrerVueEx("listerExercices", listeExercices);
    },
    fail: (err) => {
      console.log("pas de liste : " + err);
    },
  });
};

let chargerExerciceParRechercheAJAX = () => {
  let recherche = document.getElementById("barRecherche").value;
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: {
      recherche: recherche,
      table: "exercice",
      action: "recherche",
    },
    dataType: "json",
    success: (listeExercices) => {
      montrerVueEx("listerExercices", listeExercices);
    },
    fail: (err) => {
      console.log("pas de liste : " + err);
    },
  });
};

let supprimerexreq = (ide) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    dataType: "json",
    data: {
      ide: ide,
      table: "exercice",
      action: "supprimer",
    },
    success: (reponse) => {
      chargerExerciceAdminAJAX();
    },
    fail: (e) => {},
  });
};

let requeteModifierExercice = () => {
  let formModifierExercice = new FormData(
    document.getElementById("formModifierExercice")
  );
  formModifierExercice.append("table", "exercice");
  formModifierExercice.append("action", "modifier");

  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: formModifierExercice,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (reponse) {
    },
    fail: function (e) {
    },
  });
};

let afficherExerciceDetail = (ide) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: {
      ide: ide,
      table: "exercice",
      action: "detail",
    },
    dataType: "json",
    success: (unExercice) => {
      montrerVueEx("detailExercice", unExercice);
    },
    fail: (err) => {
      console.log("pas de liste : " + err);
    },
  });
};

let afficherExerciceDetailmodif = (ide) => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: {
      ide: ide,
      table: "exercice",
      action: "detail",
    },
    dataType: "json",
    success: (unExercice) => {
      montrerFormModifier(unExercice.listeExercices[0]);
    },
    fail: (err) => {
      console.log("pas de liste : " + err);
    },
  });
};

let chargerExerciceParCat = (idc) => {
  if (idc == 0){
    $.ajax({
      type: "POST",
      url: "../../routes.php",
      data: {
        table: "exercice",
        action: "lister",
      },
      dataType: "json",
      success: (listeExercices) => {
        montrerVueEx("listerExercicesDansPagePlan", listeExercices);
      },
      fail: (err) => {
        console.log("pas de liste : " + err);
      },
    });

  }
  else{
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: {
      idc: idc,
      table: "exercice",
      action: "categoriser",
    },
    dataType: "json",
    success: (listeExercices) => {
      ListerExercicesDansPagePlan(listeExercices.listeExercices);
    },
    fail: (err) => {
      console.log("pas de liste : " + err);
    },
  });
}
};
