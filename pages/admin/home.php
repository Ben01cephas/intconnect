<?php session_start(); require_once("../../database/user.php"); $npage = "home";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../../assets/css/gestion.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="database/fonction.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include('../../include/navadmin.php') ?>
    <div class="container-fluid text-center">
        <h1>Compte utilisateur</h1>
    </div>

    <div id="" class="container w-75 text-center mt-5">
        <?php if(isset( $_POST['add'])){addUser();}?>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary w-25" data-toggle="modal" data-target="#myModal">
            Ajouter un compte
        </button>

        <a href="gestion.php"><button type="button" class="btn btn-primary w-25">Recherche</button></a>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter un nouveau compte</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body p-5">
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="">
                            <div class="">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>

                            <div class="">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" required>
                            </div>

                            <div class="">
                                <label for="sexe">Genre</label>
                                <select name="genre" class="form-control" id="">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>

                            <div class="">
                                <label for="tel">Numéro de téléphone</label>
                                <input type="number" class="form-control" name="tel" required>
                            </div>

                            <div class="">
                                <label for="email">Adresse électronique</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>

                            <div>
                                <label for="type">Type</label>
                                <select name="type" class="form-control" id="">
                                    <option value="mng">Manager</option>
                                    <option value="int">stagiaire</option>
                                </select>
                            </div>

                            <div class="mt-3 mx-auto" style="width: 100px">
                                <input type="submit" name="add" class="btn btn-primary" value="Ajouter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php listUser()?>
    </div> 
</body>
</html>