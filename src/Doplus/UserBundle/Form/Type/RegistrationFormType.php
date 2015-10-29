<?php

namespace Doplus\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('nom', 'text')
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
            ;
    }

    public function getName()
    {
        return 'doplus_user_registration';
    }
}