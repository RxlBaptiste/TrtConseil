<?php
if(session_status() == '1'){
session_start();}

$bdd = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les membres</title>
</head>

<body>
    <div class="lien">
        <a href="../Logout.php">Se déconnecter</a>
        <a href="option.php">Profil</a>
        <a id="here">Listes membres</a>
        <a href="articles.php">Listes annonces</a>
        <a href="validation.php">Validation membres</a>
        <a href="ValidationArticle.php">Validation annonces</a>
        <a href="ValidationPostuler.php">Annonce postuler </a>
    </div>
    <br>
    <div style="border:1px solid black;text-align:center;">
        <p style="font-size:3em;">LES MEMBRES :</p>
        <!-- Liste des membres -->
        <?php
        $recupUsers = $bdd->query('SELECT * FROM membres');
        while($user = $recupUsers->fetch()){
    ?>
        <p style="border:1px solid black;font-size:1.5em;padding: 0.5em 0; margin-left: 1.8em; margin-right:1.8em;">
            Nom : <?= $user['name'];?><br>
            Prénom : <?= $user['firstname'];?><br>
            Role : <?= $user['role']?><br>
            État : <?= $user['etat']?><br>
            <a href="bannir.php?id=<?= $user['id'];?>" style="
        color:red; 
        text-decoration:none;
        ">Supprimer le membre</a>
        </p>
        <?php
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

</html>