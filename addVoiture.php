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
    if (isset($_POST['ok'])) {
        require_once "crud_voiture.php";
        $crud = new crud_voiture();
    
        $id_voiture = htmlspecialchars($_POST['id_v']);
        $matricule = htmlspecialchars($_POST['mat']);
        $type = htmlspecialchars($_POST['type']);
        $carte_grise = htmlspecialchars($_POST['carte']);
    
        $voiture = new voiture($id_voiture, $matricule, $type, $carte_grise);
        $res = $crud->addVoiture($voiture);
    
        if ($res) {
            /*header("location:nosVoiture.php");
            exit;*/
            echo "<script>alert(ajout aves succes)</script>";
        }else{
            echo "echouee";
        }
    }
?>

<form action="addVoiture.php" method="post" class=form-control>
    <label for="">id Voiture</label><input type="text" name="id_v" id="" class=form-control></br> 
    <label for="">Matricule</label><input type="text" name="mat" id="" class=form-control></br>
    <label for="">Type</label><input type="text" name="type" id="" class=form-control></br>
    <label for="">Carte grise</label><input type="text" name="carte" id="" class=form-control></br>

    <input type="submit" value="Ajouter" name="ok" class="btn btn-success btn-lg">
</form>


</body>
</html>