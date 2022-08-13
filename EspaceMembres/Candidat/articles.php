<?php
session_start();
if(!$_SESSION['CandidatPass']){
    header('location: connexion.php');
}
$_SESSION['CandidatId'];
$bdd = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les articles</title>
</head>

<body>
    <div class="lien">
        <a href="..\Connection\deconnexion.php">Se deconnecter</a>
        <a href="option.php">Profil</a>
        <a id="here">Voir les annonces</a>
    </div>
    <?php
$bdd = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');

$quete = $bdd->query("SELECT * FROM articles WHERE postulerArticle = '0' OR postulerArticle = '2' ");
while($article = $quete->fetch())
{
    $_SESSION['mailRecruteur'] = $article['par'];
?>
    <br>
    <div style="text-align:center; border: solid 1px black;">
        <?php
echo '<br/>';
echo 'Titre : ';
echo $article['title'];
echo '<br/>';
echo 'Lieu : ';
echo $article['lieu'];
echo '<br/>';
echo 'Type de contrat : ';
echo $article['contrat'];
echo '<br/>';
echo 'Poste disponible a partir du : ';
echo $article['date'];
echo '<br/>';
echo 'Les horaires : ';
echo $article['horaires'];
echo '<br/>';
echo 'Description du métier : ';
echo $article['description'];
echo '<br/><br/>';
echo '<a name="action" href="articles.php?action=accepter&id='.$article['id'].'" style="background-color:#3CA693; color:white; text-decoration:none; padding:0.2em;">Accepter </a>';
echo '<br/> <br/>';
?>
    </div>
    <br>
    <?php
}
 
if(isset($_GET['action']) AND isset($_GET['id']))
{
$action = $_GET['action'];
if($action == "accepter")
{
$id = $_GET['id'];

$SQL = "UPDATE articles SET postulerArticle = '1' WHERE id='$id'";
$sqlUp = $bdd->prepare($SQL);
$sqlUp->execute();

header('Location: articles.php');}}
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