<?php
if(session_status() == '1'){
session_start();
}

$bdd = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation des annonces postuler</title>
</head>

<body>
    <div class="lien">
        <a href="../Logout.php">Se déconnecter</a>
        <a href="option.php">Profil</a>
        <a href="membres.php">Listes membres</a>
        <a href="articles.php">Listes annonces</a>
        <a href="Validation.php">Validation membres</a>
        <a href="ValidationArticle.php">Validation annonces</a>
        <a id="here">Annonce postuler </a>
    </div>
    <br>
    <div style="border:1px solid black;text-align:center;">
        <p style="font-size:3em;">VALIDATION DES ANNONCER POSTULER :</p>

        <?php
        
$quete = $bdd->query("SELECT * FROM articles WHERE postulerArticle = '1'");
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
echo '<br/>';
echo '<br/>';
echo 'POSTULER PAR : ';
echo '<br/>';
echo 'Adresse mail : ';
echo $_SESSION['email'];
echo '<br/>';
echo 'Nom, Prénom : ';
echo $_SESSION['CandidatName'];
echo '&nbsp';
echo $_SESSION['CandidatFirstname'];
echo '<br/>';
echo '<br/><br/>';
echo '<a name="action" href="ValidationPostuler.php?action=accepter&id='.$validation['id'].'" style="background-color:red; color:white; text-decoration:none; padding:0.2em;">Accepter </a>';
echo '&nbsp&nbsp&nbsp';
echo '<a name="action" href="ValidationPostuler.php?action=refuser&id='.$validation['id'].'" style="background-color:red; color:white; text-decoration:none; padding:0.2em;"> Refuser</a>';
echo '<br/>';
echo '<br/>';

$sessionMail = $_SESSION['email'];
$sessionName = $_SESSION['CandidatName'];
$sessionFirstname = $_SESSION['CandidatFirstname'];

}

if(isset($_GET['action']) AND isset($_GET['id']))
{
$action = $_GET['action'];
if($action == "accepter")
{
$id = $_GET['id'];

$SQL = "UPDATE articles SET postulerArticle = '2' WHERE id='$id'";
$sqlUp = $bdd->prepare($SQL);
$sqlUp->execute();

$ReqSql = "INSERT INTO postulerpar (nom, prenom, mail, idRef) VALUES ('$sessionName', '$sessionFirstname', '$sessionMail', '$id')";
$sqlEnv = $bdd->prepare($ReqSql);
$sqlEnv->execute();


$destinataire = $_SESSION['mailRecruteur'];
$sujet = "TRT Conseil";

$entete = "From: trtconseil@gmail.com \n";
$entete .= "Reply-to: trtconseil@gmail.com \n";

$delim = md5(uniqid(rand()));

$entete .= "MIME-Version: 1.0 \n";
$entete .= "Content-Type: multipart/mixed;boundary=\"$delim\" \n";
$entete .= "\n";

$msg = "--$delim \n";
$msg .= "Content-Type: text/plain; charset=\"utf-8\" \n";
$msg .= "Content-Transfer-Encoding: 8bit \n";
$msg .= "\n";

$msg .= "
Un candidat a postulé a votre annonce et un consultant l'a approuvé voici c'est coordonnées ci-dessous avec son nom, son prénom et son adresse mail :  
Nom : ".$_SESSION['CandidatName']."
Prenom : ".$_SESSION['CandidatFirstname']."
Adresse mail ".$_SESSION['email']."";
$msg .= "\n";

$fichier = 'image.png';
$jointe = file_get_contents($fichier);
$jointe = chunk_split(base64_encode($jointe));

$msg .= "--$delim \n";
$msg .= "Content-Type: image/png;name\"image\" \n";
$msg .= "Content-Transfer-Encoding:base64 \n";
$msg .= "Content-Disposition: inline; filename=\"image\" \n";
$msg .= "\n";
$msg .= $jointe."\n";
$msg .= "\n";

$msg .="--$delim--";

if (mail($destinataire, $sujet, $msg, $entete)) {
header('Location: ValidationPostuler.php');
echo "Un Email a été envoyé au recruteur";
} else {
header('Location: ValidationPostuler.php');
} 
echo "<script>alert(\"Aucun Email a été envoyé au recruteur\")</script>";
}
elseif($action == "refuser")
{
$id = $_GET['id'];
$sqlDelete = "UPDATE articles SET postulerArticle = '0' WHERE id='$id'";
$reqDelete = $bdd->prepare($sqlDelete);
$reqDelete->execute();

header('Location: ValidationPostuler.php');
}
}
$quete2 = $bdd->query("SELECT * FROM articles WHERE postulerArticle = '0'");{
   ?><p style="font-size:1.5em;">Aucun candidat n'a postuler pour un poste.</p><?php
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