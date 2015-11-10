<?php

namespace Doplus\ParatronicBundle\Controller;

use Doplus\ParatronicBundle\Entity\Mesure;
use Doplus\ParatronicBundle\Entity\Alerte;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MesureController extends Controller
{
    public function addMesureAction()
    {
        $now = new \Datetime();
        $em = $this->getDoctrine()->getManager();
        $capteurs = $em->getRepository('DoplusParatronicBundle:Capteur')->findAll();
        $nbCapteur = count($capteurs);
        $alerteArhchive = $em->getRepository('DoplusParatronicBundle:Alerte')->findAll();
        //archivage des mesures precedantes
        foreach ($alerteArhchive as $alerte) {
            $alerte->setCapteur(NULL);
            $alerte->setMesure(NULL);
            $alerte->setUtilisateur(NULL);
            $em->remove($alerte);
        }
        $em->flush();
        //generation des nouvelle mesures donc on nettoie la base de donee -> mesure
        foreach ($capteurs as $capteur) {
            $mesure = new Mesure();
            $mesure->setCapteur($capteur);
            $mesure->setDateMesure($now);
            $mesure->setHorodatage(rand(5, 15494));
            $mesure->setValeur(rand(5, 200));
            $em->persist($mesure);
        }
        
        $em->flush();
        $mesures = $em->getRepository('DoplusParatronicBundle:Mesure')->findAllWithLimit($nbCapteur);
        //var_dump($mesures);exit();
        foreach ($mesures as $mesure) {
            if ($mesure->getValeur() > $mesure->getCapteur()->getSeuilAlerte()) {
                $mesureValable = $em->getRepository('DoplusParatronicBundle:Mesure')->findMesureTask($mesure->getId());
                if ($mesureValable != NULL) {
                    $clientId = $mesureValable->getCapteur()->getStation()->getClient()->getId();
                    $users = $em->getRepository('DoplusUserBundle:Utilisateur')->findUsersForAlerte($clientId);
//                    var_dump($users);exit();
                    if ($users != NULL) {
                        foreach ($users as $user) {
                            $alerte = new Alerte();
                            $alerte->setMesure($mesureValable);
                            $alerte->setUtilisateur($user);
                            $alerte->setCapteur($mesureValable->getCapteur());
                            $alerte->setDateAlerte($now);
                            $alerte->setEtat(1);
                            $alerte->setNiveauAlerte(1);
                            $alerte->setBoolAlerteMail(true);
                            if ($user->getTelephone() != NULL) {
                                $alerte->setBoolAlerteSms(true);
                            }
                            else {
                                $alerte->setBoolAlerteSms(false);
                            }
                            $em->persist($alerte);
                            $em->flush();
                            if ($user->getAlerte() == 1) {
                                $this->get('doplus_paratronic.doplus_mailer')->sendAlerte($user, $mesure, $alerte);
                            }
                            
                        }
                    }
                }
            }
            if ($mesure->getValeur() > $mesure->getCapteur()->getSeuilPreAlerte()) {
                $mesureValable = $em->getRepository('DoplusParatronicBundle:Mesure')->findMesureTask($mesure->getId());
                if ($mesureValable != NULL) {
                    $clientId = $mesureValable->getCapteur()->getStation()->getClient()->getId();
                    $users = $em->getRepository('DoplusUserBundle:Utilisateur')->findUsersForPreAlerte($clientId);
                    if ($users != NULL) {
                        foreach ($users as $user) {
                            $alerte = new Alerte();
                            $alerte->setMesure($mesureValable);
                            $alerte->setUtilisateur($user);
                            $alerte->setCapteur($mesureValable->getCapteur());
                            $alerte->setDateAlerte($now);
                            $alerte->setEtat(1);
                            $alerte->setNiveauAlerte(2);
                            $alerte->setBoolAlerteMail(true);
                            if ($user->getTelephone() != NULL) {
                                $alerte->setBoolAlerteSms(true);
                            }
                            else {
                                $alerte->setBoolAlerteSms(false);
                            }
                            $em->persist($alerte);
                            $em->flush();
                            if ($user->getAlerte() == 1) {
                                $this->get('doplus_paratronic.doplus_mailer')->sendAlerte($user, $mesure, $alerte);
                            }
                            
                        }
                    }
                }
            }
        }
        $em->flush();
        return $this->redirect($this->generateUrl('doplus_paratronic_admin_menu'));
    }
}
