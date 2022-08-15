<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');

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
        <a id="here">Profil</a>
        <a href="articles.php">Voir les annonces</a>
        <a href="publierArticle.php">Publier une annonce</a>
    </div>
    <?php
    $db = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');

    $recupRole = $db->query("SELECT * FROM membres");
     while ($ROLE = $recupRole->fetch()){
        $etatSession = $ROLE['etat'];
    }
      ?>
    <br>
    <div style="text-align: center; font-weight: bold; font-size:2em;">
        MON PROFIL :
    </div>
    <div style="border: solid 1px black; text-align: center;">

        <?php 

         $recupUser = $db->query("SELECT * FROM membres WHERE email = '$mail'");
     while ($USER = $recupUser->fetch()){
       
        $nameSession = $USER['name'];
        $firstnameSession = $USER['firstname'];
        $roleSession = $USER['role'];

        $_SESSION['pass'] = $USER['password'];

        $EntNameSession = $USER['EntrepriseName'];
        $EntAdresseSession = $USER['EntrepriseAdresse'];
    }

        echo "<br>";
        echo "NOM : ";
        echo($nameSession);
        echo "<br>";
        echo "PRENOM : ";
        echo($firstnameSession);
        echo "<br>";
        echo "ADRESSE MAIL : ";
        echo($_SESSION['email']);
        echo "<br>";
        echo "STATUT : ";
        echo($roleSession);
        echo "<br><br>";
        echo "VOTRE ENTREPRISE : ";
        echo "<br><br>";
        echo "NOM DE L'ENTREPRISE : ";
        echo($EntNameSession);
        echo "<br>";
        echo "ADRESSE DE L'ENTREPRISE : ";
        echo($EntAdresseSession);
        echo "<br><br>";
        ?>
    </div>
    <br>
    <div style="text-align: center; font-weight: bold; font-size:2em;">
        MES ANNONCES :

    </div>
    <br>
    <div style="text-align: center;">
        <?php 
        $recupArticles = $bdd->query("SELECT * FROM articles WHERE par='$mail'");
            while($article = $recupArticles->fetch()){
            $etatArticle = $article['etatArticle'];
            if($etatArticle == '1'){
            
            ?>
        <div class="article" style="border : 1px solid black;">
            <h1><?= $article['title']; ?></h1>
            <p>ID : <?= $article['id']; ?></p>
            <p>Lieu : <?= $article['lieu']; ?></p>
            <p>Type de contrat : <?= $article['contrat']; ?></p>
            <p>A partir du : <?= $article['date']; ?></p>
            <p>Horaires : <?= $article['horaires']; ?></p>
            <p>Description : <?= $article['description']; ?></p>
            <br>
            <p>
                <?='<a name="action" href="listeCandidats.php?action=VOIR&id='.$article['id'].'"
                    style="background-color:#3CA693; color:white; text-decoration:none; padding:0.2em;">Voir la
                    liste</a>'?>
            </p>
        </div>
        <br>
        <?php 
            }}
        ?>
    </div>
    <br>
    <div style="text-align: center; font-weight: bold; font-size:2em;">
        AJOUTER VOS COORDONNÉES D'ENTREPRISE :
    </div>
    <br>
    <div style="border: solid 1px black; text-align: center;">
        <form action="addProfil.php" method="POST">
            <br>
            <div>
                <input type="text" name="nameEnt" placeholder="Nom de l'entreprise">
            </div>
            <div>
                <input type="text" name="adresseEnt" placeholder="Adresse de l'entreprise">
            </div>
            <br>
            <div>
                MERCI de valider votre adresse mail et votre mot de passe :
            </div>
            <br>
            <div>
                <input type="text" name="email" placeholder="Votre e-mail">
            </div>
            <div>
                <input type="password" name="password" placeholder="Votre mot de passe">
            </div>
            <br>
            <div>
                <button name="submit">Envoyer</button>
            </div>
        </form>
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