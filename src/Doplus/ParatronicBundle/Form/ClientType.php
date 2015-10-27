<?php

namespace Doplus\ParatronicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('raisonSociale', 'text')
                ->add('statutJuridique', 'text', array(
                    'required' => false))
                ->add('service', 'text', array(
                    'required' => false))
                ->add('image', 'file', array(
                    'required' => false))
                ->add('codeClient', 'text')
                ->add('adresse', 'text', array(
                    'required' => false))
                ->add('cp', 'text', array(
                    'required' => false))
                ->add('ville', 'text', array(
                    'required' => false))
                ->add('coordonneesAdministratives', 'text', array(
                    'required' => false))
                ->add('mail', 'text', array(
                    'required' => false))
                ->add('telephone', 'text', array(
                    'required' => false))
                ->add('nomResponsable', 'text', array(
                    'required' => false))
                ->add('prenomResponsable', 'text', array(
                    'required' => false))
                ->add('statut', 'choice', array(
                    'choices' => array('0' => 'Privé', '1' => 'Public'),
                    'expanded' => true
                ))
                ->add('etat', 'checkbox', array(
                    'required' => false,
                    ))
        ;
    }
    
    public function getName() {
        return 'doplus_paratronic_client';
    }
}