<?php

require_once("Plan.php");
require_once("DaoPlan.php");

class ControleurPlan
{
    static private $instanceCtr = null;
    private $reponse;

    private function __construct()
    {

    }

    // Retourne le singleton du modèle 
    static function getControleurPlan(): ControleurPlan
    {
        if (self::$instanceCtr == null) {
            self::$instanceCtr = new ControleurPlan();
        }
        return self::$instanceCtr;
    }

    function CtrP_GetAllByIdm()
    {
        return DaoPlan::getDaoPlan()->MdlP_getAllByIdm();
    }

    function CtrP_EnregistrerPlan()
    {
        $plan = new Plan(0, $_POST['idm'], $_POST['nom'],0);
        return DaoPlan::getDaoPlan()->Mdlp_EnregistrerPlan($plan);
    }

    function CtrP_SupprimerPlan()
    {
        $idp = $_POST['idp'];
        return DaoPlan::getDaoPlan()->MdlP_SupprimerPlan($idp);
    }

    function CtrP_ChangerSelect()
    {
        return DaoPlan::getDaoPlan()->MdlP_modifierSelect($_POST['idp']);
    }

    function CtrP_getSelected()
    {
        return DaoPlan::getDaoPlan()->MdlP_getSelected();
    }

    function CtrP_Actions()
    {
        $action = $_POST['action'];
        switch ($action) {
            case "enregistrerPlan";
                return $this->CtrP_EnregistrerPlan();
            case "listerPlanByIdm":
                return $this->CtrP_GetAllByIdm();
            case "supprimer":
                return $this->CtrP_SupprimerPlan();
            case "changerSelect":
                return $this->CtrP_ChangerSelect();
            case "getSelected":
                return $this->CtrP_getSelected();
        }
        // Retour de la réponse au client
    }
}
?>