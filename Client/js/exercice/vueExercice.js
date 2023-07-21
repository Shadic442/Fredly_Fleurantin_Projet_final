let validerFormEx = () => {
  const descriptionex = $("#descriptionex").val();
  const nomexercice = $("#nomexercice").val();

  if (descriptionex == "" || nomexercice == "") {
    $("#msgErreurFormEx").html("Remplissez tous les champs !");
  } else {
    $("#msgErreurFormEx").html("Exercice bien enregistrer !");
    let formAjouterExercice = new FormData(
      document.getElementById("formAjouterExercice")
    );
    validerExercice(formAjouterExercice);
  }
};

let montrerVueEx = (action, donnees) => {
  switch (action) {
    case "listerExercices":
      if (donnees.OK) {
        ListerExercices(donnees.listeExercices);
      } else {
        afficherMessage(donnees.msg);
      }
      break;
    case "detailExercice":
      if (donnees.OK) {
        detaillerUnExercice(donnees.listeExercices[0]);
      } else {
        afficherMessage(donnees.msg);
      }
      break;
    case "listerExercicesDansPagePlan":
      if (donnees.OK) {
        ListerExercicesDansPagePlan(donnees.listeExercices);
      } else {
      }
      break;


  }
};

let remplirCard = (unExercice) => {
  let rep = '<div class="d-inline" >';
  rep += '<div class="cardMusculation">';
  rep += '<div class="image">';
  rep += `<img src="photoExercice/${unExercice.photo}" alt="Card Image">`;
  rep += "</div>";
  rep += '<div class="content">';
  rep += '<p class="title align-middle" style="min-height:54px;">' + unExercice.nom + "</p>";
  rep += '<p class="categorie">' + unExercice.groupe + "</p>";
  rep +=
    '<button class="button" onclick="afficherExerciceDetail(' +
    unExercice.ide +
    ')">Afficher les Details</button>';
  rep += " </div>";
  rep += " </div>";
  rep += " </div>";
  return rep;
};

let detaillerUnExercice = (unExercice) => {
  let contenu = '<div > <dl class="row"><dt class="col-9">Exercice: </dt>';
  contenu += '  <dd class="col-9">' + unExercice.nom + "</dd>";
  contenu += '<dt class="col-9">Groupe musculaire: </dt>';
  contenu +=
    '  <dd class="col-9"> <a class="link-dark disabled"  onclick = "chargerExerciceParCatAJAX(' +
    unExercice.idc
    + ')"> '
    + unExercice.groupe +
    "</a></dd></dl>";
  contenu += `<img src="photoExercice/${unExercice.photo}" class="rounded" style="width: 800px;"></img>`;
  contenu += '<dl class="row"><dt class="col-9">Description : </dt></dl>';
  contenu += '<p style="width: 730px;">' + unExercice.description + "</p>";
  contenu += "</div>";

  $("#cardcontainer").html(contenu);
};

let ListerExercices = (listeExercices) => {
  let contenu = "";

  for (let unExercice of listeExercices) {
    contenu += remplirCard(unExercice);
  }

  $("#cardcontainer").html(contenu);
};

let supprimerex = (ide) => {
  supprimerexreq(ide);
};

let ListerExercicesDansPagePlan = (listeExercices) => {
  let contenu = "";

  for (let unExercice of listeExercices) {
    contenu += remplirdansplan(unExercice);
  }

  $("#listerexdansplan").html(contenu);
}

let remplirdansplan = (unExercice) => {
  let rep = '<div class="d-inline">';
  rep += '<button  class="right-btn btnajouter" onclick="afficherFormAjouterExercicePlanGetIdp(\'' + unExercice.ide + '\')">+</button>';
  rep += '<p>' + unExercice.nom + "</p>";
  rep += '<hr>';

  rep += " </div>";
  return rep;
};

