<?php

namespace Doplus\ParatronicBundle\Service;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doplus\ParatronicBundle\Entity\Alerte;
use Doplus\ParatronicBundle\Entity\AlerteHistorique;

class DoplusAlerteArchiver
{
    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $now = new \Datetime;
        $em = $args->getEntityManager();

        if ($entity instanceof Alerte) {
            $histo = new AlerteHistorique();
            $histo->setAlerte($entity->getId());
            $histo->setMesure($entity->getMesure());
            $histo->setUtilisateur($entity->getUtilisateur());
            $histo->setCapteur($entity->getCapteur());
            $histo->setUtilisateurAcquittement($entity->getUtilisateur());
            $histo->setDateAlerte($entity->getDateAlerte());
            $histo->setEtat(1);
            $histo->setBoolAlerteMail($entity->getBoolAlerteMail());
            $histo->setBoolAlerteSms($entity->getBoolAlerteSms());
            $histo->setDateAcquittement($now);
            $histo->setNiveauAlerte($entity->getNiveauAlerte());
            $em->persist($histo);
            $em->flush();
        }
    }
    
}