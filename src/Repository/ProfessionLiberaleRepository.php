<?php

namespace App\Repository;

use App\Entity\ProfessionLiberale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfessionLiberale>
 *
 * @method ProfessionLiberale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfessionLiberale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfessionLiberale[]    findAll()
 * @method ProfessionLiberale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionLiberaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfessionLiberale::class);
    }

    public function save(ProfessionLiberale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProfessionLiberale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ProfessionLiberale[] Returns an array of ProfessionLiberale objects
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

//    public function findOneBySomeField($value): ?ProfessionLiberale
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
