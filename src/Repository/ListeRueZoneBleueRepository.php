<?php

namespace App\Repository;

use App\Entity\ListeRueZoneBleue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListeRueZoneBleue>
 *
 * @method ListeRueZoneBleue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeRueZoneBleue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeRueZoneBleue[]    findAll()
 * @method ListeRueZoneBleue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeRueZoneBleueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeRueZoneBleue::class);
    }

    public function save(ListeRueZoneBleue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ListeRueZoneBleue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ListeRueZoneBleue[] Returns an array of ListeRueZoneBleue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListeRueZoneBleue
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
