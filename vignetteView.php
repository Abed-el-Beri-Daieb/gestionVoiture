<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php require_once "nav.php"; ?>

    <div class="container mt-4">
        <h2 class="text-center mb-4" style="color: #007bff;">Les Vignettes</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Validité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "crud_vignette.php";
                $crud = new crud_vignette();
                $lesVignettes = $crud->findAllVignette();

                foreach ($lesVignettes as $vignette) {
                    $today = new DateTime();
                    $date_fin_vignette = new DateTime($vignette[3]);

                    $interval = $today->diff($date_fin_vignette);
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
                        <td><?= $vignette[1] ?></td>
                        <td><?= $vignette[2] ?></td>
                        <td><?= $vignette[3] ?></td>
                        <td style="<?= $validite_style ?>"><?= $validite ?></td>
                        <td><a href="vignetteUpdate.php?matricule=<?= $vignette[1] ?>" class="btn btn-dark btn-sm">Editer</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>