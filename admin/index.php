<?php
session_start();
if (!isset($_SESSION['Admin'])){
  header("Location:../login.php");
}
if (empty($_SESSION['Admin'])){
  header("Location:../login.php");
}
require("../config/commandes.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../admin/"  style="font-weight: bold">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Suppression</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="afficher.php">Produits</a>
        </li>
      </ul> 
      <div style="display: flex; justify-content: flex-end;">
        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
    </div>
    </div>
  </div>
</nav>
        <div class="container-fluid">
          <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <h3 class="text-center">Ajout d'un produit</h3>
        <form method="post">
    
  <div class="mb-3">
    <label for="image" class="form-label">Titre de l'image</label>
    <input type="text" class="form-control" id="image" name="image" required>
  </div>
  <div class="mb-3">
    <label for="nom" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" id="nom" name="nom" required>
  </div>
  <div class="mb-3">
    <label for="prix" class="form-label">Prix</label>
    <input type="number" class="form-control" id="prix" name="prix" required>
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Description</label>
    <textarea class="form-control" name="desc" id="desc" required></textarea>
  </div>
  <button type="submit" name="valider" class="btn btn-success" id="" onclick ="popup()">Ajouter le nouveau produit</button>


  </form>
</div>
</body>
</html>

<?php

if(isset($_POST['valider']))
{
    if(isset($_POST['image'])AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
    {
        if(!empty($_POST['image'])AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
        {
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));
            try {
                ajouter($image, $nom, $prix, $desc);
            } 
            catch (Exception $e) 
            {
                $e->getMessage();
            }
            
            
        }
    }
}

?>