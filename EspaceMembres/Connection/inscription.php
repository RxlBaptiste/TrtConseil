<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V15</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body style="text-align:center;">
    <span>Veuillez vous inscrire</span>
    <form action="enregistrement.php" method="POST">
        <div>
            <input type="text" name="name" placeholder="Nom" />
        </div>
        <div>
            <input type="text" name="firstname" placeholder="Prénom" />
        </div>
        <div>
            Vous êtes :
            <select type="text" name="role">
                <option>Recruteur</option>
                <option>Candidat</option>
            </select>
        </div>
        <div>
            <input type="mail" name="email" placeholder="Adresse mail" required />
        </div>

        <div>
            <input type="password" name="pass" placeholder="Mot de passe"
                title="Au moins 8 caractères, un chiffre, une lettre majuscule et une minuscule"
                pattern="(?=^.{8,}$)(?=.*[A-Z])(?=.*[a-z]).*" minlength="8" required />
        </div>

        <div>
            <button name="submit">Connexion</button>
        </div>
    </form>