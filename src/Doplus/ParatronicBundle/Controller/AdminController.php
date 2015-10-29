<?php

namespace Doplus\ParatronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doplus\ParatronicBundle\Entity\Client;
use Doplus\ParatronicBundle\Entity\ParametreAbonnement;
use Doplus\ParatronicBundle\Entity\ParametreAlerte;
use Doplus\ParatronicBundle\Entity\ParametreLimitation;
use Doplus\ParatronicBundle\Form\ClientType;
use Doplus\ParatronicBundle\Entity\Utilisateur;
use Doplus\ParatronicBundle\Form\Type\RegistrationFormType;
use Doplus\ParatronicBundle\Entity\Station;
use Doplus\ParatronicBundle\Form\StationType;
use Doplus\ParatronicBundle\Entity\Search\ClientSearch;
use Doplus\ParatronicBundle\Form\SearchType\ClientSearchType;

class AdminController extends Controller
{
    public function adminMenuAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('DoplusParatronicBundle:Client')->ClientMenu();
        $clientSearch = new ClientSearch();
        $formClientSearch = $this->createForm(new ClientSearchType(), $clientSearch);
        $formClientSearch->handleRequest($request);
        if ($formClientSearch->isValid()) {
            $tmp = $this->getDoctrine()->getRepository('DoplusParatronicBundle:Client')->ClientSearch($clientSearch);
            if ($tmp != NULL) {
                $clients = $tmp;
            }
        }
        return $this->render('DoplusParatronicBundle:Admin:admin_menu.html.twig', array(
            'clients' => $clients,
            'formClientSearch' => $formClientSearch->createView()
        ));
    }
    
    public function ajoutClientAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = new Client();
        $formClient = $this->createForm(new ClientType(), $client);
        $formClient->handleRequest($request);
        if ($formClient->isValid()) {
            $parametreAbonnement = new ParametreAbonnement();
            $parametreAbonnement->setClient($client);
            $parametreAlerte = new ParametreAlerte();
            $parametreAlerte->setClient($client);
            $parametreLimitation = new ParametreLimitation();
            $parametreLimitation->setClient($client);
            $client->setNbUtilisateurs(0);
            $client->setNbStations(0);
            $client->upload();
            $em->persist($parametreAbonnement);
            $em->persist($parametreAlerte);
            $em->persist($parametreLimitation);
            $em->persist($client);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Client bien enregistré.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_menu'));
        }
        return $this->render('DoplusParatronicBundle:Admin:ajout_client.html.twig', array(
            'formClient' => $formClient->createView(),
            'client' => $client
        ));
    }
    
    public function editClientAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('DoplusParatronicBundle:Client')->find($id);
        $formClient = $this->createForm(new ClientType(), $client);
        $formClient->handleRequest($request);
        if ($formClient->isValid()) {
            if ($formClient->getData()->getImage() != NULL) {
                $new_image = $client->getCodeClient().'_client-picture_'.$formClient->getViewData()->getImage()->getClientOriginalName();
                if ($new_image != $client->getPathImage()) {
                    $client->removeFile($client->getPathImage());
                }
            }
            $em->persist($client);
            $client->upload();
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Client bien modifié.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_menu'));
        }
        return $this->render('DoplusParatronicBundle:Admin:ajout_client.html.twig', array(
            'formClient' => $formClient->createView(),
            'client' => $client
        ));
    }
    
    public function deleteClientAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('DoplusParatronicBundle:Client')->find($id);
        $utilisateurs = $em->getRepository('DoplusParatronicBundle:Utilisateur')->findBy(array('client' => $client));
        foreach ($utilisateurs as $user) {
            $em->remove($user);
        }
        $stations = $em->getRepository('DoplusParatronicBundle:Station')->findBy(array('client' => $client));
        foreach ($stations as $station) {
            $em->remove($station);
        }
        $alerte = $em->getRepository('DoplusParatronicBundle:ParametreAlerte')->findOneBy(array('client' => $client));
        if ($alerte != NULL) {
            $em->remove($alerte);
        }
        $abonnement = $em->getRepository('DoplusParatronicBundle:ParametreAbonnement')->findOneBy(array('client' => $client));
        if ($alerte != NULL) {
            $em->remove($abonnement);
        }
        $limitation = $em->getRepository('DoplusParatronicBundle:ParametreLimitation')->findOneBy(array('client' => $client));
        if ($alerte != NULL) {
            $em->remove($limitation);
        }
        $client->removeFile($client->getPathImage());
        $em->remove($client);
        $em->flush();
        return $this->redirect($this->generateUrl('doplus_paratronic_admin_menu'));
    }
    
    public function ajoutUserAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new Utilisateur();
        $formUser = $this->createForm(new RegistrationFormType(), $user);
        $formUser->handleRequest($request);
        if ($formUser->isValid()) {
            $user->getClient()->addUtilisateur();
            $user->upload();
            $em->persist($user);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Utilisateur bien enregistré.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_user_menu', array('id' => $user->getClient()->getId())));
        }
        
        return $this->render('DoplusParatronicBundle:Admin:ajout_user.html.twig', array(
            'formUser' => $formUser->createView(),
            'user' => $user
        ));
    }
    
    public function editUserAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('DoplusParatronicBundle:Utilisateur')->find($id);
        $formUser = $this->createForm(new RegistrationFormType(), $user);
        $formUser->handleRequest($request);
        if ($formUser->isValid()) {
            if ($formUser->getData()->getImage() != NULL) {
                $new_image = $user->getClient()->getCodeClient().'_user-picture_'.$user->getUsername().'_'.$formUser->getViewData()->getImage()->getClientOriginalName();
                if ($new_image != $user->getPathImage()) {
                    $user->removeFile($user->getPathImage());
                }
            }
            $user->upload();
            $em->persist($user);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Utilisateur bien modifié.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_user_menu', array('id' => $user->getClient()->getId())));
        }
        return $this->render('DoplusParatronicBundle:Admin:ajout_user.html.twig', array(
            'formUser' => $formUser->createView(),
            'user' => $user
        ));
    }
    
    public function deleteUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('DoplusParatronicBundle:Utilisateur')->find($id);
        $user->getClient()->deleteUtilisateur();
        $clientId = $user->getClient()->getId();
        $user->removeFile($user->getPathImage());
        $em->remove($user);
        $em->flush();
        return $this->redirect($this->generateUrl('doplus_paratronic_admin_user_menu', array('id' => $clientId)));
    }
    
    public function menuUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('DoplusParatronicBundle:Utilisateur')->findWithClientId($id);
        $client = $em->getRepository('DoplusParatronicBundle:Client')->findOneBy(array('id' => $id));
        $name = $client->getRaisonSociale();
        return $this->render('DoplusParatronicBundle:Admin:user_menu.html.twig', array(
            'users' => $users,
            'name' => $name,
        ));
    }
    
    public function ajoutStationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $station = new Station();
        $formStation = $this->createForm(new StationType(), $station);
        $formStation->handleRequest($request);
        if ($formStation->isValid()) {
            $station->getClient()->addStation();
            $station->upload();
            $station->setNbCapteurs(0);
            $em->persist($station);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Station bien enregistré.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_station_menu', array('id' => $station->getClient()->getId())));
        }
        return $this->render('DoplusParatronicBundle:Admin:ajout_station.html.twig', array(
            'formStation' => $formStation->createView(),
            'station' => $station
        ));
    }
    
    public function editStationAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $station = $em->getRepository('DoplusParatronicBundle:Station')->find($id);
        $formStation = $this->createForm(new StationType(), $station);
        $formStation->handleRequest($request);
        if ($formStation->isValid()) {
            if ($formStation->getData()->getImage() != NULL) {
                $new_image = $station->getClient()->getCodeClient().'_station-picture_'.$station->getCodeHydrologique().'_'.$formStation->getViewData()->getImage()->getClientOriginalName();
                if ($new_image != $station->getPathImage()) {
                    $station->removeFile($station->getPathImage());
                }
            }
            $station->upload();
            $em->persist($station);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Station bien modifié.');
            return $this->redirect($this->generateUrl('doplus_paratronic_admin_station_menu', array('id' => $station->getClient()->getId())));
        }
        return $this->render('DoplusParatronicBundle:Admin:ajout_station.html.twig', array(
            'formStation' => $formStation->createView(),
            'station' => $station
        ));
    }
    
    public function deleteStationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $station = $em->getRepository('DoplusParatronicBundle:Station')->find($id);
        $station->getClient()->deleteStation();
        $clientId = $station->getClient()->getId();
        $station->removeFile($station->getPathImage());
        $em->remove($station);
        $em->flush();
        return $this->redirect($this->generateUrl('doplus_paratronic_admin_station_menu', array('id' => $clientId)));
    }
    
    public function menuStationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $stations = $em->getRepository('DoplusParatronicBundle:Station')->findWithClientId($id);
        $client = $em->getRepository('DoplusParatronicBundle:Client')->findOneBy(array('id' => $id));
        $name = $client->getRaisonSociale();
        return $this->render('DoplusParatronicBundle:Admin:station_menu.html.twig', array(
            'stations' => $stations,
            'name' => $name
        ));
    }
    
    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = new \Doplus\UserBundle\Entity\Utilisateur();
        $user->setRoles(array('ROLE_USER'));
        $em->persist($user);
        $em->flush();
        return $this->render('DoplusParatronicBundle:Admin:test.html.twig');
    }

}
