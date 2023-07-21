<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare(strict_types=1);

require_once(__DIR__ . "/../../includes/dbconnexion.inc.php");
require_once("Exercice.php");

class DaoExercice
{
    static private $modelExercice = null;
    private $reponse = array();
    private $connexion = null;

    private function __construct()
    {

    }

    // Retourne le singleton du modèle 
    static function getDaoExercice(): DaoExercice
    {
        if (self::$modelExercice == null) {
            self::$modelExercice = new DaoExercice();
        }
        return self::$modelExercice;
    }

    function MdlE_getAll(): string
    {
        global $reponse;
        $connexion = DBConnexion::getDBConnexion();
        $requette = "SELECT exercice.ide, exercice.idc, exercice.nom, exercice.photo, 
        exercice.description, categorie.groupe
        FROM Exercice
        INNER JOIN categorie ON exercice.idc=categorie.idc;";
        try {
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $reponse['OK'] = true;
            $reponse['msg'] = "";
            $reponse['listeExercices'] = array();
            $reponse['listeExercices'] = $stmt->fetchAll();
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Problème pour obtenir les données des exercices";
        } finally {
            unset($connexion);
        }

        return json_encode($reponse);
    }

    function MdlE_getUnExercice($ide): string
    {
        global $reponse;
        $connexion = DBConnexion::getDBConnexion();
        $requette = "SELECT exercice.ide, exercice.nom, exercice.photo, exercice.description, 
        categorie.groupe, exercice.idc
        FROM Exercice
        INNER JOIN categorie ON exercice.idc=categorie.idc
        WHERE exercice.ide = '$ide';";
        try {
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $reponse['OK'] = true;
            $reponse['msg'] = "";
            $reponse['listeExercices'] = array();
            $reponse['listeExercices'] = $stmt->fetchAll();
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Problème pour obtenir les données des exercices";
        } finally {
            unset($connexion);
        }

        return json_encode($reponse);
    }

    function MdlE_getParCategorie($idc): string
    {
        global $reponse;
        $connexion = DBConnexion::getDBConnexion();
        $requette = "SELECT exercice.nom, exercice.photo, categorie.groupe, exercice.ide
        FROM Exercice
        INNER JOIN categorie ON exercice.idc=categorie.idc
        WHERE exercice.idc = '$idc';";
        try {
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $reponse['OK'] = true;
            $reponse['msg'] = "";
            $reponse['listeExercices'] = array();
            $reponse['listeExercices'] = $stmt->fetchAll();
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Problème pour obtenir les données des exercices";
        } finally {
            unset($connexion);
        }

        return json_encode($reponse);
    }

    function MdlE_getParRecherche($recherche): string
    {
        global $reponse;
        $connexion = DBConnexion::getDBConnexion();
        $requette = "SELECT exercice.ide, exercice.nom, exercice.photo, categorie.groupe
        FROM Exercice
        INNER JOIN categorie ON exercice.idc=categorie.idc
        WHERE exercice.nom LIKE '   $recherche%';";
        try {
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $reponse['OK'] = true;
            $reponse['msg'] = "";
            $reponse['listeExercices'] = array();
            $reponse['listeExercices'] = $stmt->fetchAll();
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Problème pour obtenir les données des exercices";
            //$reponse['msg'] = $e->getMessage();
        } finally {
            unset($connexion);
        }

        return json_encode($reponse);
    }


   function MdlE_EnregistrerExercice(Exercice $exercice): string
    {

        $connexion = DbConnexion::getDBConnexion();
        $requette = "INSERT INTO exercice VALUES(0,?,?,?,?)";
        try {

            $donnees = [$exercice->getIdc(), $exercice->getNom(), $exercice->getDescription(), $exercice->getPhoto()];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);

            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Exercice bien enregistre";
        } catch (Exception $e) {
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour enregistrer le Exercice : " . $e;
        } finally {
            unset($connexion);
        }

        return json_encode($this->reponse);
    }

    function MdlE_SupprimerExercice($ide/*, $image*/): string
    {
        $connexion = DbConnexion::getDBConnexion();
        $requette = "DELETE FROM `exercice` WHERE ide=?";
        try {

            // $dossier = "Serveur/Exercice/photoExercice/";
            // if ($image !== "" || $image !== 'gigachadarnold.jpg') {
            //     @unlink($dossier . $image); //effacer la photo
            // }

            $donnees = [$ide];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);


            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Exercice bien Supprimer";
        } catch (Exception $e) {
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour supprimer le Exercice";
        } finally {
            unset($connexion);
        }

        return json_encode($this->reponse);
    }

    function MdlE_modifierExercice(Exercice $exercice): string
    {
        global $reponse;
        $dbconnexion = DBConnexion::getDBConnexion();

    try {

        $requete = "UPDATE exercice SET nom=?, idc=?, description=?, photo=? WHERE ide=?" ;
        $donnees = [
            
            $exercice->getNom(),
            $exercice->getIdc(),
            $exercice->getDescription(),
            $exercice->getPhoto(),
            $exercice->getIde(),

            ];
            $stmt = $dbconnexion->prepare($requete);
            $stmt->execute($donnees);

            $reponse['success'] = true;
            $reponse['msg'] = "Membre modifié!";
        } catch (Exception $e) {
            $reponse['success'] = false;
            $reponse['msg'] = "Problème pour modifier le Membre : " . $e;
        } finally {
            return json_encode($reponse);
        }
    }
}
?>