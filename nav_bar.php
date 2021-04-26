<?php 
$activePage = basename($_SERVER['PHP_SELF'], ".php");
session_start();
?>

<nav class=" <?= ($activePage == 'index' || $activePage == 'produits') ? 'echo navbar-expand-sm ':'echo navbar-expand '?> navbar navbar-dark bg-dark">
  <div class="container-fluid">

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarText">
    <img src="images/logo_voiture.png" alt="" width="120" height="55" class="mx-4 <?= ($activePage == 'index' || $activePage == 'produits') ? 'echo d-none d-sm-none d-md-block':'echo d-none d-sm-block'?>">
    
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="d-flex nav-item">
          <a class="nav-link navbar-brand navbar-expand <?= ($activePage == 'index') ? 'active':''; ?>" aria-current="page" href="index.php">Accueil</a>
        </li>

        <li class=" d-flex nav-item">
          <a class="nav-link navbar-brand navbar-expand <?= ($activePage == 'inscription') ? 'active':''; ?>" href="inscription.php" aria-current="page"> Connexion</a>
        </li>

        <li class="d-flex nav-item">
          <a class="nav-link navbar-brand navbar-expand <?= ($activePage == 'produits') ? 'active':''; ?>" href="produits.php" aria-current="page"> Produits</a>
        </li>
      </ul>

      </div>
      <?= ($activePage == 'index' || $activePage == 'produits') ? 'echo <form action="#" method="get" class="d-flex mx-2">
      <input class="form-control me-2" name="motRecherche" placeholder="Rechercher un produit">
      <button class="btn btn-outline-success" name="rechercher" type="submit">Go</button>
      </form> ':''; ?>
        <?php 
        if(isset($_GET['rechercher'])){
          if (isset($_GET['motRecherche'])){
            if ($_GET['motRecherche'] == ""){
              echo ' <p class="text-danger text-center"> Champ vide </p>';
            }
            else{
            $_SESSION["motRecherche"] = $_GET["motRecherche"]; 
            header("location: recherche-produit.php");
            exit();
            }
          }
        }
        ?>
  </div>
</nav>
<div class="container"> 