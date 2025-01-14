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

        function updateVignette(vignette $vignette){
            $matricule = $vignette->getMatricule();
            $date_debut = $vignette->getDateDebut();
            $date_fin = $vignette->getDateFin();
            $validite = $vignette->getValidite();

            $sql = "update vignette
                    set date_debut = '$date_debut'
                    , date_fin = '$date_fin'
                    , validite = '$validite'
                    where matricule = '$matricule'";
            
            $res = $this->pdo->exec($sql);
            return $res;
        }

        function find($matricule){
            $sql = "select * from vignette where matricule = '$matricule'";
            $res = $this->pdo->query($sql);
            return $res->fetch(PDO::FETCH_NUM);
        }

    }
?>