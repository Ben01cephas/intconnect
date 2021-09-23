<?php session_start(); require_once("../../database/fonction.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/compte.css">
    <title>Document</title>
</head>
<body>
<a href="home.php">Accueil</a>
    <?php compteConsulte(); ?>
</body>
</html>