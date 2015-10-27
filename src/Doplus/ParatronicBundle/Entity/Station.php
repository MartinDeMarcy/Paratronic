<?php

namespace Doplus\ParatronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Station
 *
 * @ORM\Table(name="ps_station")
 * @ORM\Entity(repositoryClass="Doplus\ParatronicBundle\Repository\StationRepository")
 * @UniqueEntity("nom", message="Une station ayant le même nom existe déjà.")
 * @UniqueEntity("codeHydrologique", message="Une station ayant le même code hydrologique existe déjà.")
 */
class Station
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
    /**
     * @ORM\ManyToOne(targetEntity="Doplus\ParatronicBundle\Entity\Client", cascade={"persist"})
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

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
     * @ORM\Column(name="coordonnees_gps_lng", type="string", length=255, nullable=true)
     */
    private $coordonneesGpsLng;

    /**
     * @var string
     *
     * @ORM\Column(name="coordonnees_gps_lat", type="string", length=255, nullable=true)
     */
    private $coordonneesGpsLat;

    /**
     * @var string
     *
     * @ORM\Column(name="code_hydrologique", type="string", length=255, unique=true)
     */
    private $codeHydrologique;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_capteurs", type="integer", nullable=true)
     */
    private $nbCapteurs;


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
     * @return Station
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
     * @return Station
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Station
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
     * @return Station
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
     * @return Station
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
     * Set coordonneesGpsLng
     *
     * @param string $coordonneesGpsLng
     *
     * @return Station
     */
    public function setCoordonneesGpsLng($coordonneesGpsLng)
    {
        $this->coordonneesGpsLng = $coordonneesGpsLng;

        return $this;
    }

    /**
     * Get coordonneesGpsLng
     *
     * @return string
     */
    public function getCoordonneesGpsLng()
    {
        return $this->coordonneesGpsLng;
    }

    /**
     * Set coordonneesGpsLat
     *
     * @param string $coordonneesGpsLat
     *
     * @return Station
     */
    public function setCoordonneesGpsLat($coordonneesGpsLat)
    {
        $this->coordonneesGpsLat = $coordonneesGpsLat;

        return $this;
    }

    /**
     * Get coordonneesGpsLat
     *
     * @return string
     */
    public function getCoordonneesGpsLat()
    {
        return $this->coordonneesGpsLat;
    }

    /**
     * Set codeHydrologique
     *
     * @param string $codeHydrologique
     *
     * @return Station
     */
    public function setCodeHydrologique($codeHydrologique)
    {
        $this->codeHydrologique = $codeHydrologique;

        return $this;
    }

    /**
     * Get codeHydrologique
     *
     * @return string
     */
    public function getCodeHydrologique()
    {
        return $this->codeHydrologique;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Station
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Station
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
     * Set nbCapteurs
     *
     * @param integer $nbCapteurs
     *
     * @return Station
     */
    public function setNbCapteurs($nbCapteurs)
    {
        $this->nbCapteurs = $nbCapteurs;

        return $this;
    }

    /**
     * Get nbCapteurs
     *
     * @return integer
     */
    public function getNbCapteurs()
    {
        return $this->nbCapteurs;
    }
    
     /**
     * add nbUtilisateurs
     *
     * @return Client
     */
    public function addCapteur()
    {
        $this->nbCapteurs += 1;
        
        return $this;
    }
    
    /**
     * add nbUtilisateurs
     *
     * @return Client
     */
    public function deleteCapteur()
    {
        if ($this->nbCapteurs != 0) {
            $this->nbCapteurs -= 1;
        }
        
        return $this;
    }
    
    /**
     * Set client
     *
     * @param \Doplus\ParatronicBundle\Entity\Client $client
     *
     * @return Station
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
        return 'uploads/documents/StationPictures';
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
            $this->getClient()->getCodeClient().'_station-picture_'.$this->getCodeHydrologique().'_'.$this->getImage()->getClientOriginalName()
        );

        // set the pathImage property to the filename where you've saved the file
        $this->pathImage = $this->getClient()->getCodeClient().'_station-picture_'.$this->getCodeHydrologique().'_'.$this->getImage()->getClientOriginalName();

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
}
