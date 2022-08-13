<?php
if(session_status() == '1'){
session_start();

if(!$_SESSION['mdp']){
    header('location: ../Logout.php');
}}

$bdd = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div class="lien">
        <a href="../Logout.php">Se deconnecter</a>
        <a href="membres.php">Afficher tous les membres</a>
        <a href="articles.php">Voirs les annonces</a>
        <a href="addConsultant.php">Créer une sessions Consultant</a>
    </div>
    <br>
    <div class="container">
        <!---------------------------LES MEMBRES--------------------------------->
        <div class="membres">
            <div style="border:1px solid black;text-align:center;">
                <p style="font-size:3em;">LES MEMBRES :</p>
                <!-- Liste des membres -->
                <?php
                $recupUsers = $bdd->query('SELECT * FROM membres');
                while($user = $recupUsers->fetch()){
                ?>
                <p
                    style="border:1px solid black;font-size:1.5em;padding: 0.5em 0; margin-left: 1.8em; margin-right:1.8em;">
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
        <!---------------------------LES CONSULTANT--------------------------------->
        <div class="addConsultant" style="text-align:center;border:1px solid black;">
            <p style="font-size:3em;">CRÉER CONSULTANTS :</p>
            <span style="font-size:2em;font-weight:bold;">Veuillez inscrire un consultant</span>
            <br><br>
            <form action="enregistrement.php" method="POST">
                <div>
                    <input type="text" name="name" placeholder="Nom" />
                </div>
                <br>
                <div>
                    <input type="text" name="firstname" placeholder="Prénom" />
                </div>
                <br>
                <div>
                    Vous créer :
                    <select type="text" name="role">
                        <option>Consultant</option>
                        <option>Admin</option>
                    </select>
                </div>
                <br>
                <div>
                    <input type="mail" name="email" placeholder="Adresse mail" required />
                </div>
                <br>

                <div>
                    <input type="password" name="pass" placeholder="Mot de passe"
                        title="Au moins 8 caractères, un chiffre, une lettre majuscule et une minuscule"
                        pattern="(?=^.{8,}$)(?=.*[A-Z])(?=.*[a-z]).*" minlength="8" required />
                </div>
                <br>

                <div>
                    <button name="submit">Connexion</button>
                </div>
            </form>
        </div>
        <!---------------------------LES ANNONCES--------------------------------->
        <div class="articles">
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
                        <button style="color:white; background-color:red; margin:0 0 10px 0;">Supprimer
                            l'article</button>
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
    margin: 0px;
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

.container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 20px;
    grid-row-gap: 5px;
}

.membres {
    grid-area: 1 / 1 / 2 / 2;
}

.articles {
    grid-area: 1 / 2 / 2 / 3;
}

.addConsultant {
    grid-area: 1 / 3 / 2 / 4;
}
</style>

</html>