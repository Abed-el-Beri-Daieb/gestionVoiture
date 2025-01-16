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
        require_once "crud_reparation.php"; 
            
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])) {
                $matricule = htmlspecialchars($_GET['matricule']);

                $crud = new crud_reparation();
                $reparation = $crud->find($matricule);

                if ($reparation) {
                    $prix = $reparation[2];
                    $date = $reparation[3];
                    $designation = $reparation[4];
                    $fournisseur = $reparation[5];
                } else {
                    $prix = $date = $designation = $fournisseur = '';
                }

            }

            if(isset($_POST['ok'])){

                $prix = htmlspecialchars($_POST['prix']);
                $date = htmlspecialchars($_POST['date']);
                $designation = htmlspecialchars($_POST['designation']);
                $fournisseur = htmlspecialchars($_POST['fournisseur']);

                $reparation = new reparation($matricule, $prix, $date, $designation, $fournisseur);
                $crud = new crud_reparation();
                $res = $crud->updateReparation($reparation);
                
                if($res){
                    header("location:reparationView.php");
                    exit;
                }
            }   
    ?>

    <form action="reparationUpdate.php"  method="post" class="form-control">
        <label>Matricule</label><input type="text" name="matricule" value="<?= htmlspecialchars($matricule) ?>" class="form-control" readonly><br>
        <label>Prix</label> <input type="number" class="form-control" name="prix" value="<?= htmlspecialchars($prix) ?>"><br>
        <label>Designation</label> <input type="text" class="form-control" name="designation" value="<?= htmlspecialchars($designation) ?>"><br>
        <label>Fournisseur</label> <input type="text" class="form-control" name="fournisseur" value="<?= htmlspecialchars($fournisseur) ?>"><br>
        
        <br>
        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>
    
</body>
</html>