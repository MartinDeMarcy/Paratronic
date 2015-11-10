<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Doplus\ParatronicBundle\Entity\AlerteHistorique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlerteController extends Controller
{
    public function checkAction()
    {
        $em = $this->getDoctrine()->getManager();
        $alertes = $em->getRepository('DoplusParatronicBundle:Alerte')->findAll();
//        var_dump($alertes);exit();
        foreach ($alertes as $alerte) {
            $this->get('doplus_paratronic.doplus_mailer')->sendAlerte($alerte->getUtilisateur(), $alerte->getMesure(), $alerte);
        }
        return $this->redirect($this->generateUrl('doplus_paratronic_admin_menu'));
    }
    
    public function archiveAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $alerte = $em->getRepository('DoplusParatronicBundle:Alerte')->find($id);
        $stationId = $alerte->getCapteur()->getStation()->getId();
        $em->remove($alerte);
        $em->flush();
        return $this->redirect($this->generateUrl('doplus_paratronic_station_fiche_station', array('id' => $stationId)));
    }
}
