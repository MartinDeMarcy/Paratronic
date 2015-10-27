<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="ps_photo")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\PhotoRepository")
 */
class Photo
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
    /**
     * @ORM\OneToOne(targetEntity="Doplus\ParatronicBundle\Entity\Station", cascade={"persist"})
     * @ORM\JoinColumn(name="station_id", referencedColumnName="id")
     */
    private $station;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="lien_redim", type="string", length=255)
     */
    private $lienRedim;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_insertion", type="datetime")
     */
    private $dateInsertion;


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
     * @return Photo
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
     * Set lien
     *
     * @param string $lien
     *
     * @return Photo
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set lienRedim
     *
     * @param string $lienRedim
     *
     * @return Photo
     */
    public function setLienRedim($lienRedim)
    {
        $this->lienRedim = $lienRedim;

        return $this;
    }

    /**
     * Get lienRedim
     *
     * @return string
     */
    public function getLienRedim()
    {
        return $this->lienRedim;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Photo
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set dateInsertion
     *
     * @param \DateTime $dateInsertion
     *
     * @return Photo
     */
    public function setDateInsertion($dateInsertion)
    {
        $this->dateInsertion = $dateInsertion;

        return $this;
    }

    /**
     * Get dateInsertion
     *
     * @return \DateTime
     */
    public function getDateInsertion()
    {
        return $this->dateInsertion;
    }

    /**
     * Set station
     *
     * @param \Doplus\ParatronicBundle\Entity\Station $station
     *
     * @return Photo
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
}
