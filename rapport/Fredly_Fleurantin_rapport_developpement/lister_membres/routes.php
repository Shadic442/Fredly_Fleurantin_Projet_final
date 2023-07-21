<?php
// Au début de PHP: Déclarer les types dans les paramétres des fonctions
declare(strict_types=1);
session_start();

$table = $_POST['table'];
switch ($table) {
    case "membre":
        require_once(__DIR__ . "/serveur/Page/Membre/ControleurMembre.php");
        $instanceCtr = ControleurMembre::getControleurMembre();
        echo $instanceCtr->CtrM_Actions();
        break;
    case "connexion":
        require_once(__DIR__ . "/Serveur/Page/Connexion/Controleurconnexion.php");
        $instanceCtr = ControleurConnexion::getControleurConnexion();
        echo $instanceCtr->Ctr_Actions();
        break;
    case "exercice":
        require_once(__DIR__ . "/Serveur/Page/Exercice/Controleurexercice.php");
        $instanceCtr = ControleurExercice::getControleurExercice();
        echo $instanceCtr->CtrE_Actions();
        break;
    case "plan":
        require_once(__DIR__ . "/Serveur/Page/Plan/ControleurPlan.php");
        $instanceCtr = ControleurPlan::getControleurPlan();
        echo $instanceCtr->CtrP_Actions();
        break;
    case "exercice_planifier":
        require_once(__DIR__ . "/Serveur/Page/Exercice_Planifier/ControleurExercice_Planifier.php");
        $instanceCtr = ControleurExercice_Planifier::getControleurExercice_Planifier();
        echo $instanceCtr->CtrEP_Actions();
        break;

    default:
        echo ("<script>console.log('PHP: " . "Passe Pas" . "');</script>");
        echo "table inexistante";
}
?>