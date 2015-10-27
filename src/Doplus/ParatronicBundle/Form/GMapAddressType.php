<?php

namespace Doplus\ParatronicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
 
class GMapAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('adresse', 'text', array(
                    'required'      => true,
                ))
                ->add('ville', 'hidden', array(
                    'required'      => false,
                ))
                ->add('coordonneesGpsLat', 'hidden', array(
                    'required'      => false
                ))
                ->add('coordonneesGpsLng', 'hidden', array(
                    'required'      => false
                ))
        ;
    }
 
    public function getDefaultOptions(array $options)
    {
        return array(
            'virtual'   => true, // Ici nous précisons que notre FormType est un champ virtuel
        );
    }
 
    public function getName()
    {
        return 'gmap_address'; // Le nom de notre champ, il sera utilisé après
    }
}

