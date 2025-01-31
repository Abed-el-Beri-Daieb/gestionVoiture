<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionVoiture</title>
    <link rel="stylesheet" href="bootstrap6.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #005F30;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #495057;
        }

        .form-control {
            margin-bottom: 20px;
            border-radius: 5px;
            padding: 10px;
        }

        .btn {
            margin-top: 15px;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
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


<div class="container">
        <h2>Modifier Vignette</h2>
        <form action="vignetteUpdate.php" method="post">
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" id="matricule" name="matricule" class="form-control" value="<?= htmlspecialchars($matricule) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="date_deb_vignette">Date Début</label>
                <input type="date" id="date_deb_vignette" name="date_deb_vignette" class="form-control" value="<?= htmlspecialchars($date_debut) ?>">
            </div>

            <div class="form-group">
                <label for="date_fin_vignette">Date Fin</label>
                <input type="date" id="date_fin_vignette" name="date_fin_vignette" class="form-control" value="<?= htmlspecialchars($date_fin) ?>">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-lg" name="ok">Modifier</button>
                <button type="reset" class="btn btn-danger btn-lg">Annuler</button>
            </div>
        </form>
    </div>
    
</body>
</html>