<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('DoplusParatronicBundle:Home:index.html.twig');
    }
    
    public function layoutAction()
    {
        $em = $this->getDoctrine()->getManager();
        $stations = $em->getRepository('DoplusParatronicBundle:Station')->findAll();
        
        return $this->render('DoplusParatronicBundle:Home:liste_layout.html.twig', array(
            'stations' => $stations,
        ));
        
    }
    
//    public function loginAction()
//    {
//        return $this->render('DoplusParatronicBundle:Registration:registration.html.twig');
//    }
}
