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

        function addPneu(pneu $pneu){
            $matricule = $pneu->getMatricule();
            $type = $pneu->getType();
            $date_installation = $pneu->getDateInstallation();
            $nb_kilometre = $pneu->getNbKilometre();

            $sql = "insert into pneu values (null,'$matricule','$type','$date_installation','$nb_kilometre')";
            $res = $this->pdo->exec($sql);
            return $res;
        }

        function updatePneu(pneu $pneu){
            $matricule = $pneu->getMatricule();
            $type = $pneu->getType();
            $date_installation = $pneu->getDateInstallation();
            $nb_kilometre = $pneu->getNbKilometre();

            $sql = "update pneu
                    set type = '$type'
                    , date_installation = '$date_installation'
                    , nb_kilometre = $nb_kilometre
                    where matricule = '$matricule'";
            $res = $this->pdo->exec($sql);
            return $res;
        }

    }
?>