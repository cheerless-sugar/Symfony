<?php

namespace App\Repository;

use App\Entity\ActorPerformance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActorPerformance>
 *
 * @method ActorPerformance|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActorPerformance|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActorPerformance[]    findAll()
 * @method ActorPerformance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActorPerformanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActorPerformance::class);
    }

    public function save(ActorPerformance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ActorPerformance $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function findOneByActorAndPerformance(int $actor, int $performance): ?ActorPerformance
    {
        $qb = $this->createQueryBuilder('a');

        if ($actor) {
            $qb->andWhere('a.actor = :actor')
                ->setParameter('actor', $actor);
        }

        if ($performance) {

            $qb->andWhere('a.performance = :performance')
                ->setParameter('performance', $performance);
        }

        return $qb
            ->getQuery()
            ->getOneOrNullResult();
    }

    //    /**
    //     * @return ActorPerformance[] Returns an array of ActorPerformance objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

}
