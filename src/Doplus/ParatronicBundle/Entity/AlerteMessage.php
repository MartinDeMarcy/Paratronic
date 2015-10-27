<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlerteMessage
 *
 * @ORM\Table(name="ps_alerte_message")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\AlerteMessageRepository")
 */
class AlerteMessage
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
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Alerte", cascade={"persist"})
     * @ORM\JoinColumn(name="alerte_id", referencedColumnName="id")
     */
    private $alerte;

    /**
     * @var string
     *
     * @ORM\Column(name="type_message", type="string", length=255)
     */
    private $typeMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_envoi", type="date")
     */
    private $dateEnvoi;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=500)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="destinataire", type="string", length=500)
     */
    private $destinataire;


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
     * Set typeMessage
     *
     * @param string $typeMessage
     *
     * @return AlerteMessage
     */
    public function setTypeMessage($typeMessage)
    {
        $this->typeMessage = $typeMessage;

        return $this;
    }

    /**
     * Get typeMessage
     *
     * @return string
     */
    public function getTypeMessage()
    {
        return $this->typeMessage;
    }

    /**
     * Set dateEnvoi
     *
     * @param \DateTime $dateEnvoi
     *
     * @return AlerteMessage
     */
    public function setDateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    /**
     * Get dateEnvoi
     *
     * @return \DateTime
     */
    public function getDateEnvoi()
    {
        return $this->dateEnvoi;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return AlerteMessage
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return AlerteMessage
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set destinataire
     *
     * @param string $destinataire
     *
     * @return AlerteMessage
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get destinataire
     *
     * @return string
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set alerte
     *
     * @param \Doplus\ParatronicBundle\Entity\Alerte $alerte
     *
     * @return AlerteMessage
     */
    public function setAlerte(\Doplus\ParatronicBundle\Entity\Alerte $alerte = null)
    {
        $this->alerte = $alerte;

        return $this;
    }

    /**
     * Get alerte
     *
     * @return \Doplus\ParatronicBundle\Entity\Alerte
     */
    public function getAlerte()
    {
        return $this->alerte;
    }
}
