<?php
if(session_status() == '1'){
session_start();
}
if(!$_SESSION['mdp']){
    header('location: ../Logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V15</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body style="text-align:center;">
    <div class="lien">
        <a href="../Logout.php">Se deconnecter</a>
        <a href="membres.php">Afficher tous les membres</a>
        <a href="articles.php">Voirs les annonces</a>
        <a href="addConsultant.php">Créer une sessions Consultant</a>
    </div>
    <br>
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