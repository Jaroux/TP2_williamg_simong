
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
    <h1 class="text-primary text-center pt-3">Recherche de produit</h1>

<div class="row row-cols-lg-auto g-3 text-center">

            <?php 
            $db->chercherProduit($_SESSION["motRecherche"]);
            ?>

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