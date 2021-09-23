<?php session_start(); require_once("../../database/fonction.php"); checkprofil();
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../../database/fonction.js"></script>
    <link rel="stylesheet" href="../../assets/css/homeint.css?v=<?php echo time() ?>">
    <title>Document</title>
</head>
<body>
        <div id="main">
            <div id="topMenu">

            </div>
            <div id="logo">
                <div id="titre"><h1><?php echo"$nom $prenom";?></h1></div>
                <div id="photo"><a href="gestioncompte.php"><img id="profil" src="../../assets/images/<?php profilImage()?>" alt="profil stagiaire"></a></div>
            </div>
            <div class="content" id="cont1">
                <?php 
                    $date = datejour();
                    $id = $_SESSION['id_intern'];
                    adminAct($date, $id);
                ?>
                <button href="" onclick="listerAct()">Lister les activités du jour</button>
            </div>
            <div class="content" id="cont2">
                    <div id="actconf">
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                            <div id="cren"><?php creneauActuel();?></div><br>  
                            <label for="cren">Activité en cours</label>
                            <div id="liste">
                                <select name="cren" id="liste">
                                    <?php plannification();?>
                                </select><br>
                            </div>
                            <input type="submit" name="plan" value="SOUMETTRE" id="sub">
                        </form><br>
                    </div>
                    <p>Pour consulter les satagiaires présent aujourd'hui, cliquez <a href="presence.php">Ici</a></p>

                    <form id="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"><input type="submit" name="logout" value="DECONNEXION"></form>
            </div>
            <div id="foot">
            </div>        
    </div>
</body>
</html>