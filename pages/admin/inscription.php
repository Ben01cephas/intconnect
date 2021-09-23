<?php session_start(); require_once("../../database/fonction.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="">
            <label for="nom">Nom</label>
            <input type="text" name="nom" required>
        </div>

        <div class="">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" required>
        </div>

        <div class="">
            <label for="sexe">Genre</label>
            <input type="radio" name="sexe" value="M">M
            <input type="radio" name="sexe" value="F">F
        </div>

        <div class="">
            <label for="tel">Numéro de téléphone</label>
            <input type="number" name="tel" required>
        </div>

        <div class="">
            <label for="email">Adresse électronique</label>
            <input type="text" name="email" required>
        </div>

        <div class="">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" required>
        </div>
        
        <div class="">
            <label for="mdpc">Confirmer votre mot de passe</label>
            <input type="password" name="mdpc" required>
        </div>

        <div class="">
            <input type="submit" name="binsc" value="INSCRIPTION">
        </div>
    </form>
</body>
</html>