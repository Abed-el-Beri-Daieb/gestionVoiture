<?php
    require_once "reparation.php";
    require_once "connexion.php";

    class crud_reparation{
        private $pdo;
        function __construct()
        {
            $connexion = new connexion();
            $this->pdo = $connexion->getConnexion();
        }

        function findAllReparation(){
            $sql = "select * from reparation";
            $res = $this->pdo->query($sql);
            return $res->fetchAll(PDO::FETCH_NUM);
        }

        function addReparation(reparation $reparation){
            $matricule = $reparation->getMatricule();
            $prix = $reparation->getPrix();
            $date = $reparation->getDate();
            $designation = $reparation->getDesignation();
            $fournisseur = $reparation->getFournisseur();

            $sql = "insert into reparation values (null,'$matricule',$prix,'$date','$designation','$fournisseur')";
            $res = $this->pdo->exec($sql);
            return $res;
        }

        function updateReparation(reparation $reparation){
            $matricule = $reparation->getMatricule();
            $prix = $reparation->getPrix();
            $date = $reparation->getDate();
            $designation = $reparation->getDesignation();
            $fournisseur = $reparation->getFournisseur();

            $sql = "update reparation 
                    set prix = $prix
                    , date = '$date'
                    , designation = '$designation'
                    , fournisseur = '$fournisseur'
                    where matricule = '$matricule'";
            $res = $this->pdo->exec($sql);
            return $res;
        }

        function find($matricule){
            $sql = "select * from reparation where matricule = '$matricule' ";
            $res = $this->pdo->query($sql);
            return $res->fetch(PDO::FETCH_NUM);
        }
    }
?>