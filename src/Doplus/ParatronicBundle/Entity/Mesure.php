<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesure
 *
 * @ORM\Table(name="ps_mesure")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\MesureRepository")
 */
class Mesure
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
     * @ORM\OneToOne(targetEntity="Doplus\ParatronicBundle\Entity\Capteur", cascade={"persist"})
     * @ORM\JoinColumn(name="capteur_id", referencedColumnName="id")
     */
    private $capteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mesure", type="date")
     */
    private $dateMesure;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=255, nullable=true))
     */
    private $valeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="archive", type="integer", nullable=true)
     */
    private $archive;

    /**
     * @var integer
     *
     * @ORM\Column(name="horodatage", type="bigint", nullable=true))
     */
    private $horodatage;


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
     * Set dateMesure
     *
     * @param \DateTime $dateMesure
     *
     * @return Mesure
     */
    public function setDateMesure($dateMesure)
    {
        $this->dateMesure = $dateMesure;

        return $this;
    }

    /**
     * Get dateMesure
     *
     * @return \DateTime
     */
    public function getDateMesure()
    {
        return $this->dateMesure;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return Mesure
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set archive
     *
     * @param integer $archive
     *
     * @return Mesure
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * Get archive
     *
     * @return integer
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * Set horodatage
     *
     * @param integer $horodatage
     *
     * @return Mesure
     */
    public function setHorodatage($horodatage)
    {
        $this->horodatage = $horodatage;

        return $this;
    }

    /**
     * Get horodatage
     *
     * @return integer
     */
    public function getHorodatage()
    {
        return $this->horodatage;
    }

    /**
     * Set capteur
     *
     * @param \Doplus\ParatronicBundle\Entity\Capteur $capteur
     *
     * @return Mesure
     */
    public function setCapteur(\Doplus\ParatronicBundle\Entity\Capteur $capteur = null)
    {
        $this->capteur = $capteur;

        return $this;
    }

    /**
     * Get capteur
     *
     * @return \Doplus\ParatronicBundle\Entity\Capteur
     */
    public function getCapteur()
    {
        return $this->capteur;
    }
}
