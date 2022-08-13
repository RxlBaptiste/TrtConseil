<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');

$mail = $_SESSION['email'];

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="lien">
        <a href="..\Connection\deconnexion.php">Se deconnecter</a>
        <a href="option.php">Retour a la page profil</a>
    </div>
    <br>
    <div style="text-align: center; font-weight: bold; font-size:2em;">
        MON ANNONCE :

    </div>
    <br>
    <div style="text-align: center;">
        <?php 
if(isset($_GET['action']) AND isset($_GET['id']))
{
$action = $_GET['action'];
if($action == "VOIR"){
    $id = $_GET['id'];

$SQL = $bdd->query("SELECT * FROM postulerpar WHERE idRef=$id");
while($candidat = $SQL->fetch()){
    ?><div style="border:solid 1px black;">
            <p>Nom du candidat : <?= $candidat['nom']; ?></p>
            <p>Prenom du candidat : <?= $candidat['prenom']; ?></p>
            <p>Adresse mail du candidat : <?= $candidat['mail']; ?></p>
            <br>
        </div>
        <br>
        <?php 
        } 
    }
}
        ?>
    </div>
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

#here {
    text-decoration: underline;
}

div a {
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 1.2em;
    color: white;
}
</style>