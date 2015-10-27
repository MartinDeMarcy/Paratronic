<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametreLimitation
 *
 * @ORM\Table(name="ps_parametre_limitation")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\ParametreLimitationRepository")
 */
class ParametreLimitation
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
     * @ORM\Column(name="nb_stations", type="integer", nullable=true)
     */
    private $nbStations;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_utilisateurs", type="integer", nullable=true)
     */
    private $nbUtilisateurs;

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
     * Set nbStations
     *
     * @param integer $nbStations
     *
     * @return ParametreLimitation
     */
    public function setNbStations($nbStations)
    {
        $this->nbStations = $nbStations;

        return $this;
    }

    /**
     * Get nbStations
     *
     * @return integer
     */
    public function getNbStations()
    {
        return $this->nbStations;
    }

    /**
     * Set nbUtilisateurs
     *
     * @param integer $nbUtilisateurs
     *
     * @return ParametreLimitation
     */
    public function setNbUtilisateurs($nbUtilisateurs)
    {
        $this->nbUtilisateurs = $nbUtilisateurs;

        return $this;
    }

    /**
     * Get nbUtilisateurs
     *
     * @return integer
     */
    public function getNbUtilisateurs()
    {
        return $this->nbUtilisateurs;
    }

    /**
     * Set client
     *
     * @param \Doplus\ParatronicBundle\Entity\Client $client
     *
     * @return ParametreLimitation
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
