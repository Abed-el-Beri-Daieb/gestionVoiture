<?php
class voiture {
    private $id_voiture;
    private $matricule;
    private $type;
    private $carte_grise;

    public function __construct($id_voiture,$matricule,$type,$carte_grise)
    {
        $this->id_voiture = $id_voiture;
        $this->matricule = $matricule;
        $this->type = $type;
        $this->carte_grise = $carte_grise;
        
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
     * Get the value of carte_grise
     */
    public function getCarteGrise()
    {
        return $this->carte_grise;
    }

    /**
     * Set the value of carte_grise
     */
    public function setCarteGrise($carte_grise): self
    {
        $this->carte_grise = $carte_grise;

        return $this;
    }

    /**
     * Get the value of id_voiture
     */
    public function getIdVoiture()
    {
        return $this->id_voiture;
    }

    /**
     * Set the value of id_voiture
     */
    public function setIdVoiture($id_voiture): self
    {
        $this->id_voiture = $id_voiture;

        return $this;
    }
}

?>