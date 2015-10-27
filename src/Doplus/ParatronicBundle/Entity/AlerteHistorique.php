<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlerteHistorique
 *
 * @ORM\Table(name="ps_alerte_historique")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\AlerteHistoriqueRepository")
 */
class AlerteHistorique
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
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Mesure", cascade={"persist"})
     * @ORM\JoinColumn(name="mesure_id", referencedColumnName="id")
     */
    private $mesure;

    /**
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_alerte", type="date")
     */
    private $dateAlerte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_acquittement", type="date")
     */
    private $dateAcquittement;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Capteur", cascade={"persist"})
     * @ORM\JoinColumn(name="capteur_id", referencedColumnName="id")
     */
    private $capteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="bool_alerte_mail", type="integer")
     */
    private $boolAlerteMail;

    /**
     * @var integer
     *
     * @ORM\Column(name="bool_alerte_sms", type="integer")
     */
    private $boolAlerteSms;

    /**
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(name="utilisateur_id_acquittement", referencedColumnName="id")
     */
    private $utilisateurAcquittement;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveau_alerte", type="integer")
     */
    private $niveauAlerte;


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
     * Set dateAlerte
     *
     * @param \DateTime $dateAlerte
     *
     * @return AlerteHistorique
     */
    public function setDateAlerte($dateAlerte)
    {
        $this->dateAlerte = $dateAlerte;

        return $this;
    }

    /**
     * Get dateAlerte
     *
     * @return \DateTime
     */
    public function getDateAlerte()
    {
        return $this->dateAlerte;
    }

    /**
     * Set dateAcquittement
     *
     * @param \DateTime $dateAcquittement
     *
     * @return AlerteHistorique
     */
    public function setDateAcquittement($dateAcquittement)
    {
        $this->dateAcquittement = $dateAcquittement;

        return $this;
    }

    /**
     * Get dateAcquittement
     *
     * @return \DateTime
     */
    public function getDateAcquittement()
    {
        return $this->dateAcquittement;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return AlerteHistorique
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
     * Set boolAlerteMail
     *
     * @param integer $boolAlerteMail
     *
     * @return AlerteHistorique
     */
    public function setBoolAlerteMail($boolAlerteMail)
    {
        $this->boolAlerteMail = $boolAlerteMail;

        return $this;
    }

    /**
     * Get boolAlerteMail
     *
     * @return integer
     */
    public function getBoolAlerteMail()
    {
        return $this->boolAlerteMail;
    }

    /**
     * Set boolAlerteSms
     *
     * @param integer $boolAlerteSms
     *
     * @return AlerteHistorique
     */
    public function setBoolAlerteSms($boolAlerteSms)
    {
        $this->boolAlerteSms = $boolAlerteSms;

        return $this;
    }

    /**
     * Get boolAlerteSms
     *
     * @return integer
     */
    public function getBoolAlerteSms()
    {
        return $this->boolAlerteSms;
    }

    /**
     * Set niveauAlerte
     *
     * @param integer $niveauAlerte
     *
     * @return AlerteHistorique
     */
    public function setNiveauAlerte($niveauAlerte)
    {
        $this->niveauAlerte = $niveauAlerte;

        return $this;
    }

    /**
     * Get niveauAlerte
     *
     * @return integer
     */
    public function getNiveauAlerte()
    {
        return $this->niveauAlerte;
    }

    /**
     * Set alerte
     *
     * @param \Doplus\ParatronicBundle\Entity\Alerte $alerte
     *
     * @return AlerteHistorique
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

    /**
     * Set mesure
     *
     * @param \Doplus\ParatronicBundle\Entity\Mesure $mesure
     *
     * @return AlerteHistorique
     */
    public function setMesure(\Doplus\ParatronicBundle\Entity\Mesure $mesure = null)
    {
        $this->mesure = $mesure;

        return $this;
    }

    /**
     * Get mesure
     *
     * @return \Doplus\ParatronicBundle\Entity\Mesure
     */
    public function getMesure()
    {
        return $this->mesure;
    }

    /**
     * Set utilisateur
     *
     * @param \Doplus\ParatronicBundle\Entity\Utilisateur $utilisateur
     *
     * @return AlerteHistorique
     */
    public function setUtilisateur(\Doplus\ParatronicBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Doplus\ParatronicBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set capteur
     *
     * @param \Doplus\ParatronicBundle\Entity\Capteur $capteur
     *
     * @return AlerteHistorique
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

    /**
     * Set utilisateurAcquittement
     *
     * @param \Doplus\ParatronicBundle\Entity\Utilisateur $utilisateurAcquittement
     *
     * @return AlerteHistorique
     */
    public function setUtilisateurAcquittement(\Doplus\ParatronicBundle\Entity\Utilisateur $utilisateurAcquittement = null)
    {
        $this->utilisateurAcquittement = $utilisateurAcquittement;

        return $this;
    }

    /**
     * Get utilisateurAcquittement
     *
     * @return \Doplus\ParatronicBundle\Entity\Utilisateur
     */
    public function getUtilisateurAcquittement()
    {
        return $this->utilisateurAcquittement;
    }
}
