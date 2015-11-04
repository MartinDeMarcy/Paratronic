<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlerteController extends Controller
{
    public function checkAction()
    {
        $em = $this->getDoctrine()->getManager();
        $capteurs = $em->getRepository('DoplusParatronicBundle:Mesure')->findAll();
        var_dump($capteurs);
        return 0;
    }
}
