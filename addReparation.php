<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Réparation</title>
    <link rel="stylesheet" href="bootstrap.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
            color: #495057; /* Dark text for good contrast */
        }

        .container {
            margin-top: 30px;
            background-color: #ffffff; /* White form background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff; /* Blue title */
        }

        label {
            font-weight: bold;
            color: #333333; /* Darker labels */
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .btn {
            margin-top: 10px;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #28a745; /* Success green */
        }

        .btn-danger {
            background-color: #dc3545; /* Danger red */
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php
    require_once "nav.php";
    if (isset($_POST['ok'])) {
        require_once "crud_reparation.php";

        $crud = new crud_reparation();

        $matricule = htmlspecialchars($_POST['matricule']);
        $prix = htmlspecialchars($_POST['prix']);
        $date = htmlspecialchars($_POST['date']);
        $designation = htmlspecialchars($_POST['designation']);
        $fournisseur = htmlspecialchars($_POST['fournisseur']);
    
        $reparation = new reparation($matricule, $prix, $date, $designation, $fournisseur);
        $res = $crud->addReparation($reparation);

        if ($res) {
            header("location:reparationView.php");
            exit;
        }
    }
?>

<div class="container">
    <h2 class="text-center">Ajouter Réparation</h2>
    <form action="addReparation.php" method="post">

        <div class="form-group">
            <label for="matricule">Matricule</label>
            <input type="text" name="matricule" id="matricule" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" class="form-control" step="any" required>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="designation">Désignation</label>
            <input type="text" name="designation" id="designation" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fournisseur">Fournisseur</label>
            <input type="text" name="fournisseur" id="fournisseur" class="form-control" required>
        </div>

        <div class="form-group text-center">
            <input type="submit" value="Ajouter" name="ok" class="btn btn-success btn-lg">
            <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
        </div>
    </form>
</div>

</body>
</html>
