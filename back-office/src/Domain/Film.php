<?php 
namespace App\Domain;

class Film {
    private $image;
    private $titre;
    private $detail;

    public function __construct(string $image, string $titre, string $detail) {
        $this->image = $image;
        $this->titre = $titre;
        $this->detail = $detail;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function getDetail(): string {
        return $this->titre;
    }
}