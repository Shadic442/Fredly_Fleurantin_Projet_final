let validerConnexion = (courrielc, passwordc) => {
  $.ajax({
    type: "POST",
    url: "/ProjetFinEtudes/routes.php",
    dataType: "json",
    data: {
      courrielc: courrielc,
      passwordc: passwordc,
      table: "connexion",
      action: "valider",
    },
    success: (reponse) => {
      actionConnexion("valider", reponse);
    },
    error: function (xhr) {
      console.log(xhr.responseText);
    },
  });
};
