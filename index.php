<?php session_start(); require_once('database/fonction.php'); 
    if(isset( $_SESSION['login']))
    {
        header("location:pages/intern/home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css?v=<?php echo time() ?>">
    <title>Intern-Connect</title>
</head>
<body>
    <div id="main">
        <div id="topMenu">
            <div id="menu">
                <a href="" class="bar">Accueil</a>
                <a href="pages/connexion.php" class="bar">Connexion</a>
                <a href="">Contacts</a>
            </div>
        </div>
        <div id="logo">
            <h1>INTERN-CONNECT</h1>
            <p>Pour la suivie des satgiaires</p>
        </div>
        <div class="content" id="cont1">
            <h2>Qu'est ce que Intern-Connect</h2>
            <p></p>
        </div>
        <div class="content" id="cont2">
            <h2>A propos d'Intern-Connect</h2>
        </div>
        
        <div id="foot">

        </div>        
    </div>
</body>
</html>