<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
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
            color: #007bff;
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
        require_once "crud_voiture.php";
            
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['matricule'])) {
                $matricule = htmlspecialchars($_GET['matricule']);

                $crud = new crud_voiture();
                $voiture = $crud->find($matricule);

                if ($voiture) {
                    $id_voiture = $voiture[0];
                    $type = $voiture[2];
                    $carte_grise = $voiture[3];
                } else {
                    $id_voiture = $type = $carte_grise = '';
                }

            }

            if(isset($_POST['ok'])){

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

<div class="container">
        <h2>Modifier Voiture</h2>
        <form action="voitureUpdate.php" method="post">
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" id="matricule" name="matricule" class="form-control" value="<?= htmlspecialchars($matricule) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="id_voiture">ID Voiture</label>
                <input type="number" id="id_voiture" name="id_voiture" class="form-control" value="<?= htmlspecialchars($id_voiture) ?>">
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" id="type" name="type" class="form-control" value="<?= htmlspecialchars($type) ?>">
            </div>

            <div class="form-group">
                <label for="carte_grise">Carte Grise</label>
                <input type="text" id="carte_grise" name="carte_grise" class="form-control" value="<?= htmlspecialchars($carte_grise) ?>">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-lg" name="ok">Modifier</button>
                <button type="reset" class="btn btn-danger btn-lg">Annuler</button>
            </div>
        </form>
    </div>
    
</body>
</html>