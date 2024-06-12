<?php
session_start();
if (isset($_SESSION['Admin'])){
    if(!empty($_SESSION['Admin'])){
        header("Location: admin/");
      }
  }
  
include "config/commandes.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shop</title>
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
            <h3 class="text-center">Administration</h3>
        <form method ="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" autocomplete="email" style="width: 80%">
  </div>
  <div class="-mb-3">
    <label for="motdepasse" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="motdepasse" name="motdepasse" autocomplete="current-password" style="width: 80%">
  </div>
  <input type="submit" class="btn btn-danger" name="envoyer" value ="Se connecter">
</form>
    </div>
</div>
</body>
</html>

<?php

if(isset($_POST['envoyer'])){
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse'])){
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars ($_POST['motdepasse']);
        $admin = getAdmin($email, $motdepasse);

        if($admin){
            $_SESSION['Admin'] = $admin;

            header("Location: admin/");
        } else{
            echo "Les informations sont fausses !";
        }
    }
}

?>