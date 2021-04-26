<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>

    <link rel="stylesheet" href="css/bootstrapCSS/bootstrap.min.css">

    <script defer src="js/bootstrapJS/bootstrap.min.js"></script>
</head>
<body>
<?php 
require_once 'includes/nav_bar.php';
require_once 'class/produitsDAO.class.php';
require_once 'includes/connexion-bd.php';

try{
    $db = new ProduitsDAO($conn);
?>
    <h1 class="text-primary text-center pt-3">Tous nos produits disponibles</h1>



    <form class="row row-cols-lg-auto g-3 align-items-center" action="" method="POST">
        <?php
        for ($i = 1 ; $i <= $db->compterProduit($conn); $i++){

        echo '<div class=" inline text-center col-md-6 col-lg-4 col-12 p-3"> <h4>' .  $db->get($i)->getNom() . ' - ' .  $db->get($i)->getPrix() . '$'. '</h4> <button class="btn btn-outline-primary" type="submit"  name="'.$i.'" value="'.$i.'"> <img class="img-fluid imagehover" src= "images/' .$db->get($i)->getImage().'"></button> </div>';
        }
        ?>

    <?php
    
    for ($i = 1; $i<= 6; $i++){
        if (isset($_POST[$i])){
            $_SESSION['imageClique'] = $_POST[$i];
            header("Location: details-produit.php");
            exit();
        }
    }
 

    
    ?>

</form>

</body>
<?php
    }
    catch(Exception $exc){
        exit("Erreur: <br />\n" . $exc->getMessage());
    }
    $conn = null;
?>
</html>