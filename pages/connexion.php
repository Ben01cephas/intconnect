<?php session_start(); require_once('../database/fonction.php'); 
    if(isset( $_SESSION['id_connect']))
    {
        header("location:intern/home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/connexion.css?v=<?php echo time() ?>">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <div id="main-head"><h2>CONNEXION</h2></div>
        <div id="main-body">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="bloc">
                    <label class="label1" for="login">Login(votre adresse email)</label>
                    <input class="field" type="text" name="login" required>
                </div>

                <div class="bloc">
                    <label class="label1" for="mdp">Votre mot de passe</label>
                    <input class="field" type="password" name="mdp" required>
                </div>

                <div class="bloc">
                    <label for="admin">Connexion en tant qu'administrateur</label>
                    <input type="radio" value="oui" name="admin" required>Oui
                    <input type="radio" value="non" name="admin" required>Non
                </div>

                <div id="sub">
                    <input type="submit" name="bco" value="CONNEXION">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
