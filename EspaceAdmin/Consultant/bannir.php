<?php
if(session_status() == '1'){
session_start();}
$bdd = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $recupUser->execute(array($getId));
    if($recupUser->rowCount() > 0){

        $bannirUser = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $bannirUser->execute(array($getId));

        header('location: membres.php');

    }else{
        echo "Aucun membre n'a été trouvé";
    }
}else{
    echo "L'identifiant n'a pas été récupéré";
}


?>