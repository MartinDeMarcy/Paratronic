<?php

namespace Doplus\ParatronicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;

class ParametreAbonnementType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('dateDebut', 'datetime')
                ->add('dateFin', 'datetime')
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