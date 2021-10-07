<?php 
    /** 
     * page de fonctionnalité de l'application Inter Connect
     * contient toute les fonction concernant les utilisateur de l'application(manager, administrateur et stagiaire)
     * écrit par Mahoungou Céphas Ben Adi
    */

    //Retourne la date du jour
    function datejour(){date_default_timezone_set('Africa/Dakar'); $date = date('Y-m-d');return $date; }

    //écris la date du jour
    function datedujour(){date_default_timezone_set('Africa/Dakar'); $date = datejour();echo"$date";}

    //Fonction permettant de se connecter à la base de donnée en tant qu'utilisateur 'root'
    function connDb() {$conn = mysqli_connect("localhost", "root", "", "intconnect");return $conn;}

    function moisSelected($mois)
    {
        date_default_timezone_set('Africa/Dakar'); $date = date('m');
        if($mois == $date)
        {
            echo"selected";
        }
    }

    //fonction de l'administrateur----------------------------------------------------------------------------------------------------

    //fonction qui liste de façon décroissante les utilisateur inscrit dans la base de données
    function listUser()
    {
        $conn = connDb();
        $url = $_SERVER['PHP_SELF'];

        $sql_nb="SELECT * FROM `intern`";
        $query_nb=mysqli_query($conn,$sql_nb) or die(mysqli_error($conn));
        $nb=mysqli_num_rows($query_nb);

        if($nb%5==0)
        {
            $check = $nb/5;            
        }else
        {
            $check = (($nb/5) + 1);
        }

        echo"<div class='container w-50'><ul class='pagination '>";
        for($i=1; $i<=$check; $i++)
        {
            echo "<li class='page-item'><a class='page-link' href='$url?n=$i'>$i</a></li>";
        }
        echo"</ul>";

        if (isset($_GET['n']))
        {
            $n = $_GET['n'];
            
            $lmax = $n * 5;
            $lmin = $lmax - 5;

            $sql_list = "SELECT * FROM `user` WHERE fonction = 'int' OR fonction = 'mng' ORDER BY id_user DESC  LIMIT $lmin, $lmax";
            $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));

            echo"
            
            <table class='table table-hover'>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse email</th>
                </tr>
            </thead>
            ";
            while($list = mysqli_fetch_array($query_list))
            {
                extract($list);
                echo"
                <tr>
                    <td><a href='compte.php?id=$id_user'>$last_name</a></td>
                    <td><a href='compte.php?id=$id_user'>$first_name</a></td>
                    <td><a href='compte.php?id=$id_user'>$email</a></td>
                </tr>
                "; 
            }       
            echo"</table></div>";     
        }
    }

    //fonction d'ajout d'un utilisateur par l'administrateur
    function addUser()
    {
        $conn = connDb();

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['genre'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $mdp = 'test';
        $mdpc = sha1($mdp);

        $sql_ajout = "INSERT INTO `user` (`id_user`, `last_name`, `first_name`, `tel`, `gender`, `email`, `password`, `fonction`, `photo`) VALUES (NULL, '$nom', '$prenom', '$tel', '$sexe', '$email', '$mdpc', '$type', 'profilbasic.jpg')";
        $sql_query = mysqli_query($conn, $sql_ajout) or die(mysqli_error($conn));

        header("location:gestion.php");
    }

    //fonction de recherche de recherche d'utilisateur avec filtre
    function rechercheUser()
    {
        $conn = connDb();

        $nom = $_POST['nom'];
        $tel = $_POST['tel'];
        $sexe = $_POST['sexe'];
        $type = $_POST['type'];

        //Condition des requêtes sql, si les données existent, les requêtes seront écrites
        if($tel=="")
        {
            $reqtel = "";
        }else{
            $reqtel = "AND tel = '$tel'";
        }

        if($sexe=="")
        {
            $reqsexe = "";
        }else{
            $reqsexe = "AND gender = '$sexe'";
        }

        if($type=="")
        {
            $reqtype = "AND (fonction = 'mng' OR fonction = 'int')";
        }else{
            $reqtype = "AND fonction = '$type'";
        }

        $sql_list = "SELECT * FROM `user` WHERE (last_name LIKE '%$nom%' OR first_name LIKE '%$nom%' OR email LIKE '%$nom%') $reqsexe $reqtel $reqtype ORDER BY last_name";
        
        $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));

        echo"
        <table class='table table-hover'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse email</th>
            </tr>
        </thead>
        ";
        while($list = mysqli_fetch_array($query_list))
            {
                extract($list);
                echo"
                <tr>
                    <td><a href='compte.php?id=$id_user'>$last_name</a></td>
                    <td><a href='compte.php?id=$id_user'>$first_name</a></td>
                    <td><a href='compte.php?id=$id_user'>$email</a></td>
                </tr>
                "; 
            }       
        echo"</table></div>";     
    }

    function compteConsulte()
    {
        $id_int = $_GET['id'];
        $conn = connDb();

        $sql_compte = "SELECT * FROM `user` WHERE id_user = $id_int;";
        $query_compte = mysqli_query($conn,$sql_compte) or die(mysqli_error($conn));
        $compte = mysqli_fetch_array($query_compte);
        extract($compte);
        $nometprenom = "$last_name $first_name";

        $url = $_SERVER['PHP_SELF'];
        echo"
        <div id='main'>
            <div id='head'>
                <img id='profil' src='../../assets/images/$photo' alt='profil de Takagi'>
            </div>
            <div id='body'>
                <p>Compte de $last_name $first_name</p>
                <p>$email</p>
                <p>$tel</p>
                <p>$gender</p>
            </div>

            <button type='button' class='btn btn-primary w-25' data-toggle='modal' data-target='#delete'>
                Supprimer
            </button>

            <div class='modal fade' id='delete'>
            <div class='modal-dialog'>
                <div class='modal-content'>

                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='modal-title'>Voulez vous vraiment supprimer le compte de $last_name $first_name</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class='modal-body p-5'>
                        <form action='$url?id=$id_int' method='post'>
                            <input type='submit' name='delete' value='SUPPRIMER' class='btn btn-primary'>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>";
    }

    function deleteUser()
    {
        $conn = connDb();

        $id_int = $_GET['id'];

        $sql_drop = " DELETE FROM `user` WHERE `id_user` = $id_int";
        $query_drop = mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));

        header("location:gestion.php");
    }

    //-----------------------------------------------------------------------------------------------------

    //fonction de connection des utilisateurs
    function connectUser()
    {
        $conn = connDb();  
        $login=$_POST['login'];
        $mdp=$_POST['pwd'];
        $mdpc=sha1($mdp);

        $sql_auth="select count(*) nbl from user where email='$login' and password='$mdpc'";
        $query_auth=mysqli_query($conn,$sql_auth) or die(mysqli_error($conn));
        $auth=mysqli_fetch_object($query_auth);

        if($auth->nbl==1)//Si les informations sont correctes
            {
                $login;
                $mdpc;
    
                $sql_user="SELECT * FROM user WHERE password = '$mdpc' AND email = '$login'";
                $query_user = mysqli_query($conn, $sql_user) or die(mysqli_error($conn));
                $user = mysqli_fetch_array($query_user);
                extract($user);

                $fonc = $fonction;
                $_SESSION['id_user'] = $id_user;

                if($fonc=="adm")
                {
                    $_SESSION['loginadm']=$login;

                    header("location:pages/admin/home.php");
                }elseif($fonc=="mng")
                {
                    $_SESSION['loginmng']=$login;

                    
                    header("location:pages/manager/home.php");
                }elseif($fonc="int")
                {
                    $_SESSION['loginint'] = $login;
                    $iduser = $_SESSION['id_user'];

                    date_default_timezone_set('Africa/Dakar');    
                    $Date = datejour();
                    $Time = date('h:i:s a');
                    $mois = date('m');
                    $annee = date('Y');
                    
                    $sql_check = "SELECT COUNT(*) nbl FROM connect_intern WHERE date_connect = '$Date' AND id_user = $iduser";
                    $query_check = mysqli_query($conn, $sql_check) or die(mysqli_error($conn));
                    $check = mysqli_fetch_object($query_check);
                    if($check->nbl==1)//Si le stagiaire s'est déja connecté dans la journnée
                    {
                        $sql_connect = "SELECT * FROM connect_intern WHERE date_connect = '$Date' AND id_user = $iduser ";
                        $query_connect = mysqli_query($conn, $sql_connect) or die(mysqli_error($conn));
                        $connect = mysqli_fetch_array($query_connect);
                        extract($connect);
            
                        $_SESSION['id_connect'] = $id_connect_intern;
                        header("location:pages/intern/home.php");

                    }else//Si c'est la première connection de la jounnée
                    {
                        $sql_date = "INSERT INTO `connect_intern` (`id_connect_intern`, `date_connect`, `month_connect`, `year_connect`, `hr_connect`, `hr_disconnect`, `id_user`) VALUES (NULL, '$Date', '$mois', '$annee', '$Time', 'Pas déconnecté', '$iduser')";
                        $sql_query = mysqli_query($conn, $sql_date) or die(mysqli_error($conn));
            
                        $sql_connect = "SELECT * FROM connect_intern WHERE date_connect = '$Date'  AND hr_connect = '$Time' AND id_user = $iduser ";
                        $query_connect = mysqli_query($conn, $sql_connect) or die(mysqli_error($conn));
                        $connect = mysqli_fetch_array($query_connect);
                        extract($connect);
            
                        $_SESSION['id_connect'] = $id_connect_intern;
    
                        $cr = array("09h - 10h", "10h - 11h", "11h - 12h", "12h - 13h", "13h - 14h", "15h - 16h", "16h - 17h");
    
                        for($i=0; $i<=6; $i++)
                        {
                            $sql_dlact = "INSERT INTO `daily_activity` (`id_daily_activity`, `time_slot`, `name_activity`, `id_user`, `date_daily_activity`) VALUES (NULL, '$cr[$i]', 'Non remplis', '$iduser', '$Date') ";
                            $sql_query = mysqli_query($conn, $sql_dlact) or die(mysqli_error($conn));
                        }
                        
                        header("location:pages/intern/home.php");
                    } 
                }
            }else//Si les informations sont incorrectes
            {
                echo'
                <div class="alert alert-danger alert-dismissible mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Identifiant ou mot de passe incorrect!</strong>
                </div>';
            }
    }

    function logout()
    {
        if(isset($_SESSION['loginint']))
        {
            $conn = connDb();
            $id_connexion = $_SESSION['id_connect'];
            date_default_timezone_set('Africa/Dakar');   
            $Time = date('h:i:s a');
    
            $sql_deco = "UPDATE `connect_intern` SET `hr_disconnect` = '$Time' WHERE `connect_intern`.`id_connect_intern` = $id_connexion; ";
            $query_deco=mysqli_query($conn,$sql_deco) or die(mysqli_error($conn));
        }

        session_start();
        session_destroy();
        unset($_SESSION['loginint']);
        unset($_SESSION['loginadm']);
        unset($_SESSION['loginmng']);
        unset($_SESSION['password']);
        unset($_SESSION['id_user']);
        unset($_SESSION['id_connect']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        header("location:../../index.php");
    }



    function userPres()
    {
        $conn = connDb();
        $id_user = $_SESSION['id_user'];

        echo"<div class='container w-50'><table class='table table-hover'><tr><th>Date</th><th>Heure de connexion</th></tr>";
        $sql_pre = "SELECT * FROM `connect_intern` JOIN user WHERE connect_intern.id_user = user.id_user AND user.id_user = '$id_user' LIMIT 30; ";
        $sql_query_apre = mysqli_query($conn, $sql_pre) or die(mysqli_error($conn));
        while($pre = mysqli_fetch_array($sql_query_apre))
        {
            extract($pre);
            echo"<tr><td>$date_connect</td> <td>connecté à $hr_connect</td></tr>";
        }        
        echo"</table></div>";
    }

    function listeIntpres()
    {
        $conn = connDb();
        $sql_list = "SELECT * FROM `user` WHERE fonction = 'int' OR fonction = 'mng'";
        $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));
        while($list = mysqli_fetch_array($query_list))
        {
            extract($list);
            echo"
                <option value='$id_user'>$last_name $first_name ($email)</option>
            ";
        }
    }

    function selectpres()
    {
        $conn = connDb();
        echo"
        <div class='container w-50 text-center'>
        <h3>Liste compte stagiaire</h3>
        <table class='table table-hover'>
            <thead>
            <tr>
                <th>Stagiaire</th>
                <th>Date</th>
                <th>Heure de connexion</th>
                <th>Heure de déconnexion</th>
                <th>Activité</th>
            </tr></thead>";

        $nom = $_POST['intern'];
        $mois = $_POST['month'];
        $annee = $_POST['year'];

        $sql_list = "SELECT * FROM `connect_intern` JOIN user WHERE connect_intern.id_user = user.id_user AND (last_name LIKE '%$nom%' OR first_name LIKE '%$nom%' OR email LIKE '%$nom%') AND year_connect = $annee AND month_connect = $mois";
        $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));
        while($list = mysqli_fetch_array($query_list))
        {
            extract($list);
            echo"
            <tr>
                <td>$last_name $first_name ($email)</td>
                <td>$date_connect</td>
                <td>$hr_connect</td>
                <td>$hr_disconnect</td>
                <td><a href='activite.php?id=$id_user&date=$date_connect'>Activité</a></td>
            </tr>
            ";
        }
        echo"</table></div>";     
    }

    function listConnect()
    {
        $conn = connDb();
        $url = $_SERVER['PHP_SELF'];

        $sql_nb="SELECT * FROM `connect_intern`";
        $query_nb=mysqli_query($conn,$sql_nb) or die(mysqli_error($conn));
        $nb=mysqli_num_rows($query_nb);

        if($nb%10==0)
        {
            $check = $nb/10;            
        }else
        {
            $check = (($nb/10) + 1);
        }

        echo"<div class='container w-75'><ul class='pagination '>";
        for($i=1; $i<=$check; $i++)
        {
            echo "<li class='page-item'><a class='page-link' href='$url?n=$i'>$i</a></li>";
        }
        echo"</ul>";

        if (isset($_GET['n']))
        {
            $n = $_GET['n'];
            
            $lmax = $n * 5;
            $lmin = $lmax - 5;

            $sql_list = "SELECT * FROM `connect_intern` JOIN user WHERE connect_intern.id_user = user.id_user ORDER BY id_connect_intern DESC  LIMIT $lmin, $lmax";
            $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));

            echo"
            
            <table class='table table-hover'>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Heure de connection</th>
                    <th>Heure de déconnection</th>
                </tr>
            </thead>
            ";
            while($list = mysqli_fetch_array($query_list))
            {
                extract($list);
                echo"
                <tr>
                    <td><a href='compte.php?id=$id_user'>$last_name $first_name($email)</a></td>
                    <td><a href='compte.php?id=$id_user'>$date_connect</a></td>
                    <td><a href='compte.php?id=$id_user'>$hr_connect</a></td>
                    <td><a href='compte.php?id=$id_user'>$hr_disconnect</a></td>
                </tr>
                "; 
            }       
            echo"</table></div>";     
        }
    }
?>

