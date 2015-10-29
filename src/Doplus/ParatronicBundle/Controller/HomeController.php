<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class HomeController extends Controller
{
    public function indexAction()
    {
        ini_set('xdebug.max_nesting_level', 500);
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
}
