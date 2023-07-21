<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare(strict_types=1);

require_once(__DIR__ . "/../../includes/dbconnexion.inc.php");
require_once("Plan.php");

class DaoPlan
{
    static private $modelPlan = null;
    private $reponse = array();
    private $connexion = null;

    private function __construct()
    {
    }

    // Retourne le singleton du modèle 
    static function getDaoPlan(): DaoPlan
    {
        if (self::$modelPlan == null) {
            self::$modelPlan = new DaoPlan();
        }
        return self::$modelPlan;
    }

    function MdlP_getAllByIdm(): string
    {
        global $reponse;
        $connexion = DbConnexion::getDBConnexion();
        $requette = "SELECT * FROM Plan WHERE idm=?";
        try {
            $donnee = [$_SESSION["idm"]];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnee);
            $reponse['OK'] = true;
            $reponse['msg'] = "";
            $reponse['listePlans'] = array();
            $reponse['listePlans'] = $stmt->fetchAll();
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = $e->getMessage();
        } finally {
            unset($connexion);
            return json_encode($reponse);
        }
    }

    function MdlP_EnregistrerPlan(Plan $plan): string
    {
        $connexion = DbConnexion::getDBConnexion();
        $requette = "INSERT INTO plan VALUES(0,?,?,?)";
        try {

            $donnees = [$plan->getIdm(), $plan->getNom(), $plan->getIsSelected()];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);

            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Plan bien enregistre";
        } catch (Exception $e) {
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour enregistrer un Plan";
        } finally {
            unset($connexion);
            return json_encode($this->reponse);
        }
    }

    function MdlP_SupprimerPlan($idp): string
    {
        $connexion = DbConnexion::getDBConnexion();
        $requette = "DELETE FROM `Plan` WHERE idp=?";
        try {

            $donnees = [$idp];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);


            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Plan bien Supprimer";
        } catch (Exception $e) {
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour supprimer le Plan";
        } finally {
            unset($connexion);
        }

        return json_encode($this->reponse);
    }

    function MdlP_modifierSelect($idp): string
    {
        global $reponse;
        $reponse = array();
        $connexion = DbConnexion::getDBConnexion();
        try {
            $requette = "UPDATE plan SET isSelected = 0 WHERE idm=?";
            $donnees = [$_SESSION["idm"]];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);

            $requete2 = "UPDATE plan SET isSelected = 1 WHERE idp=?";
            $donnees = [$idp];
            $stmt2 = $connexion->prepare($requete2);
            $stmt2->execute($donnees);

            $reponse['OK'] = true;
            $reponse['msg'] = "Réussite de la selection d'un plan";

        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Problème pour la selection d'un plan";
        } finally {
            unset($connexion);
            return json_encode($reponse);
        }
    }

    function MdlP_getSelected(): string
    {
        global $reponse;
        $connexion = DbConnexion::getDBConnexion();
        $requette = "SELECT * FROM Plan WHERE idm=? AND isSelected=1";
        try {
            $donnee = [$_SESSION["idm"]];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnee);
            $reponse['plan'] = $stmt->fetchObject();
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = $e->getMessage();
        } finally {
            unset($connexion);
            return json_encode($reponse);
        }
    }
}
?>