let actionConnexion = (action, donnees) => {
  switch (action) {
    case "valider":
      if (donnees.success) {
        $("#modalConnexion").modal("hide");
        if (donnees.role == "M") {
          location.replace("/ProjetFinEtudes/Serveur/Membre/membre_page.php");
        } else if (donnees.role == "A") {
          location.replace("/ProjetFinEtudes/Serveur/Admin/admin_page.php");
        }
      } else {
        $("#msgErreurConnex").html(donnees.msg);
      }
  }
};

let validerFormConnex = () => {
  const courrielc = $("#courrielc").val();
  const passwordc = $("#passwordc").val();

  if (courrielc == "" || passwordc == "") {
    $("#msgErreurConnex").html("Remplissez tous les champs!");
  } else {
    $("#msgErreurConnex").html("");
    validerConnexion(courrielc, passwordc);
  }
};
