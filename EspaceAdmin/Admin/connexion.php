<?php 
session_start();
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudoParDefaut = "admin";
        $mdpParDefaut = "admin";

        $pseudoSaisi = htmlspecialchars($_POST['pseudo']);
        $mdpSaisi = htmlspecialchars($_POST['mdp']);

        if($pseudoSaisi == $pseudoParDefaut AND $mdpSaisi == $mdpParDefaut){
            $_SESSION['mdp'] = $mdpSaisi;
            header('location:index.php');
        }else{
            echo "Mot de passe ou pseudo incorrect";
        }
    }else{
        echo "veuillez complété tous les champs ";
    }
}
?>



<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>

<body>
    <div class="lien">
        <a href="../Logout.php">Retour a la connection</a>
    </div>
    <p align="center">ADMINISTRATEUR</p>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo" autocomplete="off">
        <br>
        <input type="password" name="mdp">
        <br>
        <input type="submit" name="valider" value="Se connecter">
    </form>
</body>
<style>
body {
    margin: 0;
}

.lien {
    display: flex;
    justify-content: space-around;

    padding-top: 2em;

    height: 4em;
    background-color: black;

}

div a {
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 1.2em;
    color: white;
}
</style>

</html>