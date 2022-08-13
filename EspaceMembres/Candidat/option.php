<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');

$test = $_SESSION['email'];

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
    </div>
    <div>
        <?php

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

         $recupUser = $db->query("SELECT * FROM membres WHERE email = '$test'");
     while ($USER = $recupUser->fetch()){
       
        $IdSession = $USER['id'];
        $nameSession = $USER['name'];
        $firstnameSession = $USER['firstname'];
        $roleSession = $USER['role'];
        
        $_SESSION['CandidatPass'] = $USER['password'];
        $_SESSION['CandidatId'] = $USER['id'];
        $_SESSION['CandidatName'] = $USER['name'];
        $_SESSION['CandidatFirstname'] = $USER['firstname'];
        $_SESSION['CandidatCv'] = $USER['cvPdf'];
        $_SESSION['email'] = $USER['email'];

        $cvSession = $USER['cvPdf'];
    }

        echo "<br>";
        echo "ID : ";
        echo($IdSession);
        echo "<br>";
        echo "NOM : ";
        echo($_SESSION['CandidatName']);
        echo "<br>";
        echo "PRENOM : ";
        echo($_SESSION['CandidatFirstname']);
        echo "<br>";
        echo "ADRESSE MAIL : ";
        echo($_SESSION['email']);
        echo "<br>";
        echo "STATUT : ";
        echo($roleSession);
        echo "<br><br>";
        ?>
        </div>
        <br>
        <div style="text-align: center; font-weight: bold; font-size:2em;">
            Votre CV en format .pdf
        </div>
        <div style="border: solid 1px black; text-align: center;">
            <br>
            <form action="addCv.php" method="POST">
                <div>
                    <input type="file" name="cv" placeholder="Cv en format .PDF">
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