<?php
session_start();
if(!$_SESSION['pass']){
    header('location: connexion.php');
}
$bdd = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');
/* if(!$_SESSION['mdp']){
    header('location: ../index.php');
} */

if(isset($_POST['envoi'])){

    $email = $_POST['email'];
    $recupRole = $bdd->query("SELECT * FROM membres WHERE email = '$email'");
     while ($ROLE = $recupRole->fetch()){
        $nameSession = $ROLE['name'];
        $firstnameSession = $ROLE['firstname'];
        $mailSession = $ROLE['email'];
    }

    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['lieu']) AND !empty($_POST['date']) AND !empty($_POST['contrat']) AND !empty($_POST['horaire'])){
        $title = htmlspecialchars($_POST['title']);
        $lieu = nl2br(htmlspecialchars($_POST['lieu']));
        $date = htmlspecialchars($_POST['date']);
        $contrat = htmlspecialchars($_POST['contrat']);
        $horaire = nl2br(htmlspecialchars($_POST['horaire']));
        $description = nl2br(htmlspecialchars($_POST['description']));

        $insertionArticle = $bdd->prepare('INSERT INTO articles (title, lieu, date, contrat, horaires, description, par) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $insertionArticle->execute(array($title, $lieu, $date, $contrat, $horaire, $description, $mailSession));

        

        echo "<script>alert(\"Votre annonce a bien été envoyé a un Consultant\")</script>";
    }else{
        echo "<script>alert(\"Veuillez compléter tous les champs\")</script>";
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>publier un article</title>
</head>

<body>

    <div class="lien">
        <a href="..\Connection\deconnexion.php">Se deconnecter</a>
        <a href="option.php">Profil</a>
        <a href="articles.php">Voir les articles</a>
        <a id="here">Publier un article</a>
    </div>
    <form method="POST" action="">
        <input type="text" name="title" placeholder="Intitulé du poste">
        <br>
        <input type="text" name="lieu" placeholder="Lieu de travail">
        <br>
        <label>Quel contrat </label>
        <select name="contrat">
            <option>CDD</option>
            <option>CDI</option>
        </select>
        <br>
        <label>A partir de quand : </label>
        <input type="date" name="date">
        <br>
        <textarea type="text" name="horaire" placeholder="horaires"></textarea>
        <br>
        <textarea name="description" placeholder="Description"></textarea>
        <br>
        <div>
            MERCI de valider votre adresse mail et votre mot de passe :
        </div>
        <div>
            <input type="text" name="email" placeholder="Votre e-mail">
        </div>
        <div>
            <input type="password" name="password" placeholder="Votre mot de passe">
        </div>
        <br>
        <input type="submit" name="envoi">
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