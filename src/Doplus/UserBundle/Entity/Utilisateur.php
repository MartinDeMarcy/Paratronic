<?php

namespace Doplus\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Doplus\UserBundle\Entity\UtilisateurRepository")
 * @UniqueEntity("username")
 * @UniqueEntity("email")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
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
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Client", cascade={"persist"})
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255, nullable=true)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var choice
     *
     * @ORM\Column(name="droits", type="integer", nullable=true)
     * @Assert\Choice(choices = {"ROLE_USER", "ROLE_SUPER_USER", "ROLE_ADMIN"})
     */
    private $droits;

    /**
     * @var choice
     *
     * @ORM\Column(name="alerte", type="integer", nullable=true)
     * @Assert\Choice(choices = {"0", "1"})
     */
    private $alerte;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveau_alerte", type="integer", nullable=true)
     */
    private $niveauAlerte;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean", nullable=true)
     */
    private $etat;
    
    /**
     * Set image
     *
     * @param string $image
     *
     * @return Utilisateur
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return Utilisateur
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Utilisateur
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
     * Set droits
     *
     * @param integer $droits
     *
     * @return Utilisateur
     */
    public function setDroits($droits)
    {
        $this->droits = $droits;

        return $this;
    }

    /**
     * Get droits
     *
     * @return integer
     */
    public function getDroits()
    {
        return $this->droits;
    }

    /**
     * Set alerte
     *
     * @param integer $alerte
     *
     * @return Utilisateur
     */
    public function setAlerte($alerte)
    {
        $this->alerte = $alerte;

        return $this;
    }

    /**
     * Get alerte
     *
     * @return integer
     */
    public function getAlerte()
    {
        return $this->alerte;
    }

    /**
     * Set niveauAlerte
     *
     * @param integer $niveauAlerte
     *
     * @return Utilisateur
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
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Utilisateur
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
     * Set pathImage
     *
     * @param string $pathImage
     *
     * @return Utilisateur
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
        return 'uploads/documents/UserPictures';
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
            $this->getClient()->getCodeClient().'_user-picture_'.$this->getUsername().'_'.$this->getImage()->getClientOriginalName()
        );

        // set the pathImage property to the filename where you've saved the file
        $this->pathImage = $this->getClient()->getCodeClient().'_user-picture_'.$this->getUsername().'_'.$this->getImage()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->image = null;
    }
    
    public function removeFile($path)
    {
        $file_path = $this->getUploadRootDir().'/'.$path;
        if(file_exists($file_path) && $path != NULL) {
            chmod($file_path, 0777);
            unlink($file_path);
        }
    }
    
    /**
     * Set client
     *
     * @param \Doplus\ParatronicBundle\Entity\Client $client
     *
     * @return Utilisateur
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
