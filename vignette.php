<?php
class vignette{
    private $matricule;
    private $date_debut;
    private $date_fin;

    public function __construct($matricule,$date_debut,$date_fin)
    {
    $this->matricule = $matricule;
    $this->date_debut = $date_debut;
    $this->date_fin = $date_fin;
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
     * Get the value of date_debut
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * Set the value of date_debut
     */
    public function setDateDebut($date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    /**
     * Get the value of date_fin
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * Set the value of date_fin
     */
    public function setDateFin($date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

}


?>