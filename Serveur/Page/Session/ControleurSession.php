<?php

class ControleurSession
{
    static private $instanceCtr = null;
    private $reponse;

    private function __construct()
    {
    }

    // Retourne le singleton du modèle 
    static function getControleurSession(): ControleurSession
    {
        if (self::$instanceCtr == null) {
            self::$instanceCtr = new ControleurSession();
        }
        return self::$instanceCtr;
    }

    function Ctr_getVariables()
    {
        $reponse['success'] = true;
        try {
            foreach ($_SESSION as $key => $val) {
                if ($val !== Null) {
                    $reponse[$key] = $val;
                }
            }
        } catch (Exception $e) {
            $reponse['success'] = false;
        } finally {
            return json_encode($reponse);
        }
    }

    function Ctr_Actions()
    {
        $action = $_POST['action'];
        switch ($action) {
            case "get_variables":
                return $this->Ctr_getVariables();
        }
    }
}
?>