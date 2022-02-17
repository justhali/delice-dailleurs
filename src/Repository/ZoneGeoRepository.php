<?php

namespace App\Repository;

use App\Entity\ZoneGeo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ZoneGeo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ZoneGeo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ZoneGeo[]    findAll()
 * @method ZoneGeo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZoneGeoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ZoneGeo::class);
    }

    // /**
    //  * @return ZoneGeo[] Returns an array of ZoneGeo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ZoneGeo
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
