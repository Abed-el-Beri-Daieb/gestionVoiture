<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionVoiture</title>
    <link rel="stylesheet" href="bootstrap6.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            color: #333; 
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

                $matricule = htmlspecialchars($_POST['matricule']);
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

<div class="container">
        <h2>Modifier Réparation</h2>
        <form action="reparationUpdate.php" method="post">
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" id="matricule" name="matricule" class="form-control" value="<?= htmlspecialchars($matricule) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" id="prix" name="prix" class="form-control" value="<?= htmlspecialchars($prix) ?>">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" class="form-control" value="<?= htmlspecialchars($date) ?>">
            </div>

            <div class="form-group">
                <label for="designation">Désignation</label>
                <input type="text" id="designation" name="designation" class="form-control" value="<?= htmlspecialchars($designation) ?>">
            </div>

            <div class="form-group">
                <label for="fournisseur">Fournisseur</label>
                <input type="text" id="fournisseur" name="fournisseur" class="form-control" value="<?= htmlspecialchars($fournisseur) ?>">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-lg" name="ok">Modifier</button>
                <button type="reset" class="btn btn-danger btn-lg">Annuler</button>
            </div>
        </form>
    </div>
    
</body>
</html>