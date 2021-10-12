<?php session_start(); require_once('database/user.php'); 
    if(isset( $_SESSION['loginadm'])){header("location:pages/admin/home.php");}
    if(isset( $_SESSION['loginint'])){header("location:pages/intern/home.php");}
    if(isset( $_SESSION['loginmng'])){header("location:pages/manager/home.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/index.css?v=<?php echo time() ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="database/fonction.js"></script>
    <title>Intern-Connect</title>
</head>
<body>
    <div class="bg">
    <div class="container my-5 d-inline-block align-middle mw-100 ">
        <div class="container w-25 text-center text-light">
            <h3 class="">Stagieru Ui</h3>
        </div>
        <div class="container shadow-lg border w-25 p-4 bg-light">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="needs-validation" novalidate>
                <div>
                    <label for="login">Identifiant</label>
                    <input type="text" name="login" placeholder="Votre adresse email" class="form-control" required>
                </div>
                
                <div>
                    <label for="pwd">Mot de passe</label>
                    <input type="password" name="pwd" placeholder="Votre mot de passe" class="form-control" required>
                </div>

                <div class="mt-3 mx-auto" style="width: 100px">
                    <input type="submit" value="CONNEXION" name="conn" class="btn btn-primary">
                </div>
            </form>
            <?php if(isset( $_POST['conn'])){connectUser();}?>
        </div>
    </div>
    </div>
</body>
</html>