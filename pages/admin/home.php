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
    <h1>Espace administration</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"><input type="submit" name="deco" value="DECONNEXION"></form>
    <a href="gestion.php"><p>gestion de compte</p></a>
    <a href="presences.php"><p>Suivie d'activités</p></a>
    <a href="admin.php"><p>Informations administrateur</p></a>
</body>
</html>