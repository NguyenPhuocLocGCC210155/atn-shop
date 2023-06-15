<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function save(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Product[] Returns an array of Customer objects
     */
    public function findProduct($name): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM product WHERE name LIKE :name";
        $re = $conn->executeQuery($sql, ['name' => '%' . $name . '%']);
        return $re->fetchAllAssociative();
    }

    public function addProduct($name,$img,$price,$des,$quan,$cat,$sup): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "INSERT INTO `product` (`id`, `name`, `img`, `price`, `des`, `quantity`, `cat_id`, `sup_id`) VALUES (NULL, :name, :img, :price, :des, :quan, :cat, :sup);";
        $re = $conn->executeQuery($sql, ['name' => $name,'img'=>$img,'price'=>$price,'des'=>$des,'quan'=>$quan,'cat'=>$cat,'sup'=>$sup]);
        return $re->fetchAllAssociative();
    }

    public function allProduct(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "Select * FROM product";
        $re = $conn->executeQuery($sql);
        return $re->fetchAllAssociative();
    }

//    /**
//     * @return Product[] Returns an array of Product objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Product
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
