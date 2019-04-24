<?php

namespace App\Repository;

use App\Entity\Articlesysteme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Articlesysteme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Articlesysteme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Articlesysteme[]    findAll()
 * @method Articlesysteme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesystemeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Articlesysteme::class);
    }

    // /**
    //  * @return Articlesysteme[] Returns an array of Articlesysteme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Articlesysteme
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
