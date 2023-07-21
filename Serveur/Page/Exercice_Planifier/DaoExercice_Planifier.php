<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare(strict_types=1);

require_once(__DIR__ . "/../../includes/dbconnexion.inc.php");
require_once("Exercice_Planifier.php");

class DaoExercice_Planifier
{
    static private $modelExercice_Planifier = null;
    private $reponse = array();
    private $connexion = null;

    private function __construct()
    {

    }

    // Retourne le singleton du modèle 
    static function getDaoExercice_Planifier(): DaoExercice_Planifier
    {
        if (self::$modelExercice_Planifier == null) {
            self::$modelExercice_Planifier = new DaoExercice_Planifier();
        }
        return self::$modelExercice_Planifier;
    }

    function MdlEP_getAllExercice_Planifier($idp): string
    {
        global $reponse;
        $connexion = DBConnexion::getDBConnexion();
        $requette = "SELECT * FROM Exercice_Planifie INNER JOIN exercice ON exercice_planifie.ide = exercice.ide WHERE idp=?";
        try {
            $donnees = [$idp];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);
            $reponse['OK'] = true;
            $reponse['msg'] = "";
            $reponse['listeExercice_Planifiers'] = array();
            $reponse['listeExercice_Planifiers'] = $stmt->fetchAll();
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Problème pour obtenir les données des exercice_Planifiers";
            //$reponse['msg'] = $e->getMessage();
        } finally {
            unset($connexion);
        }
        
        return json_encode($reponse);
    }

    function MdlEP_EnregistrerExercice_Planifier(Exercice_Planifier $exercice_Planifier): string
    {
        //global $reponse;

        $connexion = DbConnexion::getDBConnexion();
        $requette = "INSERT INTO exercice_Planifie VALUES(0,?,?,?,?,?,?)";
        try {

            $donnees = [$exercice_Planifier->getIdp(), $exercice_Planifier->getIdj(), $exercice_Planifier->getIde(),
            $exercice_Planifier->getSeries(), $exercice_Planifier->getRepetitions(), $exercice_Planifier->getPoids()];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);


            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Exercice_Planifier bien enregistre";
        } catch (Exception $e) {
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour enregistrer le Exercice_Planifier";
        } finally {
            unset($connexion);
        }

        return json_encode($this->reponse);
    }

    function MdlEP_SupprimerExercice_Planifier($idep): string
    {
        $connexion = DbConnexion::getDBConnexion();
        $requette = "DELETE FROM `exercice_Planifie` WHERE idep=?";
        try {

            $donnees = [$idep];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);


            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Exercice_Planifie bien Supprimer";
        } catch (Exception $e) {
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour supprimer le Exercice_Planifie";
        } finally {
            unset($connexion);
        }

        return json_encode($this->reponse);
    }

    function MdlEP_modifierExercice_Planifier(Exercice_Planifier $exercice_Planifier): string
{
    global $reponse;
    $dbconnexion = DBConnexion::getDBConnexion();

    try {

        // UPDATE exercice_Planifier SET exercice_Planifier.nom=?, exercice_Planifier.idc=?, exercice_Planifier.description=?, exercice_Planifier.photo=?
        //  FROM exercice_Planifier 
        //  INNER JOIN categorie ON exercice_Planifier.idc=categorie.idc 
        //  WHERE ide=?

        $requete = "UPDATE exercice_Planifier SET nom=?, idc=?, description=?, photo=? WHERE ide=?" ;
        $donnees = [
            
            // $exercice_Planifier->getCourriel(),
            // $exercice_Planifier->getSexe(),
            // $exercice_Planifier->getDaten(),
            $exercice_Planifier->getIdep(),$exercice_Planifier->getIdp(), $exercice_Planifier->getIdj(), $exercice_Planifier->getIde(), $exercice_Planifier->getSeries(), $exercice_Planifier->getRepetitions(), $exercice_Planifier->getPoids()

        ];
        $stmt = $dbconnexion->prepare($requete);
        $stmt->execute($donnees);

        $reponse['success'] = true;
        $reponse['msg'] = "Membre modifié!";
    } catch (Exception $e) {
        $reponse['success'] = false;
        $reponse['msg'] = "Problème pour modifier le Membre : " . $e;
        //$reponse['msg'] = $e->getMessage();
    } finally {
        return json_encode($reponse);
    }
}

}
?>