<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CGVController extends Controller
{
    public function cgvAction()
    {
        return $this->render('DoplusParatronicBundle:CGV:conditions.html.twig');
    }
}
