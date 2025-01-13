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

            /*$matricule = htmlspecialchars($_GET['matricule']);
             // il y'a un probleme ici $matricule undefined after $_POST*/
            
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])) {
                $matricule = htmlspecialchars($_GET['matricule']);
            }

            if(isset($_POST['ok'])){
                require_once "crud_assurance.php";

                $matricule = htmlspecialchars($_POST['matricule']);
                $date_deb_assurance = htmlspecialchars($_POST['date_deb_assurance']);
                $date_fin_assurance = htmlspecialchars($_POST['date_fin_assurance']);
                $validite = "1 mois"; // a modifier (soustraction)

                $assurance = new assurance($matricule, $date_deb_assurance, $date_fin_assurance, $validite);
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
        <label>Date Debut</label> <input type="date" class="form-control" name="date_deb_assurance"><br>
        <label>Date fin</label> <input type="date" class="form-control" name="date_fin_assurance"><br>
        <br>
        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>
    
</body>
</html>