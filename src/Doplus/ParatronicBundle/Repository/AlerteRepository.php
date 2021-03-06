<?php

namespace Doplus\ParatronicBundle\Repository;

/**
 * AlerteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AlerteRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByStationIdForAlerte($id, $user) {
        $qb = $this->createQueryBuilder('a')
                    ->leftJoin('a.capteur', 'ac')
                    ->leftJoin('ac.station', 'ast')
                    ->leftJoin('a.utilisateur', 'au')
                    ->addSelect('ac')
                    ->addSelect('ast')
                    ->addSelect('au')
                    ->where("ast.id = $id")
                    ->andWhere('au.alerte = 1')
                    ->andWhere("au.id = $user")
                    ->andWhere('a.niveauAlerte = 1')
                ;
        return $qb->getQuery()->getResult();
    }
    
    public function findByStationIdForPreAlerte($id, $user) {
        $qb = $this->createQueryBuilder('a')
                    ->leftJoin('a.capteur', 'ac')
                    ->leftJoin('ac.station', 'ast')
                    ->leftJoin('a.utilisateur', 'au')
                    ->addSelect('ac')
                    ->addSelect('ast')
                    ->addSelect('au')
                    ->where("ast.id = $id")
                    ->andWhere('au.alerte = 1')
                    ->andWhere("au.id = $user")
                    ->andWhere('a.niveauAlerte = 2')
                ;
        return $qb->getQuery()->getResult();
    }
}
