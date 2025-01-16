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
        require_once "crud_pneu.php";

        if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])){
            $matricule = htmlspecialchars($_GET['matricule']);

            $crud = new crud_pneu();
            $pneu = $crud->find($matricule);

            if ($pneu) {
                $type = $pneu[2];
                $date_installation = $pneu[3];
                $nb_kilometre = $pneu[4];
            } else {
                $type = $date_installation = $nb_kilometre = '';
            }
        }

        if(isset($_POST['ok'])){

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
        <label>Type</label><input type="text" name="type" class="form-control" value=<?= htmlspecialchars($type) ?>><br>
        <label>Date_installation</label><input type="date" name="date_installation" class="form-control" value=<?= htmlspecialchars($date_installation) ?>><br>
        <label>Nb_kilometrage</label><input type="number" name="nb" class="form-control" value=<?= htmlspecialchars($nb_kilometre) ?>><br><br>

        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>

</body>
</html>