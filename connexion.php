<?php
 $_SESSION["isConnected"] = false;
?> 
<!DOCTYPE html>
<html lang="fr">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<?php require_once 'includes/nav_bar.php'; ?>

<body>
    <main>
    <h1 class="text-center">Connexion</h1>
<form method="post" action="" class="needs-validation" novalidate>
<div class="form-group">
    <label for="txtLogin">Login:</label>
    <input type="text" name="txtLogin" id="txtLogin" class="form-control" required>
    <?php
                if(isset($_POST['formConnexion']) && empty($_POST['txtLogin'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>
<div class="form-group">
    <label for="txtModele">Mot de passe:</label>
    <input type="password" name="txtMotDePasse" id="txtMotDePasse" class="form-control" required/>
    <?php
                if(isset($_POST['formConnexion']) && empty($_POST['txtMotDePasse'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>
<div>
    <button type="submit" name="formConnexion" class="btn btn-dark">Se connecter</button>
</div>
</form>
<?php

require_once 'includes/connexion-bd.php';

include('includes/connexion-bd.php');

    if(isset($_POST["formConnexion"])){
        if (!empty($_POST["txtLogin"]) && !empty($_POST["txtMotDePasse"])){
            $login = $_POST['txtLogin'];
            $motDePasse = $_POST['txtMotDePasse'];

            $req = $conn->prepare('SELECT * FROM clients WHERE login = :login AND motPasse = :motPasse');
    
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->bindValue(':motPasse', $motDePasse, PDO::PARAM_STR);
        
            $req->execute();
        
            $nbComptes = $req->rowCount();
        
            $req->closeCursor();

            if ($nbComptes == 0) {
                $_SESSION["isConnected"] = false;
            }
        
            else{
                $_SESSION["isConnected"] = true;
            }  
            
            if (isset($_POST['formConnexion']) && !$erreur) {
                header('Location:index.php');
                exit;
            }
        }   
    }
        
?> 
<p class="mx-3 text-primary">Vous n'avez pas de compte? <a href="inscription.php" class="btn btn-outline-primary inline-block">S'inscrire</a></p>
</main>

</body>