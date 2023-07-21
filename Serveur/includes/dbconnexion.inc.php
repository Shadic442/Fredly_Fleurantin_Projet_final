<?php

declare(strict_types=1);

require_once("env.inc.php");

// Patron de conception Singleton
class DBConnexion
{
    private static $dbconnexion = null;

    // Interdire de créer des objets Connexion par l'extérieur de la classe
    private function __construct()
    {
    }

    // Retourne le singleton de la connexion
    static function getDBConnexion(): PDO
    {
        if (self::$dbconnexion == null) {
            self::connecter();
        }
        return self::$dbconnexion;
    }

    // Créer la connexion
    private static function connecter(): void
    {
        global $SERVEUR, $BD, $USAGER, $PASS; // Définies dans le fichier "env.inc.php"
        try {
            $dns = "mysql:host=$SERVEUR;dbname=$BD";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            self::$dbconnexion = new PDO($dns, $USAGER, $PASS, $options);
        } catch (Exception $e) {
            echo $e->getMessage();
            echo "Probleme de connexion au serveur de bd";
            exit();
        }
    }
}