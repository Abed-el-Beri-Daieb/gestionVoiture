<?php
    require_once "connexion.php";
    require_once "pneu.php";

    class crud_pneu{
        private $pdo;
        function __construct()
        {
            $connexion = new connexion();
            $this->pdo = $connexion->getConnexion();
        }

        function findAllPneu(){
            $sql = "select * from pneu";
            $res = $this->pdo->query($sql);
            return $res->fetchAll(PDO::FETCH_NUM);
        }

    }
?>