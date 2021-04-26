<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>

    <link rel="stylesheet" href="css/bootstrapCSS/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">

    <script defer src="js/bootstrapJS/bootstrap.min.js"></script>
    <script defer src="js/index.js"></script>

</head>
<body>
<?php 
require_once 'includes/nav_bar.php';
?>

<?php
require_once 'classes/produitsDAO.class.php';
require_once 'includes/connexion-bd.php';

try{
    $db = new ProduitsDAO($conn);
?>



    <h1 class="text-center pt-3">Nos voitures de rêve</h1>

    
    <div class="text-center">
    <h2 id="nomVoiture"><?php echo $db->get(1)->getNom(); ?></h2>
    
    <img class="text-center" id="grandeImage" src="images/<?php echo $db->get(1)->getImage(); ?>" alt="<?php echo $db->get(1)->getNom(); ?>" width="500" height="350">
    
    <h3 id="prixVoiture" class="text-primary pt-2"><?php echo $db->get(1)->getPrix() . '$'; ?></h3>

    <p id="descriptionVoiture"><?php echo $db->get(1)->getDescription(); ?></p>
    
    </div>

    
    <div id="sectionImage" class="row">

    <?php
    for ($i = 1 ; $i <= $db->compterProduit($conn); $i++){
    echo '<img id="image' . $i. '" class="col-sm-4 col-lg-2 col-6 mb-3" src="images/'. $db->get($i)->getImage() .'" alt="'. $db->get($i)->getNom() .'">';
    }
    ?>
    
        
    </div>
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