<?php
if(session_status() == '1'){
session_start();}
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
        <a href="../Logout.php">Se déconnecter</a>
        <a href="option.php">Profil</a>
        <a href="membres.php">Listes membres</a>
        <a href="articles.php">Listes annonces</a>
        <a href="validation.php">Validation membres</a>
        <a href="ValidationArticle.php">Validation annonces</a>
        <a href="ValidationPostuler.php">Annonce postuler </a>
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