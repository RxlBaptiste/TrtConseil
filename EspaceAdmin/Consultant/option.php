<?php
if(session_status() == '1'){
session_start();} 
$db = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>

<body>

</body>

</html>

<body>
    <?php
    $mail = $_SESSION['email'];

    $recupRole = $db->query("SELECT * FROM membres");
     while ($ROLE = $recupRole->fetch()){
        $etatSession = $ROLE['etat'];
    }
      ?>

    <div class="lien">
        <a href="../Logout.php">Se déconnecter</a>
        <a id="here">Profil</a>
        <a href="membres.php">Listes membres</a>
        <a href="articles.php">Listes annonces</a>
        <a href="validation.php">Validation membres</a>
        <a href="ValidationArticle.php">Validation annonces</a>
        <a href="ValidationPostuler.php">Annonce postuler </a>
    </div>
    <br>
    <div style="border: solid 1px black;">
        <div style="text-align: center; font-weight: bold; font-size:3em;">
            MON PROFIL :
        </div>
        <div style="border: solid 1px black; text-align: center; margin:2em;">

            <?php 

         $recupUser = $db->query("SELECT * FROM membres WHERE email = '$mail'");
     while ($USER = $recupUser->fetch()){
       
        $nameSession = $USER['name'];
        $firstnameSession = $USER['firstname'];
        $roleSession = $USER['role'];

        $_SESSION['pass'] = $USER['password'];
    }

        echo "<br>";
        echo "NOM : ";
        echo($nameSession);
        echo "<br>";
        echo "<br>";
        echo "PRENOM : ";
        echo($firstnameSession);
        echo "<br>";
        echo "<br>";
        echo "ADRESSE MAIL : ";
        echo($_SESSION['email']);
        echo "<br>";
        echo "<br>";
        echo "STATUT : ";
        echo($roleSession);
        echo "<br><br>";
        ?>
        </div>
    </div>
    <br>
    <div style="border: solid 1px black;">
        <div style="text-align: center; font-weight: bold; font-size:3em;">
            LES MEMBRES :

        </div>
        <br>
        <div style="text-align: center; margin:2em;">

            <!-- Liste des membres -->
            <?php
        $recupUsers = $db->query('SELECT * FROM membres');
        while($user = $recupUsers->fetch()){
    ?>
            <p style="border:1px solid black;text-align:center;font-size:1.2em;padding: 0.5em 0;">
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
    </div>
    <br>
    <div style="border: solid 1px black;">
        <br>
        <div style="text-align: center; font-weight: bold; font-size:3em;">
            LES ANNONCES :
        </div>
        <br>
        <div style=" text-align: center;">

            <?php
        $recupArticles = $db->query('SELECT * FROM articles');
        while($article = $recupArticles->fetch()){
            ?>
            <div class="article" style="border : 1px solid black; margin:2em;">
                <h1><?= $article['title']; ?></h1>
                <p><?= $article['description']; ?></p>
                <a href="supprimerArticle.php?id=<?= $article['id']; ?>">
                    <button style="color:white; background-color:red; margin:0 0 10px 0;">Supprimer l'article</button>
                </a>
            </div>
            <br>
            <?php
    }

    ?>
        </div>
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