<?php

require_once("Membre.php");
require_once("DaoMembre.php");

class ControleurMembre
{
    static private $instanceCtr = null;
    private $reponse;

    private function __construct()
    {

    }

    // Retourne le singleton du modèle 
    static function getControleurMembre(): ControleurMembre
    {
        if (self::$instanceCtr == null) {
            self::$instanceCtr = new ControleurMembre();
        }
        return self::$instanceCtr;
    }

    function CtrM_GetAllMembre()
    {
        return DaoMembre::getDaoMembre()->MdlM_getAll();
    }

    function CtrM_ValiderInscription()
    {
        return DaoMembre::getDaoMembre()->MdlM_ValiderInscription($_POST['courriel']);
    }

    function CtrM_EnregistrerMembre()
    {
        $dossier = "Serveur/membre/photoMembres/";
        $image = "logo.png";
        $nom = $_POST['nom'];
        if ($_FILES['photo']['tmp_name'] !== "") {
            $nomImage = sha1($nom . time());
            //Upload de la photo
            $tmp = $_FILES['photo']['tmp_name'];
            $fichier = $_FILES['photo']['name'];
            $extension = strrchr($fichier, '.');
            @move_uploaded_file($tmp, $dossier . $nomImage . $extension);
            // Enlever le fichier temporaire chargé
            @unlink($tmp); //effacer le fichier temporaire
            $image = $nomImage . $extension;
        }
        //echo $image, $fichier;

        $pass = $_POST['pass'];
        $membre = new Membre(0, $_POST['prenom'], $_POST['nom'], $_POST['courriel'], $_POST['daten'], $_POST['sexe'], $image, $_POST['telephone']);
        return DaoMembre::getDaoMembre()->MdlM_EnregistrerMembre($membre, $pass);
    }
    function CtrM_ChangerEtat()
    {
        $reponse = DaoMembre::getDaoMembre()->MdlM_modifierEtatMembre($_POST['idm']);
        return $reponse;
    }
    function CtrM_GetMembre()
    {
        $reponse = DaoMembre::getDaoMembre()->MdlM_getMembre($_SESSION['courriel']);
        return $reponse;
    }


    function CtrM_ModifierProfile()
    {

        $dossier = "Serveur/membre/photoMembres/";
        $image = $_POST['photoOriginal'];
        $nom = $_POST['nom'];
        
            if ($_FILES['photo']['tmp_name'] !== "") {
                $nomImage = sha1($nom . time());
                //Upload de la photo
                $tmp = $_FILES['photo']['tmp_name'];
                $fichier = $_FILES['photo']['name'];
                $extension = strrchr($fichier, '.');
                @move_uploaded_file($tmp, $dossier . $nomImage . $extension);
                // Enlever le fichier temporaire chargé
                @unlink($tmp); //effacer le fichier temporaire
                // if ( $imageOg != "logo.png") {
                // unlink($dossier . $image); //effacer l'ancienne photo
                // }
                $image = $nomImage . $extension;
            }
        

        echo $_FILES['photo']['name'];
        $membre = new Membre($_POST['idm'], $_POST['prenom'], $_POST['nom'], $_POST['courriel'], $_POST['daten'], $_POST['sexe'], $image, $_POST['telephone']);
        $reponse = DaoMembre::getDaoMembre()->MdlM_modifierprofile($membre);
        return $reponse;
    }
    function CtrM_Actions()
    {
        $action = $_POST['action'];
        switch ($action) {
            case "enregistrerMembre";
                return $this->CtrM_EnregistrerMembre();
            case "changerEtat";
                return $this->CtrM_ChangerEtat();
            case "valider":
                return $this->CtrM_ValiderInscription();
            case "lister":
                return $this->CtrM_GetAllMembre();
            case "get_current":
                return $this->CtrM_GetMembre();
            case "modifier":
                return $this->CtrM_ModifierProfile();
        }
        // Retour de la réponse au client
    }
}
?>