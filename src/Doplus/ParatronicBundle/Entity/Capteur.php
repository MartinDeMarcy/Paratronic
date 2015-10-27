<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capteur
 *
 * @ORM\Table(name="ps_capteur")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\CapteurRepository")
 */
class Capteur
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
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Station", cascade={"persist"})
     * @ORM\JoinColumn(name="station", referencedColumnName="id")
     */
    private $station;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\CapteurUnite", cascade={"persist"})
     * @ORM\JoinColumn(name="unite", referencedColumnName="id")
     */
    private $unite;

    /**
     * @var integer
     *
     * @ORM\Column(name="seuil_pre_alerte", type="integer", nullable=true)
     */
    private $seuilPreAlerte;

    /**
     * @var integer
     *
     * @ORM\Column(name="seuil_alerte", type="integer", nullable=true)
     */
    private $seuilAlerte;

    /**
     * @var string
     *
     * @ORM\Column(name="graph_type", type="string", length=255, nullable=true)
     */
    private $graphType;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean", nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;
    
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Capteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set seuilPreAlerte
     *
     * @param integer $seuilPreAlerte
     *
     * @return Capteur
     */
    public function setSeuilPreAlerte($seuilPreAlerte)
    {
        $this->seuilPreAlerte = $seuilPreAlerte;

        return $this;
    }

    /**
     * Get seuilPreAlerte
     *
     * @return integer
     */
    public function getSeuilPreAlerte()
    {
        return $this->seuilPreAlerte;
    }

    /**
     * Set seuilAlerte
     *
     * @param integer $seuilAlerte
     *
     * @return Capteur
     */
    public function setSeuilAlerte($seuilAlerte)
    {
        $this->seuilAlerte = $seuilAlerte;

        return $this;
    }

    /**
     * Get seuilAlerte
     *
     * @return integer
     */
    public function getSeuilAlerte()
    {
        return $this->seuilAlerte;
    }

    /**
     * Set graphType
     *
     * @param string $graphType
     *
     * @return Capteur
     */
    public function setGraphType($graphType)
    {
        $this->graphType = $graphType;

        return $this;
    }

    /**
     * Get graphType
     *
     * @return string
     */
    public function getGraphType()
    {
        return $this->graphType;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Capteur
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Capteur
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Capteur
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set station
     *
     * @param \Doplus\ParatronicBundle\Entity\Station $station
     *
     * @return Capteur
     */
    public function setStation(\Doplus\ParatronicBundle\Entity\Station $station = null)
    {
        $this->station = $station;

        return $this;
    }

    /**
     * Get station
     *
     * @return \Doplus\ParatronicBundle\Entity\Station
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * Set unite
     *
     * @param \Doplus\ParatronicBundle\Entity\CapteurUnite $unite
     *
     * @return Capteur
     */
    public function setUnite(\Doplus\ParatronicBundle\Entity\CapteurUnite $unite = null)
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * Get unite
     *
     * @return \Doplus\ParatronicBundle\Entity\CapteurUnite
     */
    public function getUnite()
    {
        return $this->unite;
    }
}
