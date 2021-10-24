<?php session_start(); require_once("../../database/user.php"); if(isset($_POST['mod'])){modUser();};?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/compte.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/homeadm.css?v=<?php echo time() ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="database/fonction.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include('../../include/navadmin.php') ?>

    <div class="w-75 mt-5 px-5">
        <div class="container" style="border-bottom: 1px solid black;"><h4>Mon profil</h4></div>
        <div class="mt-3 d-flex">
            <div class="w-25 p-2 text-white">
                <div class="text-center">
                    <img src="../../assets/images/<?php profilImage();?>" alt="imageprofil" class="rounded-circle" style="width: 150px; height: 150px;">
                </div>
                <div class="text-center mt-5">
                    <button class="btn bg-primary">Changer</button>
                </div>

            </div>
            <div class="p-2 w-75 ">
                <div class="row py-3">
                    <p class="col mx-3" style="border-bottom: 1px solid black;"><?php userInfo('last_name');?></p>
                    <p class="col mx-3" style="border-bottom: 1px solid black;"><?php userInfo('first_name');?></p>
                </div>
                <div class="row py-3">
                    <p class="col mx-3" style="border-bottom: 1px solid black;"><?php userInfo('tel');?></p>
                    <p class="col mx-3" style="border-bottom: 1px solid black;"><?php userInfo('email');?></p>
                </div>
                <div class="py-3">
                    <p><?php userInfo('gender');?></p>
                </div>
                <div class="py-3 text-center">
                    <button class="btn btn-primary d-inline" data-toggle="modal" data-target="#modadmin">Changer mon profil</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        $id_admin = $_SESSION['id_user'];
        modalMod($id_admin,'modadmin', 'admin');
    ?>
</body>
</html>