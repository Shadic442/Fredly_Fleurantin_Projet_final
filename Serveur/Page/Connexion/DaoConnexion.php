<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare(strict_types=1);

require_once(__DIR__ . "../../../includes/dbconnexion.inc.php");
require_once("connexion.php");

class DaoConnexion
{
    static private $modelConnexion = null;
    private $reponse = array();
    private $dbconnexion = null;

    private function __construct()
    {
    }

    // Retourne le singleton du modèle 
    static function getDaoConnexion(): DaoConnexion
    {
        if (self::$modelConnexion == null) {
            self::$modelConnexion = new DaoConnexion();
        }
        return self::$modelConnexion;
    }

    function Mdl_Valider($courriel, $pass)
    {
        global $reponse;
        $dbconnexion = DBConnexion::getDBConnexion();
        try {
            $requete = "SELECT * FROM connexion WHERE courriel = ?";
            $stmt = $dbconnexion->prepare($requete);
            $stmt->execute([$courriel]);

            $reponse['success'] = False;
            if (!$ligne = $stmt->fetchObject()) {
                $reponse['msg'] = 'Email/Mot de passe incorrect!';
            } elseif ($ligne->etat == 'I') {
                $reponse['msg'] = 'Utilisateur inactif';
            } elseif ($ligne->pass != $pass) {
                $reponse['msg'] = 'Email/Mot de passe incorrect!';
            } else {
                $requete2 = "SELECT photo FROM Membre WHERE courriel = ?";
                $stmt2 = $dbconnexion->prepare($requete2);
                $stmt2->execute([$courriel]);

                $reponse['photo'] = $stmt2->fetchObject()->photo;
                $reponse['courriel'] = $courriel;
                $reponse['role'] = $ligne->role;
                $reponse['idm'] = $ligne->idm;
                $reponse['success'] = True;
            }
        } catch (Exception $e) {
            $reponse['success'] = False;
            $reponse['msg'] = "Problème pour valider la Connexion";
        } finally {
            return json_encode($reponse);
        }
    }


}