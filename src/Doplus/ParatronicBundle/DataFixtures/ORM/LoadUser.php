<?php

namespace Doplus\ACOEMBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class LoadUser implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
       $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
        
        $userManager = $this->container->get('fos_user.user_manager');
        $admin = $userManager->createUser();
        $admin->setUsername('admin');
        $admin->setNom('Doplus');
        $admin->setPrenom('Admin');
        $admin->setEmail('test.doplus@gmail.com');
        $admin->setPlainPassword('admin');
        $admin->setEnabled(true);
        $admin->setRoles(array('ROLE_ADMIN'));
        $userManager->updateUser($admin, true);
    }
}