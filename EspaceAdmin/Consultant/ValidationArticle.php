<?php
if(session_status() == '1'){
session_start();
}
$bdd = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation des annonces</title>
</head>

<body>
    <div class="lien">
        <a href="../Logout.php">Se déconnecter</a>
        <a href="option.php">Profil</a>
        <a href="membres.php">Listes membres</a>
        <a href="articles.php">Listes annonces</a>
        <a href="Validation.php">Validation membres</a>
        <a id="here">Validation annonces</a>
        <a href="ValidationPostuler.php">Annonce postuler </a>
    </div>
    <br>
    <div style="border:1px solid black;text-align:center;padding-bottom:2em;">
        <p style="font-size:3em;">VALIDATION DES ANNONCES :</p>

        <div style="border:1px solid black;font-size:1.5em;padding: 0.5em 0; margin-left: 1.8em; margin-right:1.8em;">
            <?php
$quete = $bdd->query("SELECT * FROM articles WHERE etatArticle = '0'");
while($validation = $quete->fetch())
{
echo 'Titre: ';
echo $validation['title'];
echo '<br/>';
echo 'Lieu: ';
echo $validation['lieu'];
echo '<br/>';
echo ' contrat: ';
echo $validation['contrat'];
echo '<br/>';
echo ' date: ';
echo $validation['date'];
echo '<br/>';
echo ' Horaires : ';
echo $validation['horaires'];
echo '<br/>';
echo ' Description: ';
echo $validation['description'];
echo '<br/><br/>';
echo '<a name="action" href="Validationarticle.php?action=accepter&id='.$validation['id'].'" style="background-color:red; color:white; text-decoration:none;">Accepter </a>';
echo '<br/><br/>';
echo '<a name="action" href="Validationarticle.php?action=refuser&id='.$validation['id'].'" style="background-color:red; color:white; text-decoration:none;"> Refuser</a>';
echo '<br/>';
}
 
if(isset($_GET['action']) AND isset($_GET['id']))
{
$action = $_GET['action'];
if($action == "accepter")
{
$id = $_GET['id'];

$SQL = "UPDATE articles SET etatArticle = '1' WHERE id='$id'";
$sqlUp = $bdd->prepare($SQL);
$sqlUp->execute();

header('Location: ValidationArticle.php'); 

}
elseif($action == "refuser")
{
$id = $_GET['id'];
$sqlDelete = "DELETE FROM articles WHERE id='$id'";
$reqDelete = $bdd->prepare($sqlDelete);
$reqDelete->execute();
 
header('Location: ValidationArticle.php');
}
}
$quete2 = $bdd->query("SELECT * FROM articles WHERE etatArticle = !'0'");{
    ?><p style="font-size:1.5em;">Aucune annonce à été créée.</p><?php
}
?>
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