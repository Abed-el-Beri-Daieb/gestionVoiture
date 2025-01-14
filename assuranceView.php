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
    <h2 style="text-align: center; margin-bottom: 3%; color: navy;">Les Assurances :</h2>
    <table class="table" id="example">
        <thead>
        <tr>
            <th>id</th>
            <th>Matricule</th>
            <th>Date_Debut</th>
            <th>Date_Fin</th>
            <th>Validité</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            require_once "crud_assurance.php";

            $crud = new crud_assurance();
            $lesAssurances = $crud->findAllAssurance();

            foreach ($lesAssurances as $assurance) {
                $today = new DateTime();
                $date_fin_assurance = new DateTime($assurance[3]);

                $interval = $today->diff($date_fin_assurance); 
                $total_days = $interval->invert ? 0 : $interval->days;

                if ($total_days > 0) {
                    $months = $interval->m + ($interval->y * 12);
                    $days = $interval->d;
                    $validite = "$months mois et $days jours";
                } else {
                    $validite = "Expirée";
                }

                $validite_style = ($total_days < 60 && $total_days >= 0) ? "color: red;" : "color: green;";
            ?>
                <tr>
                    <td><?= $assurance[0] ?></td>
                    <td><?= $assurance[1] ?></td>
                    <td><?= $assurance[2] ?></td>
                    <td><?= $assurance[3] ?></td>
                    <td style="<?= $validite_style ?>"><?= $validite ?></td>
                    <td><a href="assuranceUpdate.php?matricule=<?= $assurance[1] ?>" class="btn btn-dark btn-sm">Editer</a></td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>
    
</body>
</html>