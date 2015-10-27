<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametreCsvAuto
 *
 * @ORM\Table(name="ps_parametre_csv_auto")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\ParametreCsvAutoRepository")
 */
class ParametreCsvAuto
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
     * @var \DateTime
     *
     * @ORM\Column(name="periode_debut", type="time")
     */
    private $periodeDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="periode_fin", type="time")
     */
    private $periodeFin;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_servername", type="string", length=255)
     */
    private $ftpServername;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_username", type="string", length=255)
     */
    private $ftpUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="ftp_userpass", type="string", length=255)
     */
    private $ftpUserpass;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

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
     * Set periodeDebut
     *
     * @param \DateTime $periodeDebut
     *
     * @return ParametreCsvAuto
     */
    public function setPeriodeDebut($periodeDebut)
    {
        $this->periodeDebut = $periodeDebut;

        return $this;
    }

    /**
     * Get periodeDebut
     *
     * @return \DateTime
     */
    public function getPeriodeDebut()
    {
        return $this->periodeDebut;
    }

    /**
     * Set periodeFin
     *
     * @param \DateTime $periodeFin
     *
     * @return ParametreCsvAuto
     */
    public function setPeriodeFin($periodeFin)
    {
        $this->periodeFin = $periodeFin;

        return $this;
    }

    /**
     * Get periodeFin
     *
     * @return \DateTime
     */
    public function getPeriodeFin()
    {
        return $this->periodeFin;
    }

    /**
     * Set ftpServername
     *
     * @param string $ftpServername
     *
     * @return ParametreCsvAuto
     */
    public function setFtpServername($ftpServername)
    {
        $this->ftpServername = $ftpServername;

        return $this;
    }

    /**
     * Get ftpServername
     *
     * @return string
     */
    public function getFtpServername()
    {
        return $this->ftpServername;
    }

    /**
     * Set ftpUsername
     *
     * @param string $ftpUsername
     *
     * @return ParametreCsvAuto
     */
    public function setFtpUsername($ftpUsername)
    {
        $this->ftpUsername = $ftpUsername;

        return $this;
    }

    /**
     * Get ftpUsername
     *
     * @return string
     */
    public function getFtpUsername()
    {
        return $this->ftpUsername;
    }

    /**
     * Set ftpUserpass
     *
     * @param string $ftpUserpass
     *
     * @return ParametreCsvAuto
     */
    public function setFtpUserpass($ftpUserpass)
    {
        $this->ftpUserpass = $ftpUserpass;

        return $this;
    }

    /**
     * Get ftpUserpass
     *
     * @return string
     */
    public function getFtpUserpass()
    {
        return $this->ftpUserpass;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return ParametreCsvAuto
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
     * Set client
     *
     * @param \Doplus\ParatronicBundle\Entity\Client $client
     *
     * @return ParametreCsvAuto
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
