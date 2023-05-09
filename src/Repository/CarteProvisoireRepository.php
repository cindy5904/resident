<?php

namespace App\Repository;

use App\Entity\CarteProvisoire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarteProvisoire>
 *
 * @method CarteProvisoire|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteProvisoire|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteProvisoire[]    findAll()
 * @method CarteProvisoire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteProvisoireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteProvisoire::class);
    }

    public function save(CarteProvisoire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CarteProvisoire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findById()
    {
        return $this->createQueryBuilder("c")
                        ->orderBy("c.id", "DESC");
    }

//    /**
//     * @return CarteProvisoire[] Returns an array of CarteProvisoire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarteProvisoire
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
