<?php

namespace Doplus\ParatronicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParametreAbonnementType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('dateDebut', 'genemu_jquerydate', array('widget' => 'single_text'))
                ->add('dateFin', 'genemu_jquerydate', array('widget' => 'single_text'))
                ->add('etat', 'checkbox', array(
                    'required' => false,
                ))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Doplus\ParatronicBundle\Entity\ParametreAbonnement',
        ));
    }
    
    public function getName() {
        return 'doplus_paratronic_parametre_abonnement';
    }
}