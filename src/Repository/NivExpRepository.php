<?php

namespace App\Repository;

use App\Entity\NivExp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NivExp|null find($id, $lockMode = null, $lockVersion = null)
 * @method NivExp|null findOneBy(array $criteria, array $orderBy = null)
 * @method NivExp[]    findAll()
 * @method NivExp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NivExpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NivExp::class);
    }

    // /**
    //  * @return NivExp[] Returns an array of NivExp objects
    //  */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    
    public function findOneBySomeField($value): ?NivExp
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.name = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
