<?php session_start(); require_once("../../database/fonction.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/compte.css">
    <title>Document</title>
</head>
<body>
    <h2>Etes vous sur de vouloir supprimer le compte de <?php $nom = $_GET['nom']; echo"$nom";?> ?</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET['id']?>" method="post">
            <input type="submit" name="delete" value="SUPPRIMER">
        </form>
</body>
</html>