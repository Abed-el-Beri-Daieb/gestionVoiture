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
            color: #495057;
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 50px auto;
            max-width: 600px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #005F30;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #333333;
        }

        .form-control {
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .btn {
            margin-top: 15px;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
        }
    </style>
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

    <div class="container">
        <h2>Modifier Assurance</h2>
        <form action="assuranceUpdate.php" method="post">
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" id="matricule" name="matricule" value="<?= htmlspecialchars($matricule) ?>" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="date_deb_assurance">Date Début</label>
                <input type="date" id="date_deb_assurance" name="date_deb_assurance" value="<?= htmlspecialchars($date_debut) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date_fin_assurance">Date Fin</label>
                <input type="date" id="date_fin_assurance" name="date_fin_assurance" value="<?= htmlspecialchars($date_fin) ?>" class="form-control" required>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-lg" name="ok">Modifier</button>
                <button type="reset" class="btn btn-danger btn-lg">Annuler</button>
            </div>
        </form>
    </div>
</body>
</html>