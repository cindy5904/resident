<?php

namespace App\Repository;

use App\Entity\Residents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Residents>
 *
 * @method Residents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Residents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Residents[]    findAll()
 * @method Residents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResidentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Residents::class);
    }

    public function save(Residents $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Residents $entity, bool $flush = false): void
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
//     * @return Residents[] Returns an array of Residents objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Residents
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
