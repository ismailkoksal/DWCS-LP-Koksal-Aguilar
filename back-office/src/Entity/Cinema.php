<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DoctrineAnnuaireDeCinema")
 */
class Cinema {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adresse;

    public function __construct(string $nom,string $adresse,string $description)
    {
        $this->nom=$nom;
        $this->description=$description;
        $this->adresse=$adresse;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(?string $nom)
    {
        $this->nom = $nom;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription(?string $description)
    {
        return $this->description = $description;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse)
    {
        return $this->adresse = $adresse;
    }
}