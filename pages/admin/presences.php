<?php session_start(); require_once("../../database/fonction.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../../assets/css/gestion.css">
    <title>Document</title>
</head>
<body>
    <a href="home.php">Accueil</a>
    <h1>présences</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="intern">Utilsateur</label>
        <select name="intern" id="">
            <option value="all">Tous les stagiaires</option>
            <?php listeIntpres(); ?>
        </select>

        <label for="month">Mois</label>
        <select name="month" id="">
            <option value="01">Janvier</option>
            <option value="02">Février</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">Août</option>
            <option value="09">Semptembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
        </select>

        <label for="year">année</label>
        <input type="number" name="year" required><br>

        <input type="submit" name="bpresences" value="CHERCHER">
    </form>
</body>
</html>

<?php if(isset($_POST['bpresences'])){selectInt();}//consulter les présences pour les admins ?>