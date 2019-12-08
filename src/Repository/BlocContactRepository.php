<?php

namespace App\Repository;

use App\Entity\BlocContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BlocContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlocContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlocContact[]    findAll()
 * @method BlocContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlocContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlocContact::class);
    }

    // /**
    //  * @return BlocContact[] Returns an array of BlocContact objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlocContact
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
