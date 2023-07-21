<?php
session_start();
session_unset(); //Supprimer les variables de session
session_destroy(); //Supprimer la session
header('Location: ../../../index.php');
exit;
?>