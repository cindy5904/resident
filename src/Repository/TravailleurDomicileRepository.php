<?php

namespace App\Repository;

use App\Entity\TravailleurDomicile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TravailleurDomicile>
 *
 * @method TravailleurDomicile|null find($id, $lockMode = null, $lockVersion = null)
 * @method TravailleurDomicile|null findOneBy(array $criteria, array $orderBy = null)
 * @method TravailleurDomicile[]    findAll()
 * @method TravailleurDomicile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TravailleurDomicileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TravailleurDomicile::class);
    }

    public function save(TravailleurDomicile $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TravailleurDomicile $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TravailleurDomicile[] Returns an array of TravailleurDomicile objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TravailleurDomicile
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
