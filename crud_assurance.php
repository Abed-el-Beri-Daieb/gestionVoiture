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

    }
?>