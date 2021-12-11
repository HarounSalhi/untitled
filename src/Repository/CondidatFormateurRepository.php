<?php

namespace App\Repository;

use App\Entity\CondidatFormateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CondidatFormateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method CondidatFormateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method CondidatFormateur[]    findAll()
 * @method CondidatFormateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CondidatFormateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CondidatFormateur::class);
    }

    // /**
    //  * @return CondidatFormateur[] Returns an array of CondidatFormateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CondidatFormateur
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
