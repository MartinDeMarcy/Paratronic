<?php

namespace Doplus\ParatronicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CapteurType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom', 'text')
                ->add('unite', 'entity', array(
                    'class' => 'DoplusParatronicBundle:CapteurUnite',
                    'property' => 'valeur'
                ))
                ->add('image', 'file', array(
                    'required' => false
                ))
                ->add('seuilPreAlerte', 'text', array(
                    'required' => false
                ))
                ->add('seuilAlerte', 'text', array(
                    'required' => false
                ))
                ->add('etat', 'checkbox', array(
                    'required' => false,
                    ))
        ;
    }
    
    public function getName() {
        return 'doplus_paratronic_capteur';
    }
}