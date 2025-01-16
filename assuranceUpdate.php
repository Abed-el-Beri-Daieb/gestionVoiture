<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
        require_once "nav.php";
        require_once "crud_assurance.php";
            
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])) {
                $matricule = htmlspecialchars($_GET['matricule']);

                $crud = new crud_assurance();
                $assurance = $crud->find($matricule);
    
                if ($assurance) {
                    $date_debut = $assurance[2];
                    $date_fin = $assurance[3];
                } else {
                    $date_debut = $date_fin = '';
                }
            }

            if(isset($_POST['ok'])){

                $matricule = htmlspecialchars($_POST['matricule']);
                $date_deb_assurance = htmlspecialchars($_POST['date_deb_assurance']);
                $date_fin_assurance = htmlspecialchars($_POST['date_fin_assurance']);

                $assurance = new assurance($matricule, $date_deb_assurance, $date_fin_assurance);
                $crud = new crud_assurance();
                $res = $crud->updateAssurance($assurance);
                
                if($res){
                    header("location:assuranceView.php");
                    exit;
                }
            }   
    ?>

    <form action="assuranceUpdate.php"  method="post" class="form-control">
        <label>Matricule</label><input type="text" name="matricule" value="<?= htmlspecialchars($matricule) ?>" class="form-control" readonly><br>
        <label>Date Debut</label> <input type="date" class="form-control" name="date_deb_assurance" value="<?= htmlspecialchars($date_debut) ?>"><br>
        <label>Date fin</label> <input type="date" class="form-control" name="date_fin_assurance" value="<?= htmlspecialchars($date_fin) ?>"><br>
        <br>
        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>
    
</body>
</html>