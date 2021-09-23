<?php session_start(); require_once("../../database/fonction.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../../assets/css/gestion.css">
    <title>Document</title>
</head>
<body>
    <a href="presences.php">Retour</a>
    <?php 
        $date = $_GET['date'];
        $id = $_GET['id'];

        adminAct($date, $id);
    ?>
</body>
</html>