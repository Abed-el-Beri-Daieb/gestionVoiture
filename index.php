<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

<table id="example" class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Matricule</th>
            <th>Type</th>
            <th>Carte_Grise</th>
            <th>Action</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "nav.php";

        require_once "crud_voiture.php";
        $crud = new crud_voiture();
        $lesVoitures = $crud->findAllVoiture();

        foreach ($lesVoitures as $voiture) {
        ?>
            <tr>
                <td><?= $voiture[0] ?></td>
                <td><?= $voiture[1] ?></td>
                <td><?= $voiture[2] ?></td>
                <td><?= $voiture[3] ?></td>
                <td><a href="#" class="btn btn-info btn-sm">Voir détail...</a></td>
                <td><a href="#" class="btn btn-dark btn-sm">Editer</a></td>
                <td><a href="#" class="btn btn-danger btn-sm">Supprimer</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<center><a href="addVoiture.php" class="btn btn-success btn-lg">Ajouter</a></center>
</body>
</html>