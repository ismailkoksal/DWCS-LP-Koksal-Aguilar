<?php 
namespace App\Repository;

use App\Domain\CatalogueDeFilms;
use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DoctrineCatalogueDeFilms extends ServiceEntityRepository implements CatalogueDeFilms {
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Film::class);
    }

    public function tousLesFilms(): iterable {
        return $this->findAll();
    }

    public function obtenirUnFilm(int $idFilm): Film {
        return $this->find($idFilm);
    }
}