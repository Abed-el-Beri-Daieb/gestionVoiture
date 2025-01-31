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
        <h3 class="text-center mb-4" style="color: #005F30;">Voiture </h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Matricule</th>
                    <th>Type</th>
                    <th>Carte Grise</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['matricule'])) {
                    $matricule = htmlspecialchars($_GET['matricule']);
                }

                require_once "crud_voiture.php";
                $crud = new crud_voiture();
                $voiture = $crud->find($matricule);
                ?>
                <tr>
                    <td><?= $voiture[0] ?></td>
                    <td><?= $voiture[1] ?></td>
                    <td><?= $voiture[2] ?></td>
                    <td><?= $voiture[3] ?></td>
                </tr>
            </tbody>
        </table>

        <h3 class="text-center mb-4" style="color: #005F30;">Assurance </h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Validité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "crud_assurance.php";
                $crud = new crud_assurance();
                $assurance = $crud->find($matricule);
                ?>
                <tr>
                    <td><?= $assurance[2] ?></td>
                    <td><?= $assurance[3] ?></td>
                    <?php
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
                    <td style="<?= $validite_style ?>"><?= $validite ?></td>
                </tr>
            </tbody>
        </table>

        <h3 class="text-center mb-4" style="color: #005F30;">Vignette </h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Validité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "crud_vignette.php";
                $crud = new crud_vignette();
                $vignette = $crud->find($matricule);
                ?>
                <tr>
                    <td><?= $vignette[2] ?></td>
                    <td><?= $vignette[3] ?></td>
                    <?php
                    $date_fin_vignette = new DateTime($vignette[3]);

                    $interval = $today->diff($date_fin_vignette);
                    $total_days = $interval->invert ? 0 : $interval->days;

                    if ($total_days > 0) {
                        $months = $interval->m + ($interval->y * 12);
                        $days = $interval->d;
                        $validite = "$months mois et $days jours";
                    } else {
                        $validite="Expirée";
                    }

                    $validite_style = ($total_days < 60 && $total_days >= 0) ? "color: red;" : "color: green;";
                    ?>
                    <td style="<?= $validite_style ?>"><?= $validite ?></td>
                </tr>
            </tbody>
        </table>

    </div>
</body>
</html>