<?php
class Membre implements JsonSerializable
{
  private $idm;
  private $prenom;
  private $nom;
  private $courriel;
  private $daten;
  private $sexe;
  private $photo;
  private $telephone;

  function __construct($idm, $prenom, $nom, $courriel, $daten, $sexe, $photo, $telephone)
  {
    $this->idm = $idm;
    $this->prenom = $prenom;
    $this->nom = $nom;
    $this->courriel = $courriel;
    $this->daten = $daten;
    $this->sexe = $sexe;
    $this->photo = $photo;
    $this->telephone = $telephone;
  }

  public function getIdm()
  {
    return $this->idm;
  }
  public function setIdm($idm)
  {
    $this->idm = $idm;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
  }

  public function getNom()
  {
    return $this->nom;
  }
  public function setNom($nom)
  {
    $this->nom = $nom;
  }
  public function getCourriel()
  {
    return $this->courriel;
  }
  public function setCourriel($courriel)
  {
    $this->courriel = $courriel;
  }
  public function getDaten()
  {
    return $this->daten;
  }
  public function setDaten($daten)
  {
    $this->daten = $daten;
  }

  public function getSexe()
  {
    return $this->sexe;
  }
  public function setSexe($sexe)
  {
    $this->sexe = $sexe;
  }
  public function getPhoto()
  {
    return $this->photo;
  }
  public function setPhoto($photo)
  {
    $this->photo = $photo;
  }
  public function getTelephone()
  {
    return $this->telephone;
  }
  public function setTelephone($telephone)
  {
    $this->telephone = $telephone;
  }

  // all getters / setters for the other properties

  public function jsonSerialize()
  {
    return (object) get_object_vars($this);
  }
}
?>