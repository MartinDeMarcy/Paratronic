<?php

namespace Doplus\ParatronicBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom', 'text')
                ->add('prenom', 'text')
                ->add('image', 'file', array(
                    'required' => false,
                    ))
                ->add('fonction', 'text', array(
                    'required' => false,
                ))
                ->add('telephone', 'text', array(
                    'required' => false,
                ))
                ->add('email', 'email')
                ->add('alerte', 'choice', array(
                    'choices' => array('1' => 'Oui', '0' => 'Non'),
                    'expanded' => true,
                    'preferred_choices' => array(0),
                ))
                ->add('niveauAlerte', 'text', array(
                    'required' => false,
                    ))
                ->add('username', 'text')
                ->add('password', 'password', array(
                    'always_empty' => false
                ))
                ->add('client', 'entity', array(
                    'class' => 'DoplusParatronicBundle:Client',
                    'property' => 'raisonSociale'
                    ))
                ->add('etat', 'checkbox', array(
                    'required' => false,
                    ))
                ->add('droits', 'choice', array(
                    'choices' => array('0' => 'Lecture seule', '1' => 'Ajout / modification'),
                ))
                ->getForm()
        ;
    }
//    public function getParent() {
//        return 'fos_user_registration';
//    }
    
    public function getName() {
        return 'doplus_user_registration';
    }
}
