<?php

namespace App\Repository;

use App\Entity\FilmAAffiche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Domain\ProgrammeDeCinema;
use App\Entity\Cinema;
use App\Entity\Film;

/**
 * @method FilmAAffiche|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilmAAffiche|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilmAAffiche[]    findAll()
 * @method FilmAAffiche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctrineProgrammeDeCinemas extends ServiceEntityRepository implements ProgrammeDeCinema
{
    private $managerRegistry;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FilmAAffiche::class);
        $this->managerRegistry = $registry;
    }

    public function getFilmsPourCinema(Cinema $cinema): iterable
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT fa, f
            FROM App\Entity\FilmAAffiche fa
            JOIN fa.film f
            WHERE fa.cinema = :cinema'
        )->setParameter('cinema', $cinema);
        return $query->getArrayResult();
    }

    public function mettreFilmAAffiche(Film $film, Cinema $cinema): bool
    {
        $filmAAffiche = new FilmAAffiche($cinema, $film);
        $manager = $this->managerRegistry->getManagerForClass(get_class($filmAAffiche));
        $manager->persist($filmAAffiche);
        $manager->flush();
        return true;
    }

    public function retirerFilmDeLAffiche(Film $film, Cinema $cinema): bool
    {
        $afficheRequired = $this->findBy(['cinema' => $cinema, 'film' => $film]);
        $manager = $this->managerRegistry->getManagerForClass(FilmAAffiche::class);
        $manager->remove($afficheRequired[0]);
        $manager->flush();
        return true;
    }

    // /**
    //  * @return FilmAAffiche[] Returns an array of FilmAAffiche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FilmAAffiche
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
