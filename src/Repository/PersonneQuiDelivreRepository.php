<?php

namespace App\Repository;

use App\Entity\PersonneQuiDelivre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PersonneQuiDelivre>
 *
 * @method PersonneQuiDelivre|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonneQuiDelivre|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonneQuiDelivre[]    findAll()
 * @method PersonneQuiDelivre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneQuiDelivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonneQuiDelivre::class);
    }

    public function save(PersonneQuiDelivre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PersonneQuiDelivre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PersonneQuiDelivre[] Returns an array of PersonneQuiDelivre objects
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

//    public function findOneBySomeField($value): ?PersonneQuiDelivre
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
