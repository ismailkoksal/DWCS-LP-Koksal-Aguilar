<?php
namespace App\Domain\Query;
use App\Domain\AnnuaireDeCinemas;

class ListeCinemasHandler {
    private $annuaire;

    public function __construct(AnnuaireDeCinemas $annuaireDeCinemas)
    {
        $this->annuaire=$annuaireDeCinemas;
    }

    public function handle(ListeCinemasQuery $requete):iterable
    {
        return $this->annuaire->tousLesCinemas();
    }

    public function createCinema(Cinema $cinema)
    {
        $this->annuaireDeCinemas->creerCinema($cinema);
    }

    public function getCinemaById(int $id): Cinema 
    {
        return $this->annuaireDeCinemas->obtenirCinemaParId($id);
    }

    public function deleteCinema(int $id): bool
    {
        return $this->annuaireDeCinemas->supprimerCinemaParId($id);
    }
}