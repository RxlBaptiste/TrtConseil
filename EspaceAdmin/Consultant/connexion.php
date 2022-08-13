<?php 
if(session_status() == '1'){
session_start();
}
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
    <div>
        <a href="../Logout.php">Se déconnecter</a>
    </div>
    <p>CONSULTANT</p>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo" autocomplete="off">
        <br>
        <input type="password" name="mdp">
        <br>
        <input type="submit" name="valider">
    </form>
</body>

</html>