<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doplus\ParatronicBundle\Form\ParametreAbonnementType;
use Doplus\ParatronicBundle\Form\ParametreAlerteType;
use Doplus\ParatronicBundle\Form\ParametreLimitationType;


class ParametreController extends Controller
{
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('DoplusParatronicBundle:Client')->findOneBy(array('id' => $id));
        $name = $client->getRaisonSociale();
        return $this->render('DoplusParatronicBundle:Parametre:index.html.twig', array(
            'id' => $id,
            'name' => $name,
        ));
    }
    
    public function alerteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('DoplusParatronicBundle:Client')->findOneBy(array('id' => $id));
        $alerte = $em->getRepository('DoplusParatronicBundle:ParametreAlerte')->findOneBy(array('client' => $client));
        $formAlerte = $this->createForm(new ParametreAlerteType(), $alerte);
        $formAlerte->handleRequest($request);
        if ($formAlerte->isValid()) {
            $em->persist($alerte);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Paramètre alerte bien enregistré.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_menu'));
        }
        return $this->render('DoplusParatronicBundle:Parametre:alerte.html.twig', array(
            'formAlerte' => $formAlerte->createView(),
            'id' => $id
        ));
    }
    
    public function abonnementAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('DoplusParatronicBundle:Client')->findOneBy(array('id' => $id));
        $abonnement = $em->getRepository('DoplusParatronicBundle:ParametreAbonnement')->findOneBy(array('client' => $client));
        $formAbonnement = $this->createForm(new ParametreAbonnementType(), $abonnement);
        $formAbonnement->handleRequest($request);
        if ($formAbonnement->isValid()) {
            $em->persist($abonnement);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Paramètres abonnement bien enregistrés.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_menu'));
        }
        return $this->render('DoplusParatronicBundle:Parametre:abonnement.html.twig', array(
            'formAbonnement' => $formAbonnement->createView(),
            'id' => $id
        ));
    }
    
    public function limitationAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('DoplusParatronicBundle:Client')->findOneBy(array('id' => $id));
        $limitation = $em->getRepository('DoplusParatronicBundle:ParametreLimitation')->findOneBy(array('client' => $client));
        $formLimitation = $this->createForm(new ParametreLimitationType(), $limitation);
        $formLimitation->handleRequest($request);
        if ($formLimitation->isValid()) {
            $em->persist($limitation);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Paramètres limitation bien enregistrés.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_menu'));
        }
        return $this->render('DoplusParatronicBundle:Parametre:limitation.html.twig', array(
            'formLimitation' => $formLimitation->createView(),
            'id' => $id
        ));

    }
}
