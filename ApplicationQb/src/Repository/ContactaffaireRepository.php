<?php

namespace App\Repository;

use App\Entity\Contactaffaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Contactaffaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contactaffaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contactaffaire[]    findAll()
 * @method Contactaffaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactaffaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contactaffaire::class);
    }

    // /**
    //  * @return Contactaffaire[] Returns an array of Contactaffaire objects
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
    public function findOneBySomeField($value): ?Contactaffaire
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
