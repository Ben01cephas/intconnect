<?php session_start(); require_once("../../database/user.php"); if(isset( $_POST['add'])){addUser();} if(isset($_POST['drop'])){deleteUser();} if(isset($_POST['mod'])){modUser();}?>
<?php
    $url = $_SERVER['PHP_SELF'];
    $i = $_GET['i'];
    $n = $_GET['n'];
?>
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
                    <div><h4>DASHBOARD/Utilisateurs<?php if($_GET['i']=='mng'){echo"/Managers";}elseif($_GET['i']=='int'){echo"/Stagiaires";} ?></h4></div>
                    <div class="text-right"><a href="recherche.php" class="btn btn-primary mr-2">Recherche</a><?php modalAdd('#ajout','+ Ajouter un utilisateur')?></div>
                </div>
                <div class="container mt-3">
                    <?php
                    listUser($i, '')?>
                </div>
            </div>
        </div>
    </div>

        <!-- The Modal -->
        <div class="modal fade" id="ajout">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ajout nouveau utilisateur</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body p-5">
                        <form action="<?php echo"$url?i=$i&n=$n"?>" method="post" class="">
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control" name="tel" placeholder="Numéro de téléphone" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="email" placeholder="Adresse email" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="sexe">Genre</label>
                                    <select name="genre" class="form-control" id="">
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="type">Type</label>
                                    <select name="type" class="form-control" id="">
                                        <option value="mng">Manager</option>
                                        <option value="int">stagiaire</option>
                                    </select>  
                                </div>
                            </div>
                    </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                <input type="reset" class="btn btn-warning" value="Reset">
                                <input type="submit" name="add" class="btn btn-primary" value="Ajouter">
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>
</body>
</html>
