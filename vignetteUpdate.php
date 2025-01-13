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

    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])){
        $matricule = htmlspecialchars($_GET['matricule']);
    }

    if(isset($_POST['ok'])){
        require_once "crud_vignette.php";

        $matricule = htmlspecialchars($_POST['matricule']);
        $date_debut = htmlspecialchars($_POST['date_deb_vignette']);
        $date_fin = htmlspecialchars($_POST['date_fin_vignette']);
        $validite = "1 mois"; // a modifier (soustraction)

        $crud = new crud_vignette();
        $vignette = new vignette($matricule, $date_debut, $date_fin, $validite);
        $res = $crud->updateVignette($vignette);

        if($res){
            header("location:vignetteView.php");
            exit;
        }

    }


    ?>

    <form action="vignetteUpdate.php" method="post" class="form-control">
        <label>Matricule</label><input type="text" class="form-control" name="matricule" value=<?= htmlspecialchars($matricule) ?> readonly> <br>
        <label>Date_Debut</label><input type="date" class="form-control" name="date_deb_vignette"> <br>
        <label>Date_Fin</label> <input type="date" class="form-control" name="date_fin_vignette"> <br> <br>

        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>
    
</body>
</html>