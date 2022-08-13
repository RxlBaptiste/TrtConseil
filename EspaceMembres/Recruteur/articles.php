<?php
session_start();
if(!$_SESSION['pass']){
    header('location: connexion.php');
}
$bdd = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');

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
        <a href="..\Connection\deconnexion.php">Se deconnecter</a>
        <a href="option.php">Profil</a>
        <a id="here">Voir les annonces</a>
        <a href="publierArticle.php">Publier une annonce</a>
    </div>
    <?php
        $recupArticles = $bdd->query('SELECT * FROM articles');
            while($article = $recupArticles->fetch()){
            $etatArticle = $article['etatArticle'];
            if($etatArticle == '1'){
            
            ?>
    <div class="article" style="text-align:center; border: solid 1px black;">
        <h1><?= $article['title']; ?></h1>
        <p>Lieu : <?= $article['lieu']; ?></p>
        <p>Type de contrat : <?= $article['contrat']; ?></p>
        <p>Poste disponible a partir du : <?= $article['date']; ?></p>
        <p>Les horaires : <?= $article['horaires']; ?></p>
        <p>Description du métier : <?= $article['description']; ?></p>
        </a>
    </div>
    <br>
    <?php
    }}

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