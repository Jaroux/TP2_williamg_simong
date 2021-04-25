<?php session_start();?>
<?php
    if($_SESSION["isConnected"] = false) {
        header("Location: connexion.php");
    }
    else {
?>
<!DOCTYPE html>
<html lang="fr">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <main>
    <h1 class="text-center">Modification du profil</h1>
    <form method="post" action="" class="needs-validation" novalidate>

<div class="form-group">
    <label for="txtLogin">Login:</label>
    <input type="text" name="txtLogin" id="txtLogin" class="form-control" required/>
</div>

<div class="form-group">
    <label for="txtMotDePasse">Mot de passe actuel:</label>
    <input type="text" name="txtMotDePasse" id="txtMotDePasse" class="form-control" required/>
</div>

<div class="form-group">
    <label for="txtMotDePasse">Nouveau mot de passe:</label>
    <input type="text" name="txtMotDePasseNouveau" id="txtMotDePasseNouveau" class="form-control" required />
</div>
<div class="form-group">
    <label for="txtEmail">Email:</label>
    <input type="text" name="txtEmail" id="txtEmail" class="form-control" required/>
</div>
<div class="form-group">
    <label for="txtNom">Nom:</label>
    <input type="text" name="txtNom" id="txtNom" class="form-control" required/>
</div>

<div class="form-group">
    <label for="txtPrenom">Prénom:</label>
    <input type="text" name="txtPrenom" id="txtPrenom" class="form-control" required/>
</div>

<div class="form-group">
    <label for="txtAdresse">Adresse:</label>
    <input type="text" name="txtAdresse" id="txtAdresse" class="form-control" required />
</div>

<div class="form-group">
    <label for="txtVille">Ville:</label>
    <input type="text" name="txtVille" id="txtVille" class="form-control"  required/>
</div>

<div class="form-group">
    <label for="txtProvince">Province:</label>
    <input type="text" name="txtProvince" id="txtProvince" class="form-control" required />
</div>

<div class="form-group">
    <label for="txtPostal">Code postal:</label>
    <input type="text" name="txtPostal" id="txtPostal" class="form-control" required />
</div>

<div>
    <button type="submit" name="formInscription" class="btn btn-dark">Appliquer les modifications</button>
</div>

<?php
}
require_once 'includes/connexion-bd.php';

include('includes/connexion-bd.php');

    $login = $_POST['txtLogin'];
    $motDePasse = $_POST['txtMotDePasse'];
    $nom = $_POST['txtNom'];
    $prenom = $_POST['txtPrenom'];
    $adresse = $_POST['txtAdresse'];
    $ville = $_POST['txtVille'];
    $province = $_POST['txtProvince'];
    $codePostal = $_POST['txtPostal'];
    $email = $_POST['txtEmail'];
    $motDePasseNouveau = $_POST['txtMotDePasseNouveau'];
        
        $req = $conn->prepare('SELECT * FROM clients WHERE login = :login AND motPasse = :motPasse');
    
        $req->bindValue(':login', $login, PDO::PARAM_STR);
        $req->bindValue(':motPasse', $password, PDO::PARAM_STR);
    
        $req->execute();
    
        $nbComptes = $req->rowCount();
    
        $req->closeCursor();
    
        if ($nbComptes == 0) {
            $_SESSION["isConnected"] = false;
        }
    
        else{
            $_SESSION["isConnected"] = true;
            $compte = new Compte($nom,$prenom,$adresse,$ville,$province,$codePostal,$login,$motDePasseNouveau,$email);
            $compteBD->update($compte);
        }    

        
?> 

</form>