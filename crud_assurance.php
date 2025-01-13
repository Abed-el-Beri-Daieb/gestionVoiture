<?php
    require_once "connexion.php";
    require_once "assurance.php";

    class crud_assurance{
        private $pdo;
        function __construct()
        {
            $connexion = new connexion();
            $this->pdo = $connexion->getConnexion();
        }

        function findAllAssurance(){
            $sql = "select * from assurance";
            $res = $this->pdo->query($sql);
            return $res->fetchAll(PDO::FETCH_NUM);
        }

        function addAssurance(assurance $assurance){
            $matricule = $assurance->getMatricule();
            $date_deb_assurance = $assurance->getDateDebut();
            $date_fin_assurance = $assurance->getDateFin();
            $validite = $assurance->getValidite();

            $sql = "insert into assurance values (null,'$matricule','$date_deb_assurance','$date_fin_assurance','$validite')";
            $res = $this->pdo->exec($sql);
            return $res;
        }

        function updateAssurance(assurance $assurance){
            $matricule = $assurance->getMatricule();
            $date_debut = $assurance->getDateDebut();
            $date_fin = $assurance->getDateFin();
            $validite = $assurance->getValidite();

            $sql = "update assurance 
                    set date_debut = '$date_debut'
                    , date_fin = '$date_fin'
                    , validite = '$validite'
                    where matricule = '$matricule'";
            $res = $this->pdo->exec($sql);
            return $res;
        }

    }
?>