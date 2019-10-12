<?php

namespace App\Repository;

use App\Entity\CampsTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CampsTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampsTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampsTranslation[]    findAll()
 * @method CampsTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampsTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CampsTranslation::class);
    }

    // /**
    //  * @return CampsTranslation[] Returns an array of CampsTranslation objects
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
    public function findOneBySomeField($value): ?CampsTranslation
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
