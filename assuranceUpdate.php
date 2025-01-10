<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionVoiture</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
        require_once "nav.php";

            $matricule = htmlspecialchars($_GET['matricule']);
            echo $matricule; // il y'a un probleme ici $matricule undefined after $_POST
            
            if(isset($_POST['ok2'])){
                require_once "crud_assurance.php";
                $crudAs = new crud_assurance();
    
                $date_deb_assurance = htmlspecialchars($_POST['date_deb_assurance']);
                $date_fin_assurance = htmlspecialchars($_POST['date_fin_assurance']);
    
                $res = $crudAs->updateAssurance($matricule,$date_deb_assurance,$date_fin_assurance);
                
                if($res){
                    header("location:assuranceView.php");
                    exit;
                }else{
                    echo "erreur lors du modification";
                    echo $matricule . $date_deb_assurance . $date_fin_assurance ;
                }
            }   
    ?>

    <form action="assuranceUpdate.php"  method="post" class="form-control">
        <label>Date Debut <input type="date" class="form-control" name="date_deb_assurance"></label><br>
        <label>Date fin <input type="date" class="form-control" name="date_fin_assurance"></label><br>
        <br>
        <input type="submit" value="Modifier" class="btn btn-success btn-lg" name="ok2">
        <input type="reset" value="Annuler" class="btn btn-danger btn-lg">
    </form>
    
</body>
</html>