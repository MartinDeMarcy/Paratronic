<?php

namespace Doplus\ParatronicBundle\Controller;

use Doplus\ParatronicBundle\Entity\Mesure;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MesureController extends Controller
{
    public function addMesureAction()
    {
        $id = 6;
        $now = new \DateTime();
        $em = $this->getDoctrine()->getManager();
        $capteurs = $em->getRepository('DoplusParatronicBundle:Capteur')->findAll();
        $mesuresArhchive = $em->getRepository('DoplusParatronicBundle:Mesure')->findAll();
        //archivage des mesures precedantes
        foreach ($mesuresArhchive as $mesure) {
            $mesure->setCapteur(NULL);
            $em->remove($mesure);
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
        $mesures = $em->getRepository('DoplusParatronicBundle:Mesure')->findAll();
        foreach ($mesures as $mesure) {
            if ($mesure->getValeur() > $mesure->getCapteur()->getSeuilAlerte()) {
                echo "Pour la mesure :";
                var_dump($mesure);
                $mesureValable = $em->getRepository('DoplusParatronicBundle:Mesure')->findMesureTask($mesure->getId());
                if ($mesureValable != NULL) {
                    $clientId = $mesureValable->getCapteur()->getStation()->getClient()->getId();
                    $users = $em->getRepository('DoplusUserBundle:Utilisateur')->findUsersForAlerte($clientId);
                    if ($users != NULL) {
                        echo "Ca depasse et il ya des users actif :";
                        foreach ($users as $user) {
                            if ($user->getAlerte() == 1) {
                                $this->get('doplus_paratronic.doplus_mailer')->sendAlerte($user, $mesure);
                                echo "<br>Cette user a les alertes actives";
                            }
                            else {
                                echo "Cette user a les alertes inactives";
                            }
                            var_dump($user);
                        }
                    }
                    else {
                        echo "Ca depasse mais pas d'utilisateurs actifs";
                    }
                }
            }
            else {
                echo "Pour la mesure :";
                var_dump($mesure);
                echo "Ca depasse pas<br>";
            }
        }
        return $this->redirect($this->generateUrl('doplus_paratronic_capteur_menu', array('id' => $id)));
    }
}
