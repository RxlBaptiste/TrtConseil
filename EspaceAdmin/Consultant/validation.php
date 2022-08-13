<?php
if(session_status() == '1'){
session_start();}
$bdd = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation des membres</title>
</head>

<body>
    <div class="lien">
        <a href="../Logout.php">Se déconnecter</a>
        <a href="option.php">Profil</a>
        <a href="membres.php">Listes membres</a>
        <a href="articles.php">Listes annonces</a>
        <a id="here">Validation membres</a>
        <a href="ValidationArticle.php">Validation annonces</a>
        <a href="ValidationPostuler.php">Annonce postuler </a>
    </div>
    <br>
    <div style="border:1px solid black;text-align:center;">
        <p style="font-size:3em;">VALIDATION DES MEMBRES :</p>

        <?php
$quete = $bdd->query("SELECT * FROM membres WHERE etat = '0'");
while($validation = $quete->fetch())
{
echo 'Nom: ';
echo $validation['name'];
echo '<br/>';
echo 'Prenom: ';
echo $validation['firstname'];
echo '<br/>';
echo ' Adresse mail: ';
echo $validation['email'];
echo '<br/>';
echo ' Role: ';
echo $validation['role'];
echo '<br/>';
echo '<a name="action" href="validation.php?action=accepter&id='.$validation['id'].'" style="background-color:red; color:white; text-decoration:none;">Accepter </a>';
echo '<br/>';
echo '<a name="action" href="validation.php?action=refuser&id='.$validation['id'].'" style="background-color:red; color:white; text-decoration:none;"> Refuser</a>';
echo '<br/>';
}
 
if(isset($_GET['action']) AND isset($_GET['id']))
{
$action = $_GET['action'];
if($action == "accepter")
{
$id = $_GET['id'];

$SQL = "UPDATE membres SET etat = '1' WHERE id='$id'";
$sqlUp = $bdd->prepare($SQL);
$sqlUp->execute();

header('Location: validation.php'); 

}
elseif($action == "refuser")
{
$id = $_GET['id'];
$sqlDelete = "DELETE FROM membres WHERE id='$id'";
$reqDelete = $bdd->prepare($sqlDelete);
$reqDelete->execute();

header('Location: validation.php');
}
}
$quete2 = $bdd->query("SELECT * FROM membres WHERE etat = !'0'");{
    ?><p style="font-size:1.5em;">Aucun membre à été créer.</p> <?php
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