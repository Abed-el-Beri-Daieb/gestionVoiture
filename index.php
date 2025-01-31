<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionVoiture</title>
    <link rel="stylesheet" href="bootstrap6.css">
</head>
<body>
    <?php require_once "nav.php"; ?>

    <div class="container mt-5">

        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Matricule</th>
                    <th>Type</th>
                    <th>Carte Grise</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                        <td><a href="detail.php?matricule=<?= $voiture[1] ?>" class="btn btn-info btn-sm">Voir détail...</a></td>
                        <td><a href="voitureUpdate.php?matricule=<?= $voiture[1] ?>" class="btn btn-dark btn-sm">Editer</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
        <div class="text-center mt-4">
            <a href="addVoiture.php" class="btn btn-success btn-lg">Ajouter une Voiture</a>
        </div>
    </div>
</body>
</html>