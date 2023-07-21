let genererCRUDMembres = () => {
  contenu = `
    <div class="main_body">

        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h2>Membres</h2>
                        </div>
                       
                       
                    </div>
                    </div>
                
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Courriel</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>État</th>
                        </tr>
                    </thead>
                    <tbody id="emp_body"></tbody>
                    <tr>
                        <th colspan="11">
                            <div id="pager">
                                <ul id="pagination" class="pagination-sm">
                                </ul>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        `;
  $("#presentation_Section").html(contenu);
};

let genererAjouterExercice = () => {
  contenu = `
    
  <div class="main_body">
  <div class="container">
    <form name="formAjouterExercice" id="formAjouterExercice" method="POST" enctype="multipart/form-data">
      <ul class="flex-outer">
        <li>
          <label for="nomexercice">Nom de l'exercice</label>
          <input type="text" id="nomexercice" name='nomexercice' placeholder="Entrer votre exercice ici">
        </li>
        <li>

          <label for="categorie">Choisir une catégorie</label>
          <select id="categorie" name="categorie">
            <option value="1">Abdominaux</option>
            <option value="2">Épaules</option>
            <option value="3">Biceps</option>
            <option value="4">Triceps</option>
            <option value="5">Avant-Bras</option>
            <option value="6">Pectoraux</option>
            <option value="7">Dos</option>
            <option value="8">Trapèze</option>
            <option value="9">Quadriceps</option>
            <option value="10">Ischio-jambiers</option>
            <option value="11">Mollets</option>
          </select>
        </li>

        <li>
          <label for="message">Descripition exercice</label>
          <textarea rows="6" id="descriptionex" name='descriptionex'
            placeholder="Saisir la description de l'exercice"></textarea>
        </li>
        <li>
          <label for="photo">Photo</label>
          <input type="file" class="form-control" id="photo" name="photo" />
        </li>
        <li>
          <button class="bn boutonHover" onclick="validerFormEx();" type="button">Enregistrer</button>
        </li>
        <span class="col-md-6 msgErreur" id="msgErreurFormEx"></span>
      </ul>
    </form>
  </div>
</div>
    `;
  $("#presentation_Section").html(contenu);
};

let remplirCardAdmin = (unExercice) => {
  let rep = '<div class=" d-inline">';
  rep += '<div class="cardMusculation">';
  rep += '<div class="image">';
  rep += `<img src="../Exercice/photoExercice/${unExercice.photo}" alt="Card Image">`;
  rep += "</div>";
  rep += '<div class="content">';
  rep += '<p class="title align-middle" style="min-height:54px;">' + unExercice.nom + "</p>";
  rep += '<p class="categorie">' + unExercice.groupe + "</p>";
  rep += " <div class='row'>";
  rep += " <div class='col-6'>";
  rep +=
    `<button class="btn btn-dark btn-lg" onclick='afficherExerciceDetailmodif(` +
    unExercice.ide +
    `)'>Modifier</button>`;
  rep += " </div>";
  rep += " <div class='col-6'>";
  rep +=
    '<button class="btn btn-danger btn-lg"  onclick="montrerFormConfirmSupprimer(' +
    unExercice.ide +
    ')">Supprimer</button>';
  rep += " </div>";
  rep += " </div>";
  rep += " </div>";
  rep += " </div>";
  rep += " </div>";

  return rep;
};

let ListerExercicesAdmin = (listeExercices) => {
  let contenu =
    "<div class='col-12 justify-content-center' id='cardcontainer'>";
  for (let unExercice of listeExercices) {
    contenu += remplirCardAdmin(unExercice);
  }
  contenu += "</div>"
  $("#presentation_Section").html(contenu);
};

let montrerFormModifier = (unExercice) => {
  let form =
    `
  <!-- Modal pour modifier exercice -->
  <div class="modal fade" id="modifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form name="formModifierExercice" id="formModifierExercice" method="POST" enctype="multipart/form-data">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier l'exercice</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <ul class="flex-outer">

              <li>
                <label for="nom">Nom de l'exercice</label>
                <input type="text" id="nom" name='nom' value="`+ unExercice.nom + `">
                </li>

              <li>
                <label for="cars">Choisir une catégorie</label>
                <select id="categorie" name="categorie" value=${unExercice.idc}>
                  <option value="1" >Abdominaux</option>
                  <option value="2">Épaules</option>
                  <option value="3">Biceps</option>
                  <option value="4" >Triceps</option>
                  <option value="5">Avant-Bras</option>
                  <option value="6">Pectoraux</option>
                  <option value="7">Dos</option>
                  <option value="8">Trapèze</option>
                  <option value="9">Quadriceps</option>
                  <option value="10">Ischio-jambiers</option>
                  <option value="11">Mollets</option>
                </select>
              </li>

              <li>
                <label for="message">Descripition exercice</label>
                <textarea rows="6" id="desc" name='desc' placeholder="">${unExercice.description}</textarea>
              </li>
              
              <input type="hidden" id="ide" name="ide" value="${unExercice.ide}">
              <input type="hidden" id="photoOriginal" name="photoOriginal" class="form-control form-control-lg" value="${unExercice.photo}"/>

              <li>
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" />
              </li>

              <li>
                <button class="bn boutonHover" type="button" data-bs-dismiss="modal" onClick="requeteModifierExercice();chargerExerciceAdminAJAX();">Modifier
                  l'exercice</button>
              </li>

            </ul>
         
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
    </form>
  </div>
  <!-- Fin du modal pour modifier film -->
        `;
  document.getElementById("modal").innerHTML = form;
  $("#modifModal").modal("show");
};

let montrerVueAdmin = (action, donnees) => {
  switch (action) {
    case "listerExercicesAdmin":
      if (donnees.OK) {
        ListerExercicesAdmin(donnees.listeExercices);
      } else {
      }
      break;
  }
};

let montrerFormConfirmSupprimer = (ide) => {
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
        
        <button class="btn btn-danger btn-lg"  onclick="supprimerex('` +ide +`');hideSuppModal();">Supprimer</button>
        <button class="btn btn-secondary btn-lg"  onclick="hideSuppModal()">Annuler</button>
         
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

let hideSuppModal = () => {
  $("#suppModal").modal("hide");
}