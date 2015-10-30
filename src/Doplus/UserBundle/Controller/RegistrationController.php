<?php

namespace Doplus\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends BaseController
{
    
    public function registerAction(Request $request)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setEnabled(true);
        $formUser = $this->createForm('doplus_user_registration', $user);
        $formUser->handleRequest($request);
        if ($formUser->isValid()) {
            $user->addRole($formUser->getData()->getDroits());
            $user->getClient()->addUtilisateur();
            $user->upload();
            $userManager->updateUser($user);
            $request->getSession()->getFlashBag()->add('notice', 'Utilisateur bien enregistré.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_user_menu', array('id' => $user->getClient()->getId())));
        }
        
        return $this->render('DoplusUserBundle:Registration:register.html.twig', array(
            'form' => $formUser->createView(),
            'user' => $user
        ));
    }
}