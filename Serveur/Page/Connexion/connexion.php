<?php

declare(strict_types=1);

class Connexion
{
    //attributs de la classe
    private int $idm;
    private string $courriel;
    private string $pass;
    private string $etat;
    private string $role;

    //constructeur
    public function __construct(
        int $idm,
        string $courriel,
        string $pass,
        string $etat,
        string $role
    )
    {
        $this->idm = $idm;
        $this->setCourriel($courriel);
        $this->setPass($pass);
        $this->setEtat($etat);
        $this->setRole($role);
    }

    //getters
    public function getIdm(): int
    {
        return $this->idm;
    }
    public function getCourriel(): string
    {
        return $this->courriel;
    }
    public function getPass(): string
    {
        return $this->pass;
    }
    public function getEtat(): string
    {
        return $this->etat;
    }
    public function getRole(): string
    {
        return $this->role;
    }

    //setters

    public function setCourriel(string $courriel): void
    {
        $this->courriel = $courriel;
    }
    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }
    public function setEtat(string $etat): void
    {
        $this->etat = $etat;
    }
    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}