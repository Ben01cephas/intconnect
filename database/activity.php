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
            <div class='container w-50 text-center'>
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
        $date = datejour();

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

?>
   