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
    <title>Les articles</title>
</head>

<body>
    <div class="lien">
        <a href="../Logout.php">Se déconnecter</a>
        <a href="option.php">Profil</a>
        <a href="membres.php">Listes membres</a>
        <a id="here">Listes annonces</a>
        <a href="validation.php">Validation membres</a>
        <a href="ValidationArticle.php">Validation annonces</a>
        <a href="ValidationPostuler.php">Annonce postuler </a>
    </div>
    <br>
    <div style="border:1px solid black;text-align:center;">
        <p style="font-size:3em;">LES ANNONCES :</p>
        <?php
        $recupArticles = $bdd->query('SELECT * FROM articles');
        while($article = $recupArticles->fetch()){
            ?>
        <div class="article" style="border : 1px solid black;">
            <h1><?= $article['title']; ?></h1>
            <p><?= $article['description']; ?></p>
            <a href="supprimerArticle.php?id=<?= $article['id']; ?>">
                <button style="color:white; background-color:red; margin:0 0 10px 0;">Supprimer l'annonce</button>
            </a>
        </div>
        <br>
        <?php
    }

    ?>
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