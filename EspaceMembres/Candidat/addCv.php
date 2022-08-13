<?php
session_start();

if(isset($_POST['submit'])){
    $Cv = $_POST['cv'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $bdd = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');
    
    $recupRole = $bdd->query("SELECT * FROM membres WHERE email = '$email'");
     while ($ROLE = $recupRole->fetch()){
        $roleSession = $ROLE['role'];
        $etatSession = $ROLE['etat'];
    }
    if($roleSession == 'Candidat'){
         
        $add = "UPDATE membres SET cvPdf = '$Cv' WHERE email='$email'";
        $req = $bdd->prepare($add);
        $req->execute();
        header('Location: option.php' );
    }
}
?>