<?php
    require_once "connexion.php";
    require_once "vignette.php";

    class crud_vignette{
        private $pdo;
        function __construct()
        {
            $connexion = new connexion();
            $this->pdo = $connexion->getConnexion();
        }

        function findAllVignette(){
            $sql = "select * from vignette";
            $res = $this->pdo->query($sql);
            return $res->fetchAll(PDO::FETCH_NUM);
        }

        function addVignette(vignette $vignette){
            $matricule = $vignette->getMatricule();
            $date_deb_vignette = $vignette->getDateDebut();
            $date_fin_vignette = $vignette->getDateFin();
            $validite = $vignette->getValidite();

            $sql = "insert into vignette values (null,'$matricule','$date_deb_vignette','$date_fin_vignette','$validite')";
            $res = $this->pdo->exec($sql);
            return $res;
        }

    }
?>