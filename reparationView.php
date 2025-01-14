<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Matricule</th>
            <th>Prix(dt)</th>
            <th>Date</th>
            <th>Designation</th>
            <th>Fournisseur</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "nav.php";

        require_once "crud_reparation.php";
        $crud = new crud_reparation();
        $lesReparation = $crud->findAllReparation();

        foreach ($lesReparation as $reparation) {
        ?>
            <tr>
                <td><?= $reparation[0] ?></td>
                <td><?= $reparation[1] ?></td>
                <td><?= $reparation[2] ?></td>
                <td><?= $reparation[3] ?></td>
                <td><?= $reparation[4] ?></td>
                <td><?= $reparation[5] ?></td>
                <td><a href="reparationUpdate.php?matricule=<?= $reparation[1] ?>" class="btn btn-dark btn-sm">Editer</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<center><a href="addReparation.php" class="btn btn-success btn-lg">Ajouter</a></center>
</body>
</html>