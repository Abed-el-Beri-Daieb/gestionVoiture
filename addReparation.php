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
        require_once "crud_reparation.php";

        $crud = new crud_reparation();

        $matricule = htmlspecialchars($_POST['matricule']);
        $prix = htmlspecialchars($_POST['prix']);
        $date = htmlspecialchars($_POST['date']);
        $designation = htmlspecialchars($_POST['designation']);
        $fournisseur = htmlspecialchars($_POST['fournisseur']);
    
        $reparation = new reparation($matricule, $prix, $date, $designation, $fournisseur);
        $res = $crud->addReparation($reparation);

        if ($res) {
            header("location:reparationView.php");
            exit;
        }
    }
?>
<h2 style="text-align: center; margin-bottom: 3%; color: navy;">Ajouter Reparation :</h2>
<form action="addReparation.php" method="post" class=form-control>

    <label>Matricule</label><input type="text" name="matricule" id="" class=form-control></br>
    <label>Prix</label><input type="number" name="prix" id="" class=form-control step="any"></br> 
    <label>Date</label><input type="date" name="date" id="" class=form-control></br>
    <label>Designation</label><input type="text" name="designation" id="" class=form-control></br>
    <label>Fournisseur</label><input type="text" name="fournisseur" id="" class=form-control></br>

    <input type="submit" value="Ajouter" name="ok" class="btn btn-success btn-lg">
    <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
</form>


</body>
</html>