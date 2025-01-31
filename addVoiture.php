<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Voiture</title>
    <link rel="stylesheet" href="bootstrap6.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
        }

        .container {
            margin-top: 30px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #005F30;
        }

        label {
            font-weight: bold;
            color: #333333;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .btn {
            margin-top: 10px;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<?php
    require_once "nav.php";
    if (isset($_POST['ok'])) {
        require_once "crud_voiture.php";
        require_once "crud_assurance.php";
        require_once "crud_vignette.php";

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
        $assurance = new assurance($matricule,$date_deb_assurance,$date_fin_assurance);
        $res2 = $crudA->addAssurance($assurance);

        $crudVig = new crud_vignette();
        $date_deb_vignette = htmlspecialchars($_POST['date_deb_vignette']);
        $date_fin_vignette = htmlspecialchars($_POST['date_fin_vignette']);
        $vignette = new vignette($matricule,$date_deb_vignette,$date_fin_vignette);
        $res3 = $crudVig->addVignette($vignette);


        if ($res3) {
            header("location:index.php");
            exit;
        }
    }
?>

<div class="container">
    <h2 class="text-center">Ajouter Voiture</h2>
    <form action="addVoiture.php" method="post">

        <!-- Voiture -->
        <div class="form-group">
            <label for="id_v">id Voiture</label>
            <input type="text" name="id_v" id="id_v" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mat">Matricule</label>
            <input type="text" name="mat" id="mat" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="carte">Carte Grise</label>
            <input type="text" name="carte" id="carte" class="form-control" required>
        </div>

        <!-- Assurance -->
        <div class="form-group">
            <label for="date_deb_assurance">Date Début Assurance</label>
            <input type="date" name="date_deb_assurance" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_fin_assurance">Date Fin Assurance</label>
            <input type="date" name="date_fin_assurance" class="form-control" required>
        </div>

        <!-- Vignette -->
        <div class="form-group">
            <label for="date_deb_vignette">Date Début Vignette</label>
            <input type="date" name="date_deb_vignette" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_fin_vignette">Date Fin Vignette</label>
            <input type="date" name="date_fin_vignette" class="form-control" required>
        </div>


        <div class="form-group text-center">
            <input type="submit" value="Ajouter" name="ok" class="btn btn-success btn-lg">
            <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
        </div>
    </form>
</div>

</body>
</html>
