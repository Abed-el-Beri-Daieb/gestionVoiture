<?php
include_once "voiture.php";
require_once "connexion.php";

class crud_voiture{
    private $pdo;
    function __construct()
    {
        $connexion = new connexion;
        $this->pdo = $connexion->getConnexion();
    }

    function addVoiture(voiture $voiture){
        $id_voiture = $voiture->getIdVoiture();
        $matricule = $voiture->getMatricule();
        $type = $voiture->getType();
        $carte_grise = $voiture->getCarteGrise();

        $sql = "insert into voiture values ($id_voiture,'$matricule','$type','$carte_grise')";
        $res = $this->pdo->exec($sql);
        return $res;
    }
    
    function findAllVoiture()
    {
        $sql = "select * from voiture";
        $res = $this->pdo->query($sql);
        return $res->fetchAll(PDO::FETCH_NUM);
    }

    function updateVoiture(voiture $voiture){
        $id_voiture = $voiture->getIdVoiture();
        $matricule = $voiture->getMatricule();
        $type = $voiture->getType();
        $carte_grise = $voiture->getCarteGrise();

        $sql = "update voiture 
                set id_voiture = $id_voiture
                , type = '$type'
                , carte_grise = '$carte_grise'
                where matricule = '$matricule'";
        $res = $this->pdo->exec($sql);
        return $res;
    }
}
?>