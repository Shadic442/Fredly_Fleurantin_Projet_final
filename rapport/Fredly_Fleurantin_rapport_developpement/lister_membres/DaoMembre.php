<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare(strict_types=1);

require_once(__DIR__ . "/../../includes/dbconnexion.inc.php");
require_once("Membre.php");

class DaoMembre
{
    static private $modelMembre = null;
    private $reponse = array();
    private $connexion = null;

    private function __construct()
    {
    }

    // Retourne le singleton du modèle 
    static function getDaoMembre(): DaoMembre
    {
        if (self::$modelMembre == null) {
            self::$modelMembre = new DaoMembre();
        }
        return self::$modelMembre;
    }

    function MdlM_getAll(): string
    {
        global $reponse;
        $connexion = DbConnexion::getDBConnexion();
        $requette = "SELECT connexion.idm, connexion.courriel, membre.prenom, membre.nom, connexion.etat, connexion.role 
        FROM connexion JOIN membre ON membre.idm = connexion.idm WHERE role='M'";
        try {
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $reponse['OK'] = true;
            $reponse['msg'] = "";
            $reponse['listeMembres'] = array();
            $reponse['listeMembres'] = $stmt->fetchAll();
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = $e->getMessage();
        } finally {
            unset($connexion);
            return json_encode($reponse);
        }
    }

    function MdlM_ValiderInscription($courriel): string
    {
        global $reponse;
        $dbconnexion = DbConnexion::getDBConnexion();

        try {
            $requete = "SELECT * FROM Membre WHERE courriel = ?";
            $stmt = $dbconnexion->prepare($requete);
            $stmt->execute([$courriel]);
            if ($stmt->fetchObject()) {
                $reponse['OK'] = false;
                $reponse['msg'] = "ce courriel est déjà utilisé!";
            } else {
                $reponse['OK'] = true;
                $reponse['msg'] = "Membre valide";
            }
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Problème pour valider le Membre";
        } finally {
            return json_encode($reponse);
        }
    }

    function MdlM_EnregistrerMembre(Membre $membre, $pass): string
    {

        $connexion = DbConnexion::getDBConnexion();
        $requette = "INSERT INTO membre VALUES(0,?,?,?,?,?,?,?)";
        try {

            $donnees = [$membre->getPrenom(), $membre->getNom(), $membre->getCourriel(), $membre->getDaten(), $membre->getSexe(), $membre->getPhoto(), $membre->getTelephone()];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);

            $idm = $connexion->lastInsertId();

            $requette = "INSERT INTO connexion VALUES (?,?,?,'A','M')";
            $donnees = [$idm, $membre->getCourriel(), $pass];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);

            $this->reponse['OK'] = true;
            $this->reponse['msg'] = "Membre bien enregistre";
        } catch (Exception $e) {
            $this->reponse['OK'] = false;
            $this->reponse['msg'] = "Probléme pour enregistrer le Membre";
        } finally {
            unset($connexion);
            return json_encode($this->reponse);
        }
    }


    function MdlM_modifierEtatMembre($inputIdm)
    {
        global $reponse;
        $reponse = array();
        $connexion = DbConnexion::getDBConnexion();
        $requette = "UPDATE connexion SET etat = CASE WHEN etat = 'A' THEN 'I'
                                                    ELSE 'A'
                                                END WHERE idm=?";
        try {
            $donnees = [$inputIdm];
            $stmt = $connexion->prepare($requette);
            $stmt->execute($donnees);
            $reponse['OK'] = true;
            $reponse['msg'] = "Réussite de la modification de l'état du membre";
        } catch (Exception $e) {
            $reponse['OK'] = false;
            $reponse['msg'] = "Problème pour la modification de l'état du membre";
        } finally {
            unset($connexion);
            return json_encode($reponse);
        }
    }

    function MdlM_getMembre($courriel): string
    {
        global $response;
        $dbconnexion = DBConnexion::getDBConnexion();

        try {
            $requete = "SELECT * FROM Membre WHERE courriel = ?";
            $stmt = $dbconnexion->prepare($requete);
            $stmt->execute([$courriel]);
            $response['success'] = true;
            $response['membre'] = null;
            if ($ligne = $stmt->fetchObject()) {
                $response['connexion'] = null;
                $requete2 = "SELECT pass FROM Connexion WHERE courriel = ?";
                $stmt2 = $dbconnexion->prepare($requete2);
                $stmt2->execute([$courriel]);
                if ($ligne2 = $stmt2->fetchObject()) {
                    $response['membre'] = $ligne;
                    $response['connexion'] = $ligne2;
                } else {
                    $response['success'] = false;
                }
            } else {
                $response['success'] = false;
            }
        } catch (Exception $e) {
            $tab['success'] = false;
        } finally {
            return json_encode($response);
        }
    }


    function MdlM_modifierprofile(Membre $membre): string
    {
        global $reponse;
        $dbconnexion = DBConnexion::getDBConnexion();

        try {
            $dossier = "serveur/pages/membre/photos/";
            $default = "logo.png";
            $nouvelleImage = $default;

            $requete = "SELECT photo FROM membre WHERE idm=?";
            $stmt = $dbconnexion->prepare($requete);
            $stmt->execute([$membre->getIdm()]);
            
            $requete = "UPDATE membre SET prenom=?, nom=?, sexe=?, daten=?, photo=?, telephone=? WHERE idm=?";
            $donnees = [
                $membre->getPrenom(),
                $membre->getNom(),
                $membre->getSexe(),
                $membre->getDaten(),
                $membre->getPhoto(),
                $membre->getTelephone(),
                $membre->getIdm()
            ];
            $stmt = $dbconnexion->prepare($requete);
            $stmt->execute($donnees);

            $reponse['nouvellePhoto'] = $nouvelleImage;
            $reponse['success'] = true;
            $reponse['msg'] = "Profil modifié!";
            $_SESSION['photo'] = $membre->getPhoto();
        } catch (Exception $e) {
            $reponse['success'] = false;
            $reponse['msg'] = "Problème pour modifier le Profil";
            //$reponse['msg'] = $e->getMessage();
        } finally {
            return json_encode($reponse);
        }
    }
}
?>