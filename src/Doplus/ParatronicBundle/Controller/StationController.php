<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


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
    
    public function exportStationCSV() {
        $em = $this->getDoctrine()->getEntityManager();
       
        $iterableResult = $em->getRepository('DoplusParatronicBundle:Mesure')->createQueryBuilder('m')->getQuery()->iterate();
        $handle = fopen('php://memory', 'r+');
        $header = array();

        while (false !== ($row = $iterableResult->next())) {
            fputcsv($handle, $row[0]);
            $em->detach($row[0]);
        }

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);
        
        return new Response($content, 200, array(
            'Content-Type' => 'application/force-download',
            'Content-Disposition' => 'attachment; filename="export.csv"'
        ));
    }
}
