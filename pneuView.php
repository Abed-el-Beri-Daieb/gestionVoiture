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

    <div class="container mt-4">
        <h2 class="text-center mb-4" style="color: #005F30;">Les Pneus</h2>
        <table class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Type</th>
                    <th>Date Installation</th>
                    <th>Nb Kilomètres</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "crud_pneu.php";
                $crud = new crud_pneu();
                $lesPneus = $crud->findAllPneu();

                foreach ($lesPneus as $pneu) {
                ?>
                    <tr>
                        <td><?= $pneu[1] ?></td>
                        <td><?= $pneu[2] ?></td>
                        <td><?= $pneu[3] ?></td>
                        <td><?= $pneu[4] ?></td>
                        <td><a href="pneuUpdate.php?matricule=<?= $pneu[1] ?>" class="btn btn-dark btn-sm">Editer</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>