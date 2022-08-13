<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Connection</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <?php
    $db = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');

    $recupRole = $db->query("SELECT * FROM membres");
     while ($ROLE = $recupRole->fetch()){
        $etatSession = $ROLE['etat'];
    }  
    /* if (isset($_SESSION['email']) AND $etatSession == '1'){
      echo "<center><h3>Vous êtes connecté en tant que " . $_SESSION['email']. "</h3></center>";
      ?>
    <a href="EspaceMembres/Connection/deconnexion.php">Se Déconnecter</a>
    <a href="EspaceMembres/Articles/publierArticle.php">Publier un article</a>
    <a href="EspaceMembres/Articles/articles.php">Afficher tous les articles</a>
    <?php
    }else{ */
      ?>
    <div class="formulaire">
        <div>
            <a href="EspaceAdmin/Admin/connexion.php">Vous êtes un administrateur ?</a>
        </div>
        <form action="EspaceMembres/Connection/connexion.php" method="POST">
            <div>
                <input type="mail" name="email" placeholder="Adresse mail" required />
            </div>

            <div>
                <input type="password" name="pass" placeholder="Mot de passe"
                    title="Au moins 8 caractères, un chiffre, une lettre majuscule et une minuscule"
                    pattern="(?=^.{8,}$)(?=.*[A-Z])(?=.*[a-z]).*" minlength="8" required />
            </div>
            <div>
                <button name="submit">Connexion</button>
            </div>
        </form>
        <div id="BtnInscrire">
            <button name="S'inscrire"><a href="EspaceMembres/Connection/inscription.php">S'inscrire</a></button>
        </div>
    </div>
</body>
<style>
.formulaire {
    display: flex;
    flex-direction: column;
    align-items: center;

    font-size: 2em;
}
</style>

</html>