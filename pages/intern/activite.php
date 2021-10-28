<?php session_start(); require_once("../../database/user.php"); require_once("../../database/activity.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../../assets/css/presence.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php include('../../include/navint.php') ?>
    <?php if(isset($_POST['acti'])){modAct();}?>
    <div class="container w-75 mt-5 px-5">
        <?php
            $trueDate = date('N-d-n-Y');    
            $date = dateFrançaise($trueDate);
            $id = $_SESSION['id_user'];
            adminAct($date, $id);
        ?>
        <div class="text-center">
            <button type="button" class="btn btn-primary w-25" data-toggle="modal" data-target="#myModal">Modifier</button>
        </div>    
    </div>

    <div class="container w-75 text-center">
    <!-- Button to Open the Modal -->
    
     <!-- The Modal -->
     <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body p-5">
                        <p>Aoutez une ou plusieurs activités.</p>
                        <p>(séparer les activités par des ";")</p>
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="">
                            <div class="">
                                <select name="cren" id="">
                                    <option value="09h - 10h">09h - 10h</option>
                                    <option value="10h - 11h">10h - 11h</option>
                                    <option value="11h - 12h">11h - 12h</option>
                                    <option value="12h - 13h">12h - 13h</option>
                                    <option value="13h - 14h">13h - 14h</option>
                                    <option value="15h - 16h">15h - 16h</option>
                                    <option value="16h - 17h">16h - 17h</option>
                                </select>

                                <input type="text" name="act">
                            </div>

                            <div class="mt-3 mx-auto" style="width: 100px">
                                <input type="submit" name="acti" class="btn btn-primary" value="Enregistrer">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
     </div>
     </div>
</body>
</html>


