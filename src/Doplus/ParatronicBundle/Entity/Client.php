<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Client
 *
 * @ORM\Table(name="ps_client")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\ClientRepository")
 * @UniqueEntity("raisonSociale", message="Un client ayant la même raison sociale existe déjà.")
 * @UniqueEntity("codeClient", message="Un client ayant le même code client existe déjà.")
 */
class Client
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
     * @Assert\File(maxSize="6000000")
     */
    private $image;
    
    /**
     * @var string
     *
     * @ORM\Column(name="path_image", type="string", length=255, nullable=true)
     */
    private $pathImage;
    
    /**
     * @var string
     *
     * @ORM\Column(name="statut_juridique", type="string", length=255, nullable=true)
     */
    private $statutJuridique;

    /**
     * @var string
     *
     * @ORM\Column(name="raison_sociale", type="string", length=255, nullable=true, unique=true)
     */
    private $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="service", type="string", length=255, nullable=true)
     */
    private $service;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=255, nullable=true)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="coordonnees_administratives", type="string", length=255, nullable=true)
     */
    private $coordonneesAdministratives;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_responsable", type="string", length=255, nullable=true)
     */
    private $nomResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_responsable", type="string", length=255, nullable=true)
     */
    private $prenomResponsable;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="integer")
     * @Assert\Choice(choices = {"0", "1"})
     */
    private $statut;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_utilisateurs", type="integer", nullable=true)
     */
    private $nbUtilisateurs;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_stations", type="integer", nullable=true)
     */
    private $nbStations;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="code_client", type="string", length=255, unique=true)
     */
    private $codeClient;

  
    /**
     * add nbUtilisateurs
     *
     * @return Client
     */
    public function addUtilisateur()
    {
        $this->nbUtilisateurs += 1;
        
        return $this;
    }
    
    /**
     * add nbUtilisateurs
     *
     * @return Client
     */
    public function deleteUtilisateur()
    {
        if ($this->nbUtilisateurs != 0) {
            $this->nbUtilisateurs -= 1;
        }
        
        return $this;
    }
    
    /**
     * add nbStations
     *
     * @return Client
     */
    public function addStation()
    {
        $this->nbStations += 1;
        
        return $this;
    }
    
    /**
     * add nbStations
     *
     * @return Client
     */
    public function deleteStation()
    {
        if ($this->nbStations != 0) {
            $this->nbStations -= 1;
        }
        
        return $this;
    }

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
     * Set image
     *
     * @param string $image
     *
     * @return Client
     */
    public function setImage(UploadedFile $image = null)
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
     * Set statutJuridique
     *
     * @param string $statutJuridique
     *
     * @return Client
     */
    public function setStatutJuridique($statutJuridique)
    {
        $this->statutJuridique = $statutJuridique;

        return $this;
    }

    /**
     * Get statutJuridique
     *
     * @return string
     */
    public function getStatutJuridique()
    {
        return $this->statutJuridique;
    }

    /**
     * Set raisonSociale
     *
     * @param string $raisonSociale
     *
     * @return Client
     */
    public function setRaisonSociale($raisonSociale)
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    /**
     * Get raisonSociale
     *
     * @return string
     */
    public function getRaisonSociale()
    {
        return $this->raisonSociale;
    }

    /**
     * Set service
     *
     * @param string $service
     *
     * @return Client
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return Client
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Client
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set coordonneesAdministratives
     *
     * @param string $coordonneesAdministratives
     *
     * @return Client
     */
    public function setCoordonneesAdministratives($coordonneesAdministratives)
    {
        $this->coordonneesAdministratives = $coordonneesAdministratives;

        return $this;
    }

    /**
     * Get coordonneesAdministratives
     *
     * @return string
     */
    public function getCoordonneesAdministratives()
    {
        return $this->coordonneesAdministratives;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Client
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Client
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set nomResponsable
     *
     * @param string $nomResponsable
     *
     * @return Client
     */
    public function setNomResponsable($nomResponsable)
    {
        $this->nomResponsable = $nomResponsable;

        return $this;
    }

    /**
     * Get nomResponsable
     *
     * @return string
     */
    public function getNomResponsable()
    {
        return $this->nomResponsable;
    }

    /**
     * Set prenomResponsable
     *
     * @param string $prenomResponsable
     *
     * @return Client
     */
    public function setPrenomResponsable($prenomResponsable)
    {
        $this->prenomResponsable = $prenomResponsable;

        return $this;
    }

    /**
     * Get prenomResponsable
     *
     * @return string
     */
    public function getPrenomResponsable()
    {
        return $this->prenomResponsable;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return Client
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set nbUtilisateurs
     *
     * @param integer $nbUtilisateurs
     *
     * @return Client
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
     * Set nbStations
     *
     * @param integer $nbStations
     *
     * @return Client
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
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Client
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
     * Set codeClient
     *
     * @param string $codeClient
     *
     * @return Client
     */
    public function setCodeClient($codeClient)
    {
        $this->codeClient = $codeClient;

        return $this;
    }

    /**
     * Get codeClient
     *
     * @return string
     */
    public function getCodeClient()
    {
        return $this->codeClient;
    }

    /**
     * Set pathImage
     *
     * @param string $pathImage
     *
     * @return File
     */
    public function setPathImage($pathImage)
    {
        $this->pathImage = $pathImage;

        return $this;
    }

    /**
     * Get pathImage
     *
     * @return string
     */
    public function getPathImage()
    {
        return $this->pathImage;
    }
    
    public function getAbsolutePath()
    {
        return null === $this->pathImage
            ? null
            : $this->getUploadRootDir().'/'.$this->pathImage;
    }

    public function getWebPath()
    {
        return null === $this->pathImage
            ? null
            : $this->getUploadDir().'/'.$this->pathImage;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory pathImage where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents/ClientPictures';
    }
    
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getImage()) {
            return;
        }
        
        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getImage()->move(
            $this->getUploadRootDir(),
            $this->getCodeClient().'_client-picture_'.$this->getImage()->getClientOriginalName()
        );

        // set the pathImage property to the filename where you've saved the file
        $this->pathImage = $this->getCodeClient().'_client-picture_'.$this->getImage()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->image = null;
    }
    
    public function removeFile($path)
    {
        $file_path = $this->getUploadRootDir().'/'.$path;
//        var_dump($path);exit();
        if(file_exists($file_path) && $path != NULL) {
            chmod($file_path, 0777);
            unlink($file_path);
        }
    }
}
