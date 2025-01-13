<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>getionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
        require_once "nav.php";

        if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])){
            $matricule = htmlspecialchars($_GET['matricule']);
        }

        if(isset($_POST['ok'])){
            require_once "crud_pneu.php";

            $matricule = htmlspecialchars($_POST['matricule']);
            $type = htmlspecialchars($_POST['type']);
            $date_installation = htmlspecialchars($_POST['date_installation']);
            $nb_kilometre = htmlspecialchars($_POST['nb']);

            $pneu = new pneu($matricule, $type, $date_installation, $nb_kilometre);
            $crud = new crud_pneu();
            $res = $crud->updatePneu($pneu);
            
            if($res){
                header("location:pneuView.php");
                exit;
            }
        }
    ?>

    <form action="pneuUpdate.php" method="post" class="form-control">
        <label>Matricule</label><input type="text" name="matricule" class="form-control" value=<?= htmlspecialchars($matricule) ?> readonly> <br>
        <label>Type</label><input type="text" name="type" class="form-control"><br>
        <label>Date_installation</label><input type="date" name="date_installation" class="form-control"><br>
        <label>Nb_kilometrage</label><input type="number" name="nb" class="form-control"><br><br>

        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>

</body>
</html>