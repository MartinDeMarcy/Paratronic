<?php

namespace Doplus\ParatronicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParametreAlerteType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('intervalleRelance', 'text')
        ;
    }
    
    public function getName() {
        return 'doplus_paratronic_parametre_alerte';
    }
}