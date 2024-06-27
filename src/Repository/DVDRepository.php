<?php

namespace App\Repository;

use App\Entity\DVD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DVD|null find($id, $lockMode = null, $lockVersion = null)
 * @method DVD|null findOneBy(array $criteria, array $orderBy = null)
 * @method DVD[]    findAll()
 * @method DVD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

/**
 * @extends ServiceEntityRepository<DVD>
 */
class DVDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DVD::class);
    }


    // Format
    public function findByFormat($format)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.format = :format')
            ->setParameter('format', $format)
            ->orderBy('d.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // ID
    public function findById($id)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // Film
    public function findByFilm($filmId)
    {
        return $this->createQueryBuilder('d')
            ->innerJoin('d.film', 'f')
            ->andWhere('f.id = :filmId')
            ->setParameter('filmId', $filmId)
            ->orderBy('d.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // Price
    public function findByPrice($minPrice, $maxPrice)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.price >= :minPrice')
            ->andWhere('d.price <= :maxPrice')
            ->setParameter('minPrice', $minPrice)
            ->setParameter('maxPrice', $maxPrice)
            ->orderBy('d.price', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // Description
    public function findByFilmDescription($description)
    {
        return $this->createQueryBuilder('d')
            ->innerJoin('d.film', 'f')
            ->andWhere('f.description LIKE :description')
            ->setParameter('description', '%' . $description . '%')
            ->orderBy('d.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // Director
    public function findByFilmDirector($director)
    {
        return $this->createQueryBuilder('d')
            ->innerJoin('d.film', 'f')
            ->andWhere('f.director LIKE :director')
            ->setParameter('director', '%' . $director . '%')
            ->orderBy('d.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // Multi criteria
    public function findDVDs($format, $minPrice, $maxPrice, $description, $director)
    {
        $qb = $this->createQueryBuilder('d')
            ->innerJoin('d.film', 'f');

        if ($format) {
            $qb->andWhere('d.format = :format')
                ->setParameter('format', $format);
        }
        if ($minPrice !== null) {
            $qb->andWhere('d.price >= :minPrice')
                ->setParameter('minPrice', $minPrice);
        }
        if ($maxPrice !== null) {
            $qb->andWhere('d.price <= :maxPrice')
                ->setParameter('maxPrice', $maxPrice);
        }
        if ($description) {
            $qb->andWhere('f.description LIKE :description')
                ->setParameter('description', '%' . $description . '%');
        }
        if ($director) {
            $qb->andWhere('f.director LIKE :director')
                ->setParameter('director', '%' . $director . '%');
        }

        return $qb->orderBy('d.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
//    /**
//     * @return DVD[] Returns an array of DVD objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DVD
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
