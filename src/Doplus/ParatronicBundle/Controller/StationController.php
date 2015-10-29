<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class StationController extends Controller
{
    public function ficheStationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $station = $em->getRepository('DoplusParatronicBundle:Station')->find($id);
        $capteurs = $em->getRepository('DoplusParatronicBundle:Capteur')->findByStationId($id);
        return $this->render('DoplusParatronicBundle:Station:fiche_station.html.twig', array(
            'station' => $station,
            'capteurs' => $capteurs
        ));
    }
}
