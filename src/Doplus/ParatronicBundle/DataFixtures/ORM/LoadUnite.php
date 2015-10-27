<?php

namespace Doplus\ACOEMBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doplus\ParatronicBundle\Entity\CapteurUnite;

class LoadUnite implements FixtureInterface
{
  public function load(ObjectManager $manager)
  {
    // Les noms d'utilisateurs à créer
    $listUnite = array('m', 'cm', 'mm', 'l', 'm3', 'm3/s', 'm3/h', 'm3/j', 'l/s', 'l/h', 'l/j', 'm/s', 'bar', 'mbar', 'Pa', 'hPa', 'A', 'mA', 'µA', 'V', 'mV', 'µV', 'O', 'mO', '°C');

    foreach ($listUnite as $value) {
      $Unite = new CapteurUnite();
      $Unite->setValeur($value);
      $manager->persist($Unite);
    }
    $manager->flush();
  }
}