<?php

namespace Doplus\ParatronicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParametreLimitationType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nbStations', 'text')
                ->add('nbUtilisateurs', 'text')
        ;
    }
    
    public function getName() {
        return 'doplus_paratronic_parametre_limitation';
    }
}