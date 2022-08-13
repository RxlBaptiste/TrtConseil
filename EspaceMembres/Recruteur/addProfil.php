<?php
session_start();

if(isset($_POST['submit'])){
    $entName = $_POST['nameEnt'];
    $entAdresse = $_POST['adresseEnt'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $bdd = new PDO('mysql:host=localhost;dbname=espaceadmin;', 'root', '');
    
    $recupRole = $bdd->query("SELECT * FROM membres WHERE email = '$email'");
     while ($ROLE = $recupRole->fetch()){
        $roleSession = $ROLE['role'];
        $etatSession = $ROLE['etat'];
    }
    if($roleSession == 'Recruteur'){
         
        $add = "UPDATE membres SET EntrepriseName = '$entName', EntrepriseAdresse = '$entAdresse' WHERE email='$email'";
        $req = $bdd->prepare($add);
        $req->execute();
        header('Location: option.php' );
    }
}
?>