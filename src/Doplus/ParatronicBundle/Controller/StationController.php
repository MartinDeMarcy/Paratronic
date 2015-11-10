<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class StationController extends Controller
{
    public function ficheStationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $station = $em->getRepository('DoplusParatronicBundle:Station')->find($id);
        $capteurs = $em->getRepository('DoplusParatronicBundle:Capteur')->findByStationId($id);
        $nb = count($capteurs);
        $alertes1 = $em->getRepository('DoplusParatronicBundle:Alerte')->findByStationIdForAlerte($id, $user->getId());
        $alertes2 = $em->getRepository('DoplusParatronicBundle:Alerte')->findByStationIdForPreAlerte($id, $user->getId());
        $mesures = $em->getRepository('DoplusParatronicBundle:Mesure')->findByStationId($id, $nb);
        return $this->render('DoplusParatronicBundle:Station:fiche_station.html.twig', array(
            'station' => $station,
            'mesures' => $mesures,
            'alertes1' => $alertes1,
            'alertes2' => $alertes2
        ));
    }
}
