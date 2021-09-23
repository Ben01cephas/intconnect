<?php session_start(); require_once("../../database/fonction.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../../assets/css/gestioncompte.css">
    <title>Document</title>
</head>
<body>
    <h1>COMPTE UTILISATEUR<h1>
    <a href="home.php">Accueil</a>
    <img id="profil" src="../../assets/images/<?php profilImage()?>" alt="profil stagiaire">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="chprofil" value="Modifier">
    </form>
</body>
</html>