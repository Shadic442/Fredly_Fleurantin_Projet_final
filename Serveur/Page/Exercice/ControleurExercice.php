<?php

require_once("Exercice.php");
require_once("DaoExercice.php");

class ControleurExercice
{
    static private $instanceCtr = null;
    private $reponse;

    private function __construct()
    {
    }

    // Retourne le singleton du modèle 
    static function getControleurExercice(): ControleurExercice
    {
        if (self::$instanceCtr == null) {
            self::$instanceCtr = new ControleurExercice();
        }
        return self::$instanceCtr;
    }

    function CtrE_getAll()
    {
        return DaoExercice::getDaoExercice()->MdlE_getAll();
    }

    function CtrE_getUnExercice()
    {
        return DaoExercice::getDaoExercice()->MdlE_getUnExercice($_POST['ide']);
    }

    function CtrE_getParCategorie()
    {
        return DaoExercice::getDaoExercice()->MdlE_getParCategorie($_POST['idc']);
    }

    function CtrE_getParRecherche()
    {
        return DaoExercice::getDaoExercice()->MdlE_getParRecherche($_POST['recherche']);
    }

    function CtrE_EnregistrerExercice()
    {
        $dossier = "Serveur/Exercice/photoExercice/";
        //Photo marche pas 
        $image = "gigachadarnold.jpg";
        $nom = $_POST['nomexercice'];
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

        echo ($image . " " . $fichier . " " . $extension);
        //$_POST['photo'];
        $exercice = new Exercice(0, $_POST['categorie'], $_POST['nomexercice'], $_POST['descriptionex'], $image);
        return DaoExercice::getDaoExercice()->MdlE_EnregistrerExercice($exercice);
    }

    function CtrE_SupprimerExercice()
    {
        $dossier = "Serveur/Exercice/photoExercice/";
        $image = $_POST['photoAEffaccer'];

        if ($image !== "" || trim($image) !== "gigachadarnold.jpg") {
            @unlink($dossier . $image); //effacer la photo
        }
        echo ('photo dans CtrE_SupprimerExercice : ' . $dossier . $image);
    return DaoExercice::getDaoExercice()->MdlE_SupprimerExercice($_POST['ide']/*, $image*/);
    }

    function CtrE_ModifierExercice()
    {

        $dossier = "Serveur/Exercice/photoExercice/";
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
            //@unlink($dossier . $image); //effacer l'ancienne photo
            $image = $nomImage . $extension;
        }
        //$_POST['photoModifierExercice']
        $exercice = new Exercice($_POST['ide'], $_POST['categorie'], $_POST['nom'], $_POST['desc'], $image);
        return DaoExercice::getDaoExercice()->MdlE_modifierExercice($exercice);
    }

    function CtrE_Actions()
    {
        $action = $_POST['action'];
        switch ($action) {
            case "lister";
                return $this->CtrE_getAll();
            case "detail";
                return $this->CtrE_getUnExercice();
            case "categoriser";
                return $this->CtrE_getParCategorie();
            case "recherche";
                return $this->CtrE_getParRecherche();
            case "ajouter";
                return $this->CtrE_EnregistrerExercice();
            case "supprimer";
                return $this->CtrE_SupprimerExercice();
            case "modifier";
                return $this->CtrE_ModifierExercice();
            default;
                break;
        }
        // Retour de la réponse au client
    }
}
?>