<?php
namespace App\Repository;

use App\Domain\AnnuaireDeCinemas;
use App\Entity\Cinema;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class DoctrineAnnuaireDeCinema extends ServiceEntityRepository implements AnnuaireDeCinemas
{
    private $registry;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cinema::class);
        $this->registry = $registry;
    }

    public function tousLesCinemas(): iterable
    {
        return $this->findAll();
    }

    public function obtenirCinemaParId(int $id): Cinema
    {
        return $this->find($id);
    }

    public function supprimerCinemaParId(int $id): bool
    {
        $cinema = $this->find($id);
        $manager = $this->getEntityManager();
        try {
            $manager->remove($cinema);
            $manager->flush();
            return true;
        } catch (ORMException $e) {
            return false;
        }
    }
}