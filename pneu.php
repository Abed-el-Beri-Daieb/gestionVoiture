<?php
class pneu{
    private $matricule;
    private $type;
    private $date_installation;
    private $nb_kilometre;

    public function __construct($matricule,$type,$date_installation,$nb_kilometre)
    {
    $this->matricule = $matricule;
    $this->type = $type;
    $this->date_installation = $date_installation;
    $this->nb_kilometre = $nb_kilometre;
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
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of date_installation
     */
    public function getDateInstallation()
    {
        return $this->date_installation;
    }

    /**
     * Set the value of date_installation
     */
    public function setDateInstallation($date_installation): self
    {
        $this->date_installation = $date_installation;

        return $this;
    }

    /**
     * Get the value of nb_kilometre
     */
    public function getNbKilometre()
    {
        return $this->nb_kilometre;
    }

    /**
     * Set the value of nb_kilometre
     */
    public function setNbKilometre($nb_kilometre): self
    {
        $this->nb_kilometre = $nb_kilometre;

        return $this;
    }
}


?>