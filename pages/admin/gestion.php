<?php session_start(); require_once("../../database/user.php"); $npage = "gestion";?>
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

    <div class="container w-75">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-inline">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" placeholder="Nom, prenom ou identifiant" name="nom">

        <label for="tel">Num. Tel: </label>
        <input type="num" class="form-control" placeholder="télephone(optionel)" name="tel">

        <label for="sexe">Genre: </label>
        <select name="sexe" id="" class="form-control">
            <option value="">Tous</option>
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
        
        <label for="type">Type: </label>
        <select name="type" id="" class="form-control">
            <option value="">Tous</option>
            <option value="mng">Manager</option>
            <option value="int">Stagiaire</option>
        </select>

        <button type="submit" class="btn btn-primary" name="search">Rechercher</button>
    </form>
    <?php if(isset($_POST['search'])){rechercheUser();}; if(isset($_POST['delete'])){deleteUser();} ?>
    </div>
</body>
</html>
