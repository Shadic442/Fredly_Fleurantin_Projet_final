<?php
class Plan implements JsonSerializable
{
  private $idp;
  private $idm;
  private $nom;
  private $isSelected;

  function __construct($idp, $idm, $nom, $isSelected)
  {
    $this->idp = $idp;
    $this->idm = $idm;
    $this->nom = $nom;
    $this->isSelected = $isSelected;
  }

  public function getIdp()
  {
    return $this->idp;
  }
  public function setIdp($idp)
  {
    $this->idp = $idp;
  }

  public function getIdm()
  {
    return $this->idm;
  }
  public function setIdm($idm)
  {
    $this->idm = $idm;
  }

  public function getNom()
  {
    return $this->nom;
  }
  public function setNom($nom)
  {
    $this->nom = $nom;
  }

  public function getIsSelected()
  {
    return $this->isSelected;
  }
  public function setIsSelected($isSelected)
  {
    $this->isSelected = $isSelected;
  }

  // all getters / setters for the other properties

  public function jsonSerialize()
  {
    return (object) get_object_vars($this);
  }
}
?>