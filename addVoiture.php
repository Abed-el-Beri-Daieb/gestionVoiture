<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

<?php
    require_once "nav.php";
    if (isset($_POST['ok'])) {
        require_once "crud_voiture.php";
        require_once "crud_assurance.php";
        require_once "crud_vignette.php";
        require_once "crud_pneu.php";

        $crudVoi = new crud_voiture();
        $id_voiture = htmlspecialchars($_POST['id_v']);
        $matricule = htmlspecialchars($_POST['mat']);
        $type = htmlspecialchars($_POST['type']);
        $carte_grise = htmlspecialchars($_POST['carte']);
    
        $voiture = new voiture($id_voiture, $matricule, $type, $carte_grise);
        $res = $crudVoi->addVoiture($voiture);

        $crudA = new crud_assurance();
        $date_deb_assurance = htmlspecialchars($_POST['date_deb_assurance']);
        $date_fin_assurance = htmlspecialchars($_POST['date_fin_assurance']);
        $validite_assurance = "1 mois"; // a modifier (soustraction)

        $assurance = new assurance($matricule,$date_deb_assurance,$date_fin_assurance,$validite_assurance);
        $res2 = $crudA->addAssurance($assurance);

        $crudVig = new crud_vignette();
        $date_deb_vignette = htmlspecialchars($_POST['date_deb_vignette']);
        $date_fin_vignette = htmlspecialchars($_POST['date_fin_vignette']);
        $validite_vignette = "1 mois"; // a modifier (soustraction)

        $vignette = new vignette($matricule,$date_deb_vignette,$date_fin_vignette,$validite_vignette);
        $res3 = $crudVig->addVignette($vignette);

        $crudP = new crud_pneu();
        $type_pneu = htmlspecialchars($_POST['type_pneu']);
        $date_installation = htmlspecialchars($_POST['date_installation']);
        $nb_kilometre = htmlspecialchars($_POST['nb_kilometre']);

        $pneu = new pneu($matricule,$type_pneu,$date_installation,$nb_kilometre);
        $res4 = $crudP->addPneu($pneu);

        if ($res4) {
            header("location:index.php");
            exit;
        }
    }
?>
<h2 style="text-align: center; margin-bottom: 3%; color: navy;">Ajouter voiture :</h2>
<form action="addVoiture.php" method="post" class=form-control>
    <label>id Voiture</label><input type="text" name="id_v" id="" class=form-control></br> 
    <label>Matricule</label><input type="text" name="mat" id="" class=form-control></br>
    <label>Type</label><input type="text" name="type" id="" class=form-control></br>
    <label>Carte grise</label><input type="text" name="carte" id="" class=form-control></br>

    <label>Date_Debut_Assurance</label><input type="date" name="date_deb_assurance" class="form-control"><br>
    <label>Date_Fin_Assurance</label><input type="date" name="date_fin_assurance" class="form-control"><br>

    <label>Date_Debut_Vignette</label><input type="date" name="date_deb_vignette" class="form-control"><br>
    <label>Date_Fin_Vignette</label><input type="date" name="date_fin_vignette" class="form-control"><br>

    <label>Type de Pneu</label><input type="text" name="type_pneu" id="" class=form-control></br>
    <label>Date Installation</label><input type="date" name="date_installation" id="" class=form-control></br>
    <label>nb Kilometrage</label><input type="number" name="nb_kilometre" id="" class=form-control></br>

    <input type="submit" value="Ajouter" name="ok" class="btn btn-success btn-lg">
    <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
</form>


</body>
</html>