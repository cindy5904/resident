<?php

namespace App\Repository;

use App\Entity\ListeEntreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListeEntreprise>
 *
 * @method ListeEntreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeEntreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeEntreprise[]    findAll()
 * @method ListeEntreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeEntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeEntreprise::class);
    }

    public function save(ListeEntreprise $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ListeEntreprise $entity, bool $flush = false): void
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
//     * @return ListeEntreprise[] Returns an array of ListeEntreprise objects
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

//    public function findOneBySomeField($value): ?ListeEntreprise
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
