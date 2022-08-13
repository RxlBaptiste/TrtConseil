<?php 
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $role = $_POST['role'];

    $db = new PDO('mysql:host=localhost;dbname=trtconseil;', 'root', '');

    $sql = "SELECT * FROM membres where email = '$email' ";
    $result = $db->prepare($sql);
    $result->execute();
    $recupRole = $db->query("SELECT * FROM membres WHERE email = '$email'");
     while ($ROLE = $recupRole->fetch()){
        $etatSession = $ROLE['etat'];
    }  

    if($result->rowCount() > 0 AND $etatSession == '1'){ 
        $data = $result->fetchAll();
        if(password_verify($pass, $data[0]["password"])){
            $_SESSION['email'] = $email;
        header("Location: /Login_v15/index.php" );}
    }else{
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO membres ( name, firstname,  email, password, role, etat ) VALUES ( '$name','$firstname', '$email','$pass', '$role', '2' )";
        $req = $db->prepare($sql);
        $req->execute(); 

?>

<div>
    Enregistrement Validé <br>
    La session est prête a être utilisé
</div>

<?php
    }
}
?>