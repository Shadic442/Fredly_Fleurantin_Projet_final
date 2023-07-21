<?php
class Exercice_Planifier implements JsonSerializable
{
    private $idep;
    private $idp;
    private $idj;
    private $ide;
    private $series;
    private $repetitions;
    private $poids;

    function __construct($idep, $idp, $idj, $ide, $series, $repetitions, $poids)
    {
        $this->idep = $idep;
        $this->idp = $idp;
        $this->idj = $idj;
        $this->ide = $ide;
        $this->series = $series;
        $this->repetitions = $repetitions;
        $this->poids = $poids;

    }

    public function getIdep()
    {
        return $this->idep;
    }
    public function setIdep($idep)
    {
        $this->idep = $idep;
    }

    public function getIdp()
    {
        return $this->idp;
    }
    public function setIdp($idp)
    {
        $this->idp = $idp;
    }
    public function getIdj()
    {
        return $this->idj;
    }
    public function setIdj($idj)
    {
        $this->idj = $idj;
    }
    public function getIde()
    {
        return $this->ide;
    }
    public function setIde($ide)
    {
        $this->ide = $ide;
    }

    public function getSeries()
    {
        return $this->series;
    }
    public function setSeries($series)
    {
        $this->series = $series;
    }
    public function getRepetitions()
    {
        return $this->repetitions;
    }
    public function setRepetitions($repetitions)
    {
        $this->repetitions = $repetitions;
    }
    public function getPoids()
    {
        return $this->poids;
    }
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    // all getters / setters for the other properties

    public function jsonSerialize()
    {
        return (object) get_object_vars($this);
    }
}
?>