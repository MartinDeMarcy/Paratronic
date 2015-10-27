<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doplus\ParatronicBundle\Entity\Capteur;
use Doplus\ParatronicBundle\Form\CapteurType;

class CapteurController extends Controller
{
    public function capteurMenuAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $station = $em->getRepository('DoplusParatronicBundle:Station')->find($id);
        $capteurs = $em->getRepository('DoplusParatronicBundle:Capteur')->findBy(array('station' => $station));
        
        return $this->render('DoplusParatronicBundle:Capteur:capteur_menu.html.twig', array(
            'capteurs' => $capteurs,
            'station' => $station,
        ));
    }
    
    public function ajoutCapteurAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $station = $em->getRepository('DoplusParatronicBundle:Station')->find($id);
        $capteur = new Capteur();
        $formCapteur = $this->createForm(new CapteurType(), $capteur);
        $formCapteur->handleRequest($request);
        if ($formCapteur->isValid()) {
            $capteur->setStation($station);
            $station->addCapteur();
            $em->persist($capteur);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Capteur bien ajouté.');
            return $this->redirect($this->generateUrl('doplus_paratronic_capteur_menu', array('id' => $id)));
        }
        return $this->render('DoplusParatronicBundle:Capteur:ajout_capteur.html.twig', array(
            'station' => $station,
            'formCapteur' => $formCapteur->createView(),
        ));
    }
    
    public function editCapteurAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $capteur = $em->getRepository('DoplusParatronicBundle:Capteur')->find($id);
        $formCapteur = $this->createForm(new CapteurType(), $capteur);
        $formCapteur->handleRequest($request);
        if ($formCapteur->isValid()) {
            $em->persist($capteur);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Capteur bien modifié.');
            return $this->redirect($this->generateUrl('doplus_paratronic_capteur_menu', array('id' => $capteur->getStation()->getId())));
        }
        return $this->render('DoplusParatronicBundle:Capteur:ajout_capteur.html.twig', array(
            'formCapteur' => $formCapteur->createView(),
        ));
    }
    
    public function deleteCapteurAction($id)
    {
        echo $id;
        $em = $this->getDoctrine()->getManager();
        $capteur = $em->getRepository('DoplusParatronicBundle:Capteur')->find($id);
        $station = $capteur->getStation();
        $station->deleteCapteur();
        $em->remove($capteur);
        $em->flush();
        return $this->redirect($this->generateUrl('doplus_paratronic_capteur_menu', array('id' => $station->getId())));
    }
}
