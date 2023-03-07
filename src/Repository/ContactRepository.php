<?php

namespace App\Repository;

use App\Entity\DB\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contact>
 *
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function save(Contact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Contact $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // public function findUserInfoById(int $id)
    // {
    //     $select = $this->createQueryBuilder('c')
    //     ->select('u.nom, u.prenom,u.idNom')
    //     ->join('App\Entity\DB\Utilisateur', 'u', 'WITH', 'c.idNom = u.idNom')
    //     ->where('c.idNom = :id')
    //     ->setMaxResults(1)
    //     ->setParameter('id', $id);
    //     return $select->getQuery()->getSingleResult();
    // } 

    public function findContactsInfoById(int $id)
    {
        $select = $this->createQueryBuilder('c')
        ->select('u.nom, u.prenom, u.email, u.idNom')
        ->join('App\Entity\DB\Utilisateur', 'u', 'WITH', 'c.idContact = u.idNom')
        ->where('c.idNom = :id')
        ->setMaxResults(30)
        ->setParameter('id', $id);
        return $select->getQuery()->getResult();
    }  

//    /**
//     * @return Contact[] Returns an array of Contact objects
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

//    public function findOneBySomeField($value): ?Contact
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
