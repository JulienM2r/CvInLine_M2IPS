<?php

namespace App\Repository;

use App\Entity\FrameworkLogiciel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FrameworkLogiciel|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrameworkLogiciel|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrameworkLogiciel[]    findAll()
 * @method FrameworkLogiciel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrameworkLogicielRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrameworkLogiciel::class);
    }

    // /**
    //  * @return FrameworkLogiciel[] Returns an array of FrameworkLogiciel objects
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
    public function findOneBySomeField($value): ?FrameworkLogiciel
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
