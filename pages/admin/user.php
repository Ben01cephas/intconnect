<?php session_start(); require_once("../../database/user.php"); if(isset( $_POST['add'])){addUser();} ?>
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
                <div class="container d-flex  justify-content-between pb-2" style="border-bottom: 1px solid black;">
                    <div><h4>DASHBOARD/UTILISATEURS </h4></div>
                    <div class="text-right"><?php modalAdd()?></div>
                </div>
                <div class="container mt-3">
                    <?php 
                    $i = $_GET['i'];
                    listUser($i)?>
                </div>
 
            </div>
        </div>
    </div>
    
</body>
</html>