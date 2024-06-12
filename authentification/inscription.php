<?php
session_start();
include "../config/commandes.php";
include "../config/connexion.php";

if(isset($_POST['envoyer'])){
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['motdepasse'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);

        $inscription = inscription($nom, $prenom, $email, $motdepasse);

        if ($inscription) {
            header("Location: login2.php");
            exit(); 
        } else {
            echo "Une erreur s'est produite lors de l'inscription.";
        }
    } else {
        echo "Des informations sont manquantes !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3 class="text-center">Inscription</h3>
        <form method ="post">
  <div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" autocomplete="nom" style="width: 80%">
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" autocomplete="prenom" style="width: 80%">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" autocomplete="email" style="width: 80%">
  </div>
  <div class="-mb-3">
    <label for="motdepasse" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="motdepasse" name="motdepasse" autocomplete="current-password" style="width: 80%">
  </div>
  <input type="submit" class="btn btn-danger" name="envoyer" value ="S'inscrire">
</form>
    </div>
</div>
</body>
</html>
