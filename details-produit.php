
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>

    <link rel="stylesheet" href="css/bootstrapCSS/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">

    <script defer src="js/bootstrapJS/bootstrap.min.js"></script>
</head>
<body>
<?php 
require_once 'includes/nav_bar.php';
require_once 'classes/produitsDAO.class.php';
require_once 'includes/connexion-bd.php';

try{
    $db = new ProduitsDAO($conn);

?>
        
    <button class="btn btn-danger mt-2"> <a class="text-decoration-none text-light" href="produits.php">Revenir à la page des produits</a> </button>
    <div class="container-fluid text-center">
    <h1 class="text-primary text-center mb-3"> <?php echo $db->get($_SESSION['imageClique'])->getNom();?></h1>
    
    <img class="img-fluid" src="images/<?php echo $db->get($_SESSION['imageClique'])->getImage();?>" alt="<?php echo $db->get($_SESSION['imageClique'])->getNom();?>">

    <h2 class="text-primary m-4 display-2"><?php echo $db->get($_SESSION['imageClique'])->getPrix();?>$</h2>

    <p class="lead"><?php echo $db->get($_SESSION['imageClique'])->getDescription();?></p>

    <p>Quantité disponible: <?php echo $db->get($_SESSION['imageClique'])->getQte();?></p>

    <p>Date de parution de la voiture: <?php echo $db->get($_SESSION['imageClique'])->getDate();?></p>

    <button class="btn btn-primary mb-5">Ajouter au panier</button>

    
    </div>
    




</body>
<?php
    }
    catch(Exception $exc){
        exit("Erreur: <br />\n" . $exc->getMessage());
    }
    $conn = null;
?>
</html>