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
        <label for="activites">Entrez les activités du jour(Séparer chaque activité par un ; ex: act1; act2; act3 ...ect</label><br>
        <input type="text" name="activites"><br>

        <input type="submit" name="acts" value="SOUMETTRE">
    </form><br>

    <a href="home.php">Accueil</a>
</body>
</html>
