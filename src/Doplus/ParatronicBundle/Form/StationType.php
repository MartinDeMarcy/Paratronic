<?php

namespace Doplus\ParatronicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class StationType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom', 'text')
                ->add('image', 'file', array(
                    'required' => false
                ))
                ->add('adresse', 'text', array(
                    'required' => false
                ))
                ->add('cp', 'text', array(
                    'required' => false
                ))
                ->add('ville', 'text', array(
                    'required' => false
                ))
                ->add('coordonneesGpsLng', 'text', array(
                    'required' => false
                ))
                ->add('coordonneesGpsLat', 'text', array(
                    'required' => false
                ))
                ->add('codeHydrologique', 'text')
                ->add('description', 'textarea', array(
                    'required' => false
                ))
                ->add('client', 'entity', array(
                    'class' => 'DoplusParatronicBundle:Client',
                    'property' => 'raisonSociale'
                ))
                ->add('etat', 'checkbox', array(
                    'required' => false,
                    ))
        ;
    }
    
    public function getName() {
        return 'doplus_paratronic_user';
    }
}