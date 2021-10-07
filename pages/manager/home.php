<?php session_start(); require_once("../../database/user.php"); $npage = "home";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="database/fonction.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include('../../include/navmng.php') ?>
    <div class="container-fluid text-center">
        <h1>Espace Manager</h1>
    </div>

    <div id="" class="container w-75 text-center mt-5">
        <?php if(isset( $_POST['add'])){addUser();}?>
        <a href="presence.php"><button type="button" class="btn btn-primary w-25">Recherche</button></a>    
        <?php listConnect()?>
    </div> 
</body>
</html>

