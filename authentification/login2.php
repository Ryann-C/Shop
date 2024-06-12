<?php
session_start();

include_once "../config/connexion.php"; // Inclure le fichier de connexion à la base de données

if(isset($_POST['envoyer'])){
    if(!empty($_POST['email']) && !empty($_POST['motdepasse'])){
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];

        // Préparer la requête SQL pour récupérer les informations d'identification de l'utilisateur
        $requete = $access->prepare("SELECT * FROM clients WHERE email = ?");
        $requete->execute([$email]);
        $utilisateur = $requete->fetch(); // Récupérer la première ligne du résultat
        var_dump($utilisateur);

        // Vérifier si l'utilisateur existe et si le mot de passe correspond
        if($utilisateur && password_verify($motdepasse, $utilisateur['motdepasse'])){
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            var_dump(password_verify($motdepasse, $utilisateur['motdepasse']));

            echo "E-mail ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
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
            <h3 class="text-center">Connexion</h3>
        <form method ="post">
  <div class="mb-3">
  <div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
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
