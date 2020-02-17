<?php 
namespace App\Domain;
use App\Entity\Cinema;

interface AnnuaireDeCinemas {
    public function tousLesCinemas():iterable;
    public function obtenirCinemaParId(int $id): Cinema;
    public function supprimerCinemaParId(int $id): bool;
}