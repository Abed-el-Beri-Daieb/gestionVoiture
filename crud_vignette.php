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

    }
?>