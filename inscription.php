<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php 
    $erreur = false;
?>
    <main>
    <h1 class="text-center">Inscription</h1>
    <form method="post" action="" class="needs-validation" novalidate >

<div class="form-group">
    <label for="txtLogin">Login:</label>
    <input type="text" name="txtLogin" id="txtLogin" class="form-control" required/>
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtLogin'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>
<div class="form-group">
    <label for="txtModele">Mot de passe:</label>
    <input type="text" name="txtMotDePasse" id="txtMotDePasse" class="form-control" required />
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtMotDePasse'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>
<div class="form-group">
    <label for="txtCouleur">Email:</label>
    <input type="text" name="txtEmail" id="txtEmail" class="form-control" required />
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtEmail'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>
<div class="form-group">
    <label for="txtPrix">Nom:</label>
    <input type="text" name="txtNom" id="txtNom" class="form-control"  required/>
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtNom'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>

<div class="form-group">
    <label for="txtPrix">Prénom:</label>
    <input type="text" name="txtPrenom" id="txtPrenom" class="form-control" required />
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtPrenom'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>

<div class="form-group">
    <label for="txtPrix">Adresse:</label>
    <input type="text" name="txtAdresse" id="txtAdresse" class="form-control" required />
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtAdresse'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>

<div class="form-group">
    <label for="txtPrix">Ville:</label> 
    <input type="text" name="txtVille" id="txtVille" class="form-control" required />
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtVille'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>

<div class="form-group">
    <label for="txtPrix">Province:</label>
    <input type="text" name="txtProvince" id="txtProvince" class="form-control" required />
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtProvince'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>

<div class="form-group">
    <label for="txtPrix">Code postal:</label>
    <input type="text" name="txtPostal" id="txtPostal" class="form-control" required />
    <?php
                if(isset($_POST['formInscription']) && empty($_POST['txtPostal'])) {
                  echo '<span class="invalid-feedback">Ce champ est obligatoire</span>';
                  $erreur = true;
                }
    ?>
</div>

<div>
    <button type="submit" name="formInscription" class="btn btn-dark" />S'inscrire</button>
</div>

</form>

<?php

        require_once 'includes/connexion-bd.php';

        if(isset($_POST['formInscription'])) {

            $nom = $_POST['txtNom'];
            $prenom = $_POST['txtPrenom'];
            $adresse = $_POST['txtAdresse'];
            $ville = $_POST['txtVille'];
            $province = $_POST['txtProvince'];
            $codePostal = $_POST['txtPostal'];
            $login = $_POST['txtLogin'];
            $motDePasse = $_POST['txtMotDePasse'];
            $email = $_POST['txtEmail'];

            try {
                $compteBD = new CompteDao($conn);

                $unePersonne = new Compte($nom,$prenom,$adresse,$ville,$province,$codePostal,$login,$motDePasse,$email);
                $compteBD->add($unePersonne);

                echo '<p>'.$unePersonne.'</p>';
            } 
            catch (Exception $exc) {
                exit( "Erreur :<br />\n" .  $exc->getMessage() );
            }           
       
		    $conn = null;
        }

        if (isset($_POST['formInscription']) && !$erreur) {
            header('Location:index.php');
            exit;
          }
    ?>
    </main>
</body>
</html>
