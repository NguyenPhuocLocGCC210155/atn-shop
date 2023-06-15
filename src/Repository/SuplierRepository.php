<?php

namespace App\Repository;

use App\Entity\Suplier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Suplier>
 *
 * @method Suplier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Suplier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Suplier[]    findAll()
 * @method Suplier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuplierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Suplier::class);
    }

    public function save(Suplier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Suplier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Suplier[] Returns an array of Customer objects
     */
    public function findAll(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM `Suplier`";
        $re = $conn->executeQuery($sql);
        return $re->fetchAllAssociative();
    }

//    /**
//     * @return Suplier[] Returns an array of Suplier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Suplier
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
