<?php
class Exercice implements JsonSerializable
{
    private $ide;
    private $idc;
    private $nom;
    private $description;
    private $photo;

    function __construct($ide, $idc, $nom, $description, $photo)
    {
        $this->ide = $ide;
        $this->idc = $idc;
        $this->nom = $nom;
        $this->description = $description;
        $this->photo = $photo;
    }

    public function getIde()
    {
        return $this->ide;
    }
    public function setIde($ide)
    {
        $this->ide = $ide;
    }

    public function getIdc()
    {
        return $this->idc;
    }
    public function setIdc($idc)
    {
        $this->idc = $idc;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setCourriel($description)
    {
        $this->description = $description;
    }

    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    // all getters / setters for the other properties

    public function jsonSerialize()
    {
        return (object) get_object_vars($this);
    }
}
?>