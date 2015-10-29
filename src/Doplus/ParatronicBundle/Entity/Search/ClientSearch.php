<?php

namespace Doplus\ParatronicBundle\Entity\Search;

/**
 * Classe utilisée pour la recherche d'un client
 */
class ClientSearch
{
    protected $entite;
    
    protected $cp;
    
    protected $ville;
    
    public function getEntite() {
        return $this->entite;
    }
    
    public function setEntite($entite) {
        $this->entite = $entite;
        return $this;
    }
    
    public function getCp() {
        return $this->cp;
    }
    
    public function setCp($cp) {
        $this->cp = $cp;
        return $this;
    }
    
    public function getVille() {
        return $this->ville;
    }
    
    public function setVille($ville) {
        $this->ville = $ville;
        return $this;
    }
    
    public function isEmpty() {
        return $this->getEntite() === null
                && $this->getCp() === null
                && $this->getVille() === null
        ;
    }
}