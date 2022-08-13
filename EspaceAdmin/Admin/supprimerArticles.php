<?php

if(session_status() == '1'){
session_start();}

$bdd = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ? ');
    $recupArticle->execute(array($getid));
    if($recupArticle-> rowCount() > 0){
        $deleteArticle = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $deleteArticle->execute(array($getid));
        header('location: articles.php');
    }else{
        echo"Aucune annonce trouvé";
    }
}else{
    echo "Aucun d'identifiant trouvé";
}
?>