<?php
define("SERVEUR", "localhost");
define("USAGER", "root");
define("PASS", "");
define("BD", "bdgigachad");
$connexion = new mysqli(SERVEUR, USAGER, PASS, BD);
if ($connexion->connect_errno) {
    echo "Problème connexion au serveur de bd";
    exit();
}