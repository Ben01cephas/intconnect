<?php session_start(); require_once("../../database/user.php"); if(isset( $_POST['add'])){addUser();} if(isset($_POST['drop'])){deleteUser();} if(isset($_POST['mod'])){modUser();};?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="database/fonction.js"></script>
    <title>Administration</title>
</head>
<body>
    <?php include('../../include/navadmin.php') ?>

    <div class="w-75 mt-5 px-5">
        <div class="container d-flex  justify-content-between pb-2" style="border-bottom: 1px solid black;">
                <div><h4>DASHBOARD/Utilisateurs/Recherche</h4></div>
                <div class="text-right"><?php modalAdd('#ajout','+ Ajouter un utilisateur')?></div>
        </div>

        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']?>?i=recherche&n=1" method="post" class="form-inline">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" placeholder="Nom, prenom ou identifiant" name="nom">

                <label for="tel">Num. Tel: </label>
                <input type="num" class="form-control" placeholder="télephone(optionel)" name="tel">

                <label for="sexe">Genre: </label>
                <select name="sexe" id="" class="form-control">
                    <option value="">Tous</option>
                    <option value="Homme">M</option>
                    <option value="Femme">F</option>
                </select>
                
                <label for="type">Type: </label>
                <select name="type" id="" class="form-control">
                    <option value="">Tous</option>
                    <option value="mng">Manager</option>
                    <option value="int">Stagiaire</option>
                </select>

                <button type="submit" class="btn btn-primary" name="search">Rechercher</button>
            </form>
            <?php if(isset($_POST['search'])){rechercheUser();};?>
        </div>
    </div>
</body>
</html>
