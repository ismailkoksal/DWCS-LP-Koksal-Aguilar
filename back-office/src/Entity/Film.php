<?php 
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DoctrineCatalogueDeFilms")
 */
class Film {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $detail;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image;

    public function __construct(string $titre, string $detail, string $image) {
        $this->titre = $titre;
        $this->detail = $detail;
        $this->image = $image;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getDetail(): string {
        return $this->detail;
    }
}