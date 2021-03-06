<?php

namespace App\Repository;

use App\Entity\Cours;
use App\Entity\Classe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cours|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cours|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cours[]    findAll()
 * @method Cours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cours::class);
    }

    public function getByDate(\Datetime $date, Classe $classe = null)
    {
        $from = new \DateTime($date->format("Y-m-d")." 00:00:00");
        $to   = new \DateTime($date->format("Y-m-d")." 23:59:59");

        $qb = $this->createQueryBuilder("e");
        $qb
            ->andWhere('e.dateHeureDebut BETWEEN :from AND :to')
            ->setParameter('from', $from )
            ->setParameter('to', $to)
        ;
        if($classe){
            $qb->andWhere('e.classe = :classe')->setParameter('classe',  $classe->getId() );
        }
        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function getByDateBetween(\Datetime $datedebut,\Datetime $datefin, Classe $classe = null)
    {
        $from = new \DateTime($datedebut->format("Y-m-d")." 00:00:00");
        $to   = new \DateTime($datefin->format("Y-m-d")." 23:59:59");

        $qb = $this->createQueryBuilder("e");
        $qb
            ->andWhere('e.dateHeureDebut BETWEEN :from AND :to')
            ->setParameter('from', $from )
            ->setParameter('to', $to)
        ;
        if($classe){
            $qb->andWhere('e.classe = :classe')->setParameter('classe',  $classe->getId() );
        }
        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function getInSameCreneau(\Datetime $datedebut,\Datetime $datefin)
    {
        $from = new \DateTime($datedebut->format("Y-m-d H:i:s"));
        $to   = new \DateTime($datefin->format("Y-m-d H:i:s"));

        $qb = $this->createQueryBuilder("e");
        $qb
            ->andWhere('e.dateHeureDebut BETWEEN :from AND :to')
            ->orWhere('e.dateHeureFin BETWEEN :from AND :to')
            ->setParameter('from', $from )
            ->setParameter('to', $to)
        ;
        $result = $qb->getQuery()->getResult();

        return $result;
    }
    // /**
    //  * @return Cours[] Returns an array of Cours objects
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
    public function findOneBySomeField($value): ?Cours
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
