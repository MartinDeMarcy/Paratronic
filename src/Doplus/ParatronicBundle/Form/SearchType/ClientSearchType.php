<?php

namespace Doplus\ParatronicBundle\Form\SearchType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entite', 'text', array(
                'required' => false,
            ))
            ->add('cp', 'text', array(
                'required' => false,
            ))
            ->add('ville', 'text', array(
                'required' => false,
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            // avoid to pass the csrf token in the url (but it's not protected anymore)
            'csrf_protection' => false,
            'data_class' => 'Doplus\ParatronicBundle\Entity\Search\ClientSearch',
        ));
    }

    public function getName()
    {
        return 'client_search_type';
    }
}