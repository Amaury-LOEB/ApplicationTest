<?php

namespace App\Repository;

use App\Entity\GroupeSysteme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GroupeSysteme|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupeSysteme|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupeSysteme[]    findAll()
 * @method GroupeSysteme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupeSystemeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GroupeSysteme::class);
    }

    // /**
    //  * @return GroupeSysteme[] Returns an array of GroupeSysteme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupeSysteme
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
