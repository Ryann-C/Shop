<?php

function emailExists($email) {
    require_once("connexion.php");
    global $access;

    $req = $access->prepare("SELECT COUNT(*) FROM clients WHERE email = ?");
    $req->execute([$email]);
    $count = $req->fetchColumn();

    return $count > 0;
}

function inscription($nom, $prenom, $email, $motdepasse) {
    require_once("connexion.php");
    global $access; 

    $motdepassehache = password_hash($motdepasse, PASSWORD_DEFAULT);
    if ($access) {
        $req = $access->prepare("INSERT INTO clients (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");

        if ($req) {
            if ($req->execute([$nom, $prenom, $email, $motdepasse])) {
                $req->closeCursor();
                return true; // Inscription réussie
            } else {
                // Afficher les détails de l'erreur PDO
                $errorInfo = $req->errorInfo();
                echo "Erreur PDO lors de l'exécution de la requête : " . $errorInfo[2];
                return false; // Échec de l'inscription
            }
        } else {
            echo "Erreur lors de la préparation de la requête.";
            return false; // Échec de l'inscription
        }
    } else {
        echo "Erreur de connexion à la base de données.";
        return false; // Échec de l'inscription
    }
}

function modifier($image, $nom, $prix, $desc, $id)
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("UPDATE produits SET `image`=?, nom=?, prix=?, `description`=? WHERE id=?");

        $req->execute(array($image, $nom, $prix, $desc, $id));

        $req->closeCursor();
    }
}

function getProduit($id){

    if(require("connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM produits WHERE id = ?");

        $req->execute(array($id));

        if($req->rowCount() == 1){
            $data = $req->fetchAll(PDO::FETCH_OBJ);

            return $data;
        }

        $req->closeCursor();
    } else {
        return false;
    }
}
function getAdmin($email, $password){

    if(require("connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM admin WHERE email = ? AND motdepasse = ?");

        $req->execute(array($email, $password));

        if($req->rowCount() == 1){
            $data = $req->fetch();

            return $data;
        }

        $req->closeCursor();
    } else {
        return false;
    }
}

function ajouter($image, $nom, $prix, $desc)
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");

        $req->execute(array($image, $nom, $prix, $desc));

        $req->closeCursor();
    }
}

function afficher()
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
    }
}

function supprimer($id)
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("DELETE FROM produits WHERE id=?");

        $req->execute(array($id));
    }
}

?>
