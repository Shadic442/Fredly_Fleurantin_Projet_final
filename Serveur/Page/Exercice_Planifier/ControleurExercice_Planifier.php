<?php

require_once("Exercice_Planifier.php");
require_once("DaoExercice_Planifier.php");

class ControleurExercice_Planifier
{
    static private $instanceCtr = null;
    private $reponse;

    private function __construct()
    {
    }

    // Retourne le singleton du modèle 
    static function getControleurExercice_Planifier(): ControleurExercice_Planifier
    {
        if (self::$instanceCtr == null) {
            self::$instanceCtr = new ControleurExercice_Planifier();
        }
        return self::$instanceCtr;
    }

    function CtrEP_getAll()
    {
        $idp = $_POST['idp'];
        return DaoExercice_Planifier::getDaoExercice_Planifier()->MdlEP_getAllExercice_Planifier($idp);
    }

    function CtrEP_EnregistrerExercice_Planifier()
    {

        $exercice_planifie = new Exercice_Planifier(0, $_POST['idp'], $_POST['idj'],
         $_POST['ide'], $_POST['series'], $_POST['repetitions'], $_POST['poids']);
        return DaoExercice_Planifier::getDaoExercice_Planifier()->MdlEP_EnregistrerExercice_Planifier($exercice_planifie);
    }

    function CtrEP_SupprimerExercice_Planifier()
    {
        return DaoExercice_Planifier::getDaoExercice_Planifier()->MdlEP_SupprimerExercice_Planifier($_POST['idep']);
    }


    function CtrEP_Actions()
    {
        $action = $_POST['action'];
        switch ($action) {
            case "getAll";
                return $this->CtrEP_getAll();
            case "ajouter";
                return $this->CtrEP_EnregistrerExercice_Planifier();
            case "supprimer";
                return $this->CtrEP_SupprimerExercice_Planifier();
            default;
                break;
        }
        // Retour de la réponse au client
    }
}