let chargerExerciceAdminAJAX = () => {
  $.ajax({
    type: "POST",
    url: "../../routes.php",
    data: {
      table: "exercice",
      action: "lister",
    },
    dataType: "json",
    success: (listeExercices) => {
      montrerVueAdmin("listerExercicesAdmin", listeExercices);
    },
    fail: (err) => {
      console.log("pas de liste : " + err);
    },
  });
};
