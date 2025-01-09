<?php
class reparation{
    private $matricule;
    private $prix;
    private $date;
    private $designation;
    private $fournisseur;

    public function __construct($matricule,$prix,$date,$designation,$fournisseur)
    {
    $this->matricule = $matricule;
    $this->prix = $prix;
    $this->date = $date;
    $this->designation = $designation;
    $this->fournisseur = $fournisseur;
    }
    

    /**
     * Get the value of matricule
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     */
    public function setMatricule($matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     */
    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate($date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of designation
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set the value of designation
     */
    public function setDesignation($designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get the value of fournisseur
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set the value of fournisseur
     */
    public function setFournisseur($fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }
}


?>