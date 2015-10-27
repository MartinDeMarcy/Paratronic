<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametreAlerte
 *
 * @ORM\Table(name="ps_parametre_alerte")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\ParametreAlerteRepository")
 */
class ParametreAlerte
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Client", cascade={"persist"})
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @var integer
     *
     * @ORM\Column(name="intervalle_relance", type="integer", nullable=true)
     */
    private $intervalleRelance;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set intervalleRelance
     *
     * @param integer $intervalleRelance
     *
     * @return ParametreAlerte
     */
    public function setIntervalleRelance($intervalleRelance)
    {
        $this->intervalleRelance = $intervalleRelance;

        return $this;
    }

    /**
     * Get intervalleRelance
     *
     * @return integer
     */
    public function getIntervalleRelance()
    {
        return $this->intervalleRelance;
    }

    /**
     * Set client
     *
     * @param \Doplus\ParatronicBundle\Entity\Client $client
     *
     * @return ParametreAlerte
     */
    public function setClient(\Doplus\ParatronicBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Doplus\ParatronicBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
