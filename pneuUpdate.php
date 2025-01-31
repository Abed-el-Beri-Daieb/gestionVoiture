<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>getionVoiture</title>
    <link rel="stylesheet" href="bootstrap6.css">
    <style>
        body {
            background-color: #f3f4f6;
            color: #333;
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

<div class="container">
        <h2>Modifier Pneu</h2>
        <form action="pneuUpdate.php" method="post">
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" id="matricule" name="matricule" class="form-control" value="<?= htmlspecialchars($matricule) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" class="form-control" value="<?= htmlspecialchars($type) ?>">
            </div>

            <div class="form-group">
                <label for="date_installation">Date d'installation</label>
                <input type="date" id="date_installation" name="date_installation" class="form-control" value="<?= htmlspecialchars($date_installation) ?>">
            </div>

            <div class="form-group">
                <label for="nb">Kilométrage</label>
                <input type="number" id="nb" name="nb" class="form-control" value="<?= htmlspecialchars($nb_kilometre) ?>">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-lg" name="ok">Modifier</button>
                <button type="reset" class="btn btn-danger btn-lg">Annuler</button>
            </div>
        </form>
    </div>

</body>
</html>