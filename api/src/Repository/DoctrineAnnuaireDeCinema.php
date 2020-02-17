<?php
namespace App\Repository;

use App\Domain\AnnuaireDeCinemas;
use App\Entity\Cinema;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class DoctrineAnnuaireDeCinema extends ServiceEntityRepository implements AnnuaireDeCinemas
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cinema::class);
    }

    public function tousLesCinemas(): iterable
    {
        return $this->findAll();
    }

    public function obtenirCinemaParId(int $id): Cinema
    {
        return $this->find($id);
    }
}