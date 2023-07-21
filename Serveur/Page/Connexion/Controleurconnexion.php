<?php

require_once("connexion.php");
require_once("DaoConnexion.php");

class ControleurConnexion
{
    static private $instanceCtr = null;
    private $reponse;

    private function __construct()
    {
    }

    // Retourne le singleton du modèle 
    static function getControleurConnexion(): ControleurConnexion
    {
        if (self::$instanceCtr == null) {
            self::$instanceCtr = new ControleurConnexion();
        }
        return self::$instanceCtr;
    }

    function Ctr_Valider()
    {
        $reponse = DaoConnexion::getDaoConnexion()->Mdl_Valider($_POST['courrielc'], $_POST['passwordc']);
        $res = json_decode($reponse);
        if ($res->success == 1) {
            $_SESSION['idm'] = $res->idm;
            $_SESSION['courriel'] = $res->courriel;
            $_SESSION['role'] = $res->role;
            $_SESSION['photo'] = $res->photo;
        }
        return $reponse;
    }


    function Ctr_Actions()
    {
        $action = $_POST['action'];
        switch ($action) {
            case "valider":
                return $this->Ctr_Valider();
            case "modifier":
                // code ici
                break;
            case "enlever":
            // code ici
        }
    }
}