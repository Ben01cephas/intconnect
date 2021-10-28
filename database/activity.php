<?php 
    /** 
     * page de fonctionnalité de l'application Inter Connect
     * contient toute les fonction concernant les entrées et sortis d'activités
     * écrit par Mahoungou Céphas Ben Adi
    */

    function adminAct($date, $id)
    {
        $conn = connDb();

        echo"
            <div class='container text-center'>
            <h4>Activité du $date</h4>
            <table class='table table-hover'>
            <thead>
            <tr>
                <th>Créneaux horaires</th>
                <th>Activités</th>
            </tr>
            </thead>
        ";

        $sql_admin_act = "SELECT * FROM `daily_activity` WHERE id_user = '$id' AND date_daily_activity = '$date'";
        $query_admin_act = mysqli_query($conn,$sql_admin_act) or die(mysqli_error($conn));

        while($admin_act = mysqli_fetch_array($query_admin_act))
        {
            extract($admin_act);
            echo"
            <tr>
                <td>$time_slot</td>
                <td>$name_activity</td>
            </tr>
            ";
        }
        echo"</table></div>";
    }

    function modAct()
    {
        $conn = connDb();
        $id_user = $_SESSION['id_user'];
        $trueDate = date('N-d-n-Y');    
        $date = dateFrançaise($trueDate);

        $cren = $_POST['cren'];
        $act = $_POST['act'];

        $sql_dlact = "UPDATE `daily_activity` SET `name_activity` = '$act' WHERE id_user = '$id_user' AND time_slot = '$cren' AND date_daily_activity = '$date'";
        $sql_query = mysqli_query($conn, $sql_dlact) or die(mysqli_error($conn));    
    }

    function selectAct()
    {
        $conn = connDb();
        echo"
        <div class='container w-50 text-center'>
        <h3>Liste compte stagiaire</h3>
        <table class='table table-hover'>
            <thead>
            <tr>
                <th>Créneau</th>
                <th>Activité</th>
            </tr></thead>";

        $nom = $_POST['intern'];
        $date = $_POST['date'];

        $sql_list = "SELECT * FROM `daily_activity` WHERE  id_user = '$nom' AND date_daily_activity = '$date'";
        $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));
        while($list = mysqli_fetch_array($query_list))
        {
            extract($list);
            echo"
                <tr>
                    <td>$time_slot</td>
                    <td>$name_activity</td>
                </tr>
                ";
        }
        echo"</table></div>";     
    }

    function creneauActuel()
    {
        date_default_timezone_set('Africa/Dakar');
        $heure = date('h-a');
        $trueDate = date('N-d-n-Y');    
        $date = dateFrançaise($trueDate);
        $id_user = $_SESSION['id_user'];

        $conn = connDb();

        switch ($heure) 
        {
            case "09-am":
                echo "<div>Créneau actuel: 9h - 10h</div>";

                $sql = "SELECT * FROM daily_activity WHERE id_user = '$id_user' AND time_slot = '09h - 10h' AND date_daily_activity = '$date'";
                $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $dact = mysqli_fetch_array($query);
                extract($dact);

                $activityPris = $name_activity;

                $activity = explode(";", $activityPris);

                echo"<div>";
                    foreach($activity as $act)
                    {
                        echo"$act <br>";
                    }
                echo"</div>";

                break;
                
            case "10-am":
                echo "Créneau actuel: 10h - 11h";
              break;
            case "11-am":
                echo "Créneau actuel: 11h - 12h";
              break;
            case "12-pm":
                echo "Créneau actuel: 12h - 13h";
              break;
            case "01-pm":
                echo "Créneau actuel: 13h - 14h";
              break;
            case "03-pm":
                echo "Créneau actuel: 15h - 16h";
                break;
            case "04-pm":
                echo "Créneau actuel: 16h - 17h";
                break;             
            default:
                echo "Votre heure de travail est terminée";
          }
    }

    //nombre presences
    function userNbpres($id_intern)
    {
        $conn = connDb();
  
            $sql = "SELECT COUNT(*) nb FROM `connect_intern` WHERE id_user = '$id_intern'";
            $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
            $number = mysqli_fetch_array($query);
            extract($number);

            echo"<h3 class='font-weight-bold'>$nb</h3>";
    }

?>
   