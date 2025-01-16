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
    require_once "crud_vignette.php";

    if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])){
        $matricule = htmlspecialchars($_GET['matricule']);

        $crud = new crud_vignette();
        $vignette = $crud->find($matricule);

        if ($vignette) {
            $date_debut = $vignette[2];
            $date_fin = $vignette[3];
        } else {
            $date_debut = $date_fin = '';
        }
    }

    if(isset($_POST['ok'])){

        $matricule = htmlspecialchars($_POST['matricule']);
        $date_debut = htmlspecialchars($_POST['date_deb_vignette']);
        $date_fin = htmlspecialchars($_POST['date_fin_vignette']);

        $crud = new crud_vignette();
        $vignette = new vignette($matricule, $date_debut, $date_fin);
        $res = $crud->updateVignette($vignette);

        if($res){
            header("location:vignetteView.php");
            exit;
        }

    }


    ?>

    <form action="vignetteUpdate.php" method="post" class="form-control">
        <label>Matricule</label><input type="text" class="form-control" name="matricule" value=<?= htmlspecialchars($matricule) ?> readonly> <br>
        <label>Date_Debut</label><input type="date" class="form-control" name="date_deb_vignette" value=<?= htmlspecialchars($date_debut) ?>> <br>
        <label>Date_Fin</label> <input type="date" class="form-control" name="date_fin_vignette" value=<?= htmlspecialchars($date_fin) ?>> <br> <br>

        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>
    
</body>
</html>