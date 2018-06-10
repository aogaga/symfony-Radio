<?php

namespace App\Repository;

use App\Entity\Stations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Stations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stations[]    findAll()
 * @method Stations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StationsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stations::class);
    }

//    /**
//     * @return Stations[] Returns an array of Stations objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Stations
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}