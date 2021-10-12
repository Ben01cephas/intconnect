<?php session_start(); require_once("../../database/user.php"); $npage = "home";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../../assets/css/homeadm.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="database/fonction.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="">
        <?php include('../../include/navadmin.php') ?>
        
            <div class="w-75 mt-5 px-5">
                <div class="container" style="border-bottom: 1px solid black;"><h4>DASHBOARD/HOME</h4></div>

                <div class="row mx-2 pt-3 text-white">
                    <div class="mx-5 col p-3 rounded shadow" style="background-image: linear-gradient(45deg, rgb(126,233,230), rgb(34,198,193), rgb(30,176,172))">
                        <?php userNumber('')?>
                        <p class="text-right">Utilisateur</p>
                        <a href="user.php?i=user&n=1" class="text-white">Voir plus ></a>
                    </div>

                    <div class="mx-5 col bg-success p-3 rounded shadow" style="background-image: linear-gradient(45deg, rgb(246,231,165), rgb(239,213,95), rgb(232,195,25))">
                        <?php userNumber('mng')?>  
                        <p class="text-right">Manager</p>
                        <a href="user.php?i=mng&n=1" class="text-white">Voir plus ></a>
                    </div>

                    <div class="mx-5 col bg-info p-3 rounded shadow" style="background-image: linear-gradient(45deg, rgb(231,165,246), rgb(213,95,239), rgb(195,25,232))">
                        <?php userNumber('int')?>
                        <p class="text-right">Stagiaire</p>
                        <a href="user.php?i=int&n=1" class="text-white">Voir plus ></a>
                    </div>
                </div>

                <div class="row mt-5 ">
                    <div class="shadow ml-5 col">
                        <p class="pt-2">Utilisateurs récements ajoutés</p>
                        <?php recentUser('')?>
                    </div>

                    <div class="shadow ml-3 col">
                        <p class="pt-2">Managers récements ajoutés</p>
                        <?php recentUser('mng')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>