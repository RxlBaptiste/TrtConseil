<?php  

session_start();

$db = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];   

    $mdpSaisi = htmlspecialchars($_POST['pass']);

    if($mdpSaisi == $pass){
        $_SESSION['mdp'];
        header('location:index.php');
    }

    $sql = "SELECT * FROM membres where email = '$email' ";
    $result = $db->prepare($sql);
    $result->execute();



if(!isset($_SESSION['email'])){
     $_SESSION['email'] = $email;
}
    $recupRole = $db->query("SELECT * FROM membres WHERE email = '$email'");
     while ($ROLE = $recupRole->fetch()){
       
        $nameSession = $ROLE['name'];
        $firstnameSession = $ROLE['firstname'];
        $passSession = $ROLE['password'];
        $roleSession = $ROLE['role'];
        $etatSession = $ROLE['etat'];
    }
    if($roleSession == 'Candidat' AND $etatSession == '1'){
        header("Location: ../Candidat/option.php " );
    }elseif($roleSession == 'Recruteur' AND $etatSession == '1'){
        header("Location: ../Recruteur/option.php");
    }elseif($roleSession == 'Consultant'){
        header("Location: ../../EspaceAdmin/Consultant/option.php");
    }elseif($roleSession == 'Admin'){
        header("Location: ../../EspaceAdmin/Admin/index.php");
    } else{
        header("Location: inscription.php");
    }

}