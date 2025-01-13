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
            
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])) {
                $matricule = htmlspecialchars($_GET['matricule']);
            }

            if(isset($_POST['ok'])){
                require_once "crud_voiture.php";

                $id_voiture = htmlspecialchars($_POST['id_voiture']);
                $matricule = htmlspecialchars($_POST['matricule']);
                $type = htmlspecialchars($_POST['type']);
                $carte_grise = htmlspecialchars($_POST['carte_grise']);

                $voiture = new voiture($id_voiture, $matricule, $type, $carte_grise);
                $crud = new crud_voiture();
                $res = $crud->updateVoiture($voiture);
                
                if($res){
                    header("location:index.php");
                    exit;
                }
            }   
    ?>

    <form action="voitureUpdate.php"  method="post" class="form-control">
        <label>Matricule</label><input type="text" name="matricule" value="<?= htmlspecialchars($matricule) ?>" class="form-control" readonly><br>
        <label>id_voiture</label> <input type="number" class="form-control" name="id_voiture"><br>
        <label>Type</label> <input type="text" class="form-control" name="type"><br>
        <label>Carte Grise</label> <input type="text" class="form-control" name="carte_grise"><br>
        
        <br>
        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>
    
</body>
</html>