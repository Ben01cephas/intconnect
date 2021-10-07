<?php session_start(); require_once("../../database/user.php"); $npage = "presence";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="database/fonction.js"></script>
    <title>Document</title>
</head>
<body>
    <?php include('../../include/navmng.php') ?>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="intern">Utilsateur</label>
        <input type="text" name="intern">

        <label for="month">Mois</label>
        <select name="month" id="">
            <option value="01" <?php moisSelected('01');?>>Janvier</option>
            <option value="02" <?php moisSelected('02');?>>Février</option>
            <option value="03" <?php moisSelected('03');?>>Mars</option>
            <option value="04" <?php moisSelected('04');?>>Avril</option>
            <option value="05" <?php moisSelected('05');?>>Mai</option>
            <option value="06" <?php moisSelected('06');?>>Juin</option>
            <option value="07" <?php moisSelected('07');?>>Juillet</option>
            <option value="08" <?php moisSelected('08');?>>Août</option>
            <option value="09" <?php moisSelected('09');?>>Semptembre</option>
            <option value="10" <?php moisSelected('10');?>>Octobre</option>
            <option value="11" <?php moisSelected('11');?>>Novembre</option>
            <option value="12" <?php moisSelected('12');?>>Décembre</option>
        </select>

        <label for="year">année</label>
        <input type="number" name="year" value="<?php date_default_timezone_set('Africa/Dakar'); $year = date('Y'); echo"$year";?>"><br>

        <input type="submit" name="bpresences" value="CHERCHER">
    </form>
</body>
</html>
<?php if(isset($_POST['logout'])){logout();} ?>
<?php if(isset($_POST['bpresences'])){selectpres();}?>

