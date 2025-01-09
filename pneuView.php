<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
        require_once "nav.php";
    ?>
    <h2 style="text-align: center; margin-bottom: 3%; color: navy;">Les Pneus :</h2>
    <table class="table" id="example">
        <thead>
        <tr>
            <th>id</th>
            <th>Matricule</th>
            <th>Type</th>
            <th>Date_Installation</th>
            <th>Nb_Kilometres</th>
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
                    <td><?= $pneu[0] ?></td>
                    <td><?= $pneu[1] ?></td>
                    <td><?= $pneu[2] ?></td>
                    <td><?= $pneu[3] ?></td>
                    <td><?= $pneu[4] ?></td>
                    <td><a href="#" class="btn btn-dark btn-sm">Editer</a></td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>
    
</body>
</html>