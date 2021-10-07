<?php
    function datejour()//Retourne la date du jour 
    {
        date_default_timezone_set('Africa/Dakar'); 
        $date = date('Y-m-d');
        return $date; 
    }

    function datedujour()//écris la date du jour
    {
        date_default_timezone_set('Africa/Dakar'); 
        $date = datejour();
        echo"$date";
    }
    function connDb() //Fonction permettant de se connecter à la base de donnée en tant qu'utilisateur 'root'
    {   
        $conn = mysqli_connect("localhost", "root", "", "intconnect");       
        return $conn;
    }

    function register()//Fonction d'inscription d'un stagiaire sur la plate-forme
    {
        $conn = connDb();
        
        $password = $_POST['mdp'];
        $pwd = sha1($password);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $genre = $_POST['sexe'];
        $photo = "profilbasic.jpg";

        $sql_ajout = "INSERT INTO `intern` (`id_intern`, `password_intern`, `last_name_intern`, `first_name_intern`, `email_intern`, `tel_intern`, `gender_intern`, `photo_intern`) VALUES (NULL, '$pwd', '$nom', '$prenom', '$email', '$tel', '$genre', '$photo') ";
        $sql_query = mysqli_query($conn, $sql_ajout) or die(mysqli_error($conn));
        echo"<script>alert('$nom $prenom a bien été ajouté');</script>";
        header("location:home.php");
    }

    function plannification()
    {
        $conn = connDb();
        $date = datejour();
        $id_intern = $_SESSION['id_intern'];

        $sql_act = "SELECT name_activity FROM activity WHERE date_activity = '$date' AND id_intern = $id_intern";
        $sql_query_act = mysqli_query($conn, $sql_act) or die(mysqli_error($conn));
        while($act = mysqli_fetch_array($sql_query_act))
        {
            extract($act);
            echo"<option value='$name_activity'>$name_activity</option>";
        }
    }

    function creneauActuel()
    {
        date_default_timezone_set('Africa/Dakar');
        $heure = date('h-a');

        //var_dump($heure); die();

        switch ($heure) 
        {
            case "09-am":
              echo "Créneau actuel: 9h - 10h";
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

    function profilImage()
    {
        $id_int = $_SESSION['id_intern'];
        $conn = connDb();
        $namel = $_SESSION['login'];

        $sql_profil="SELECT photo_intern FROM intern WHERE id_intern = $id_int;";
        $query_profil = mysqli_query($conn, $sql_profil) or die(mysqli_error($conn));
        $profil = mysqli_fetch_array($query_profil);
        extract($profil);

        echo"$photo_intern";
    }

    function checkprofil()
    {
        $conn = connDb();

        $login = $_SESSION['login'];
        $mdpc = $_SESSION['password'];
    
        $sql_int="SELECT * FROM intern WHERE password_intern = '$mdpc' AND email_intern = '$login'";
        $query_int = mysqli_query($conn, $sql_int) or die(mysqli_error($conn));
        $int = mysqli_fetch_array($query_int);
        extract($int);

        $nomprofle = $photo_intern;

        if($nomprofle == "profilbasic.jpg")
        {
            header("location:firstconnect.php");
        }
        checkActivity();
    }

    function checkActivity()
    {
        $conn = connDb();
        $date = datejour();
        $id_intern = $_SESSION['id_intern'];

        $sql_check = "SELECT count(*) nbl FROM `activity` WHERE id_intern = '$id_intern'  AND date_activity = '$date'";
        $query_auth=mysqli_query($conn,$sql_check) or die(mysqli_error($conn));
        $auth=mysqli_fetch_object($query_auth);
            
        if($auth->nbl>=1)
        {
            
        }else
        {
            header("location:activite.php");
        }
    }

    function listeInt()
    {
        $conn = connDb();
        echo"
        <table>
            <caption>Liste compte stagiaire</caption>
            <tr>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Numéro tél</th>
                <th>Genre</th>
                <th>profil</th>
            </tr>";

        $sql_list = "SELECT * FROM `intern` ";
        $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));
        while($list = mysqli_fetch_array($query_list))
        {
            extract($list);
            echo"
            <tr>
                <td><a href='compte.php?id=$id_intern'>$id_intern</a></td>
                <td><a href='compte.php?id=$id_intern'>$last_name_intern</a></td>
                <td><a href='compte.php?id=$id_intern'>$first_name_intern</a></td>
                <td><a href='compte.php?id=$id_intern'>$email_intern</a></td>
                <td><a href='compte.php?id=$id_intern'>$tel_intern</a></td>
                <td><a href='compte.php?id=$id_intern'>$gender_intern</a></td>
                <td><a href='compte.php?id=$id_intern'><img src='../../assets/images/$photo_intern' alt='$first_name_intern image de profil'></a></td>
            </tr>
            ";
        }
        echo"</table>";
    }

    function listeIntpres()
    {
        $conn = connDb();
        $sql_list = "SELECT * FROM `intern` ";
        $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));
        while($list = mysqli_fetch_array($query_list))
        {
            extract($list);
            echo"
                <option value='$id_intern'>$last_name_intern $first_name_intern ($email_intern)</option>
            ";
        }
    }

    function selectInt()
    {
        $conn = connDb();
        echo"
        <table>
            <caption>Liste compte stagiaire</caption>
            <tr>
                <th>Stagiaire</th>
                <th>Date</th>
                <th>Heure de connexion</th>
                <th>Heure de déconnexion</th>
                <th>Activité</th>
            </tr>";

        $nom = $_POST['intern'];
        $mois = $_POST['month'];
        $annee = $_POST['year'];

        if($nom == "all")
        {
            $sql_list = "SELECT * FROM `connect_intern` JOIN intern WHERE connect_intern.id_intern = intern.id_intern AND year_connect = $annee AND month_connect = $mois";
            $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));
            while($list = mysqli_fetch_array($query_list))
            {
                extract($list);
                echo"
                <tr>
                    <td>$last_name_intern $first_name_intern ($email_intern)</td>
                    <td>$date_connect</td>
                    <td>$hr_connect</td>
                    <td>$hr_disconnect</td>
                    <td><a href='activite.php?id=$id_intern&date=$date_connect'>Activité</a></td>
                </tr>
                ";
            }
            echo"</table>"; 
        }else
        {
            $sql_list = "SELECT * FROM `connect_intern` JOIN intern WHERE connect_intern.id_intern = intern.id_intern AND connect_intern.id_intern = $nom AND year_connect = $annee AND month_connect = $mois";
            $query_list = mysqli_query($conn, $sql_list) or die(mysqli_error($conn));
            while($list = mysqli_fetch_array($query_list))
            {
                extract($list);
                echo"
                <tr>
                    <td>$last_name_intern $first_name_intern ($email_intern)</td>
                    <td>$date_connect</td>
                    <td>$hr_connect</td>
                    <td>$hr_disconnect</td>
                    <td><a href='activite.php?id=$id_intern&date=$date_connect'>Activité</a></td>
                </tr>
                ";
            }
            echo"</table>";     
        }
    }

    if(isset($_POST['binsc']))//Confirmation du mot de passe lors de l'inscription d'un stagiaire
    {
        $mdp = $_POST['mdp'];
        $mdpc = $_POST['mdpc'];

        if($mdp == $mdpc){
            register();
        }else{
            echo"<script>alert('Mot de passe non valide! Veuillez entrer le même mot de passe dans les champ mot de passe et confimartion');</script>";
        }
    }

    function compteConsulte()
    {
        $id_int = $_GET['id'];
        $conn = connDb();

        $sql_compte = "SELECT * FROM `intern` WHERE id_intern = $id_int;";
        $query_compte = mysqli_query($conn,$sql_compte) or die(mysqli_error($conn));
        $compte = mysqli_fetch_array($query_compte);
        extract($compte);
        $nometprenom = "$last_name_intern $first_name_intern";
        echo"
        <div id='main'>
            <div id='head'>
                <img id='profil' src='../../assets/images/$photo_intern' alt='profil de Takagi'>
            </div>
            <div id='body'>
                <p>Compte de $last_name_intern $first_name_intern</p>
                <p>$email_intern</p>
                <p>$tel_intern</p>
                <p>$gender_intern</p>
            </div>
            <div id='foot'>
                <a href='delete.php?id=$id_int&nom=$nometprenom'><p>Supprimer le compte</p></a>
            </div>
        </div>";
    }

    function adminConsulte()
    {
        $conn = connDb();

        $sql_compte = "SELECT * FROM `manager`";
        $query_compte = mysqli_query($conn,$sql_compte) or die(mysqli_error($conn));
        $compte = mysqli_fetch_array($query_compte);
        extract($compte);

        echo"
        <div id='main'>
            <div id='body'>
                <p>$last_name_manager $first_name_manager</p>
                <p>$email_manager</p>
                <p>$tel_manager</p>
                <p>$gender_manager</p>
            </div>
            </div>
            <div id='foot'>
                <a href='configadmin.php'><p>Modifier</p></a>
            </div>
        </div>";
    }

    function adminAct($date, $id)
    {
        $conn = connDb();

        echo"
            <table>
            <caption>Activité du $date</caption>
            <tr>
                <th>Créneaux horaires</th>
                <th>Activités</th>
            </tr>
        ";

        $sql_admin_act = "SELECT * FROM `daily_activity` WHERE id_intern = '$id' AND date_daily_activity = '$date'";
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
        echo"</table>";
    }

    if(isset($_POST['bco']))//Connexion
    {
        $conn = connDb();  
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];
        $mdpc=sha1($mdp);
        $admin = $_POST['admin'];

        if($admin=="oui")
        {
            $sql_auth="select count(*) nbl from manager where email_manager='$login' and password='$mdpc'";
            $query_auth=mysqli_query($conn,$sql_auth) or die(mysqli_error($conn));
            $auth=mysqli_fetch_object($query_auth);
                
            if($auth->nbl==1)//Si les informations sont correctes
            {
                $_SESSION['login']=$login;
                $_SESSION['password'] = $mdpc;
    
                $sql_manager="SELECT id_manager FROM manager WHERE 'password' = '$mdpc' AND email_manager = '$login'";
                $query_manager = mysqli_query($conn, $sql_manager) or die(mysqli_error($conn));
                $manager = mysqli_fetch_array($query_manager);
                extract($manager);
    
                $_SESSION['id_manager'] = $id_manager;
    
                $id_manager = $_SESSION['id_manager'];

                header("location:admin/home.php");
            }else//Si les informations sont incorrectes
            {
                echo"<script>alert('Identifiant ou mot de passe incorrect');</script>";
            }
        }
        else
        {
            $sql_auth="select count(*) nbl from intern where email_intern='$login' and password_intern='$mdpc'";
            $query_auth=mysqli_query($conn,$sql_auth) or die(mysqli_error($conn));
            $auth=mysqli_fetch_object($query_auth);
                
            if($auth->nbl==1)//Si les informations sont correctes
            {
                $_SESSION['login']=$login;
                $_SESSION['password'] = $mdpc;
    
                $sql_int="SELECT * FROM intern WHERE password_intern = '$mdpc' AND email_intern = '$login'";
                $query_int = mysqli_query($conn, $sql_int) or die(mysqli_error($conn));
                $int = mysqli_fetch_array($query_int);
                extract($int);
    
                $_SESSION['id_intern'] = $id_intern;
                $_SESSION['nom'] = $last_name_intern;
                $_SESSION['prenom'] = $first_name_intern;
    
                $id_int = $_SESSION['id_intern'];
                date_default_timezone_set('Africa/Dakar');    
                $Date = datejour();
                $Time = date('h:i:s a');
                $mois = date('m');
                $annee = date('Y');
                
                $sql_check = "SELECT COUNT(*) nbl FROM connect_intern WHERE date_connect = '$Date' AND id_intern = $id_int";
                $query_check = mysqli_query($conn, $sql_check) or die(mysqli_error($conn));
                $check = mysqli_fetch_object($query_check);
                if($check->nbl==1)//Si le stagiaire s'est déja connecté dans la journnée
                {
                    $sql_connect = "SELECT * FROM connect_intern WHERE date_connect = '$Date' AND id_intern = $id_int ";
                    $query_connect = mysqli_query($conn, $sql_connect) or die(mysqli_error($conn));
                    $connect = mysqli_fetch_array($query_connect);
                    extract($connect);
        
                    $_SESSION['id_connect'] = $id_connect_intern;
                    header("location:intern/home.php?");
                }else//Si c'est la première connection de la jounnée
                {
                    $sql_date = "INSERT INTO `connect_intern` (`id_connect_intern`, `date_connect`, `month_connect`, `year_connect`, `hr_connect`, `hr_disconnect`, `id_intern`) VALUES (NULL, '$Date', '$mois', '$annee', '$Time', 'Pas déconnecté', '$id_int')";
                    $sql_query = mysqli_query($conn, $sql_date) or die(mysqli_error($conn));
        
                    $sql_connect = "SELECT * FROM connect_intern WHERE date_connect = '$Date'  AND hr_connect = '$Time' AND id_intern = $id_int ";
                    $query_connect = mysqli_query($conn, $sql_connect) or die(mysqli_error($conn));
                    $connect = mysqli_fetch_array($query_connect);
                    extract($connect);
        
                    $_SESSION['id_connect'] = $id_connect_intern;

                    $cr = array("09h - 10h", "10h - 11h", "11h - 12h", "12h - 13h", "13h - 14h", "15h - 16h", "16h - 17h");

                    for($i=0; $i<=6; $i++)
                    {
                        $sql_dlact = "INSERT INTO `daily_activity` (`id_daily_activity`, `time_slot`, `name_activity`, `id_intern`, `date_daily_activity`) VALUES (NULL, '$cr[$i]', 'Non remplis', '$id_intern', '$Date') ";
                        $sql_query = mysqli_query($conn, $sql_dlact) or die(mysqli_error($conn));
                    }

                    header("location:intern/home.php");
                }
            }else//Si les informations sont incorrectes
            {
                echo"<script>alert('Identifiant ou mot de passe incorrect');</script>";
            }
        }
    }

    if(isset($_POST['logout']))//Déconnexion du stagiaire
    {
        $conn = connDb();
        $id_connexion = $_SESSION['id_connect'];
        date_default_timezone_set('Africa/Dakar');   
        $Time = date('h:i:s a');

        $sql_deco = "UPDATE `connect_intern` SET `hr_disconnect` = '$Time' WHERE `connect_intern`.`id_connect_intern` = $id_connexion; ";
        $query_deco=mysqli_query($conn,$sql_deco) or die(mysqli_error($conn));

        session_start();
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        unset($_SESSION['id_intern']);
        unset($_SESSION['id_connect']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        header("location:../../index.php");
    }

    if(isset($_POST['deco']))//Déconnexion du manager
    {
        session_start();
        session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        unset($_SESSION['id_manager']);
        header("location:../../index.php");
    }

    if(isset($_POST['acts']))//lister les activités
    {
        $conn = connDb();
        $activtes = $_POST['activites'];

        $tactivites = explode(";", $activtes);

        foreach($tactivites as $act)
        {  
            $date = datejour();
            $id_intern = $_SESSION['id_intern'];

            $sql_act = "INSERT INTO `activity` (`id_activity`, `name_activity`, `date_activity`, `id_intern`) VALUES (NULL, '$act', '$date', '$id_intern')";
            $sql_query = mysqli_query($conn, $sql_act) or die(mysqli_error($conn));

            echo"<script>alert('$act a été ajouté');</script>";
        }
    }

    if(isset($_POST['plan']))//enregister les activités
    {
        $conn = connDb();
        $id_int = $_SESSION['id_intern'];
        $date = datejour();

        $activity = $_POST['cren'];

        date_default_timezone_set('Africa/Dakar');
        $heure = date('h-a');

        switch ($heure) 
        {
            case "09-am":
              $cr =  "9h - 10h";
              break;
            case "10-am":
                $cr =  "10h - 11h";
              break;
            case "11-am":
                $cr =  "11h - 12h";
              break;
            case "12-pm":
                $cr =  "12h - 13h";
              break;
            case "01-pm":
                $cr =  "13h - 14h";
              break;
            case "03-pm":
                $cr =  "15h - 16h";
                break;
            case "04-pm":
                $cr =  "16h - 17h";
                break;             
            default:
                $cr = "";
          }

        if($cr == "")
        {
            echo"<script>alert('Votre heure de travail est terminé, veuillez vous déconnecter')</script>";
        }else
        {
            $sql_dlact = "UPDATE `daily_activity` SET `name_activity` = '$activity' WHERE id_intern = '$id_int' AND time_slot = '$cr' AND date_daily_activity = '$date'";
            $sql_query = mysqli_query($conn, $sql_dlact) or die(mysqli_error($conn));
            header("location:home.php");
        }
    }

    if(isset($_FILES['file']))//Modifer photo de profile
    {
        $tmpName = $_FILES['file']['tmp_name'];
        $name1 = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $id_int = $_SESSION['id_intern'];
        $name = "$id_int&$name1";

        move_uploaded_file($tmpName, '../../assets/images/'.$name);

        $conn = connDb();

        if($name1 ==""){
            echo"Erreur";
        }else{
            $sql_chprofil="UPDATE `intern` SET `photo_intern` = '$name' WHERE `intern`.`id_intern` = $id_int";
            $query_chprofil = mysqli_query($conn, $sql_chprofil) or die(mysqli_error($conn));
            header("location:home.php");
        }
    }

    if(isset($_POST['buttondatep']))//liste de présence
    {
        $conn = connDb();
        $date = $_POST['datep'];
        $id_int = $_SESSION['id_intern'];
        $compte = 0;

        echo"<table border='1px solid black'><caption>Liste de présence</caption><tr><th>Connexion du $date</th><th>Heure de connexion</th></tr>";
        $sql_pre = "SELECT * FROM `connect_intern` JOIN intern WHERE date_connect = '$date' AND connect_intern.id_intern = intern.id_intern; ";
        $sql_query_apre = mysqli_query($conn, $sql_pre) or die(mysqli_error($conn));
        while($pre = mysqli_fetch_array($sql_query_apre))
        {
            extract($pre);
            echo"<tr><td>$last_name_intern $first_name_intern</td> <td>connecté à $hr_connect</td></tr>";
            $compte++;
        }        
        echo"<tr><td>Nombre de personne connecté</td><td> $compte </td></tr></table>";
    }

    if(isset($_POST['delete']))//supprimer un compte
    {
        $conn = connDb();

        $id_int = $_GET['id'];

        $sql_drop = " DELETE FROM `intern` WHERE `intern`.`id_intern` = $id_int";
        $query_drop = mysqli_query($conn, $sql_drop) or die(mysqli_error($conn));

        echo"<script>alert('Identifiant ou mot de passe incorrect');</script>";
        header("location:gestion.php");
    }

    if(isset($_POST['badmin']))//modification info admin
    {
        $conn = connDb();

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $genre = $_POST['sexe'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $titre = $_POST['titre'];
        $exp = $_POST['exp'];
        $field = $_POST['field'];
        $mdp = $_POST['mdp'];
        $mdpc = sha1($mdp);

        $sql_chprofil="UPDATE `manager` SET `last_name_manager` = '$nom', `first_name_manager` = '$prenom', `tel_manager` = '$tel', `email_manager` = '$email', `password` = '$mdpc', `title` = '$titre', `gender_manager` = '$genre', `field_activity` = '$field', `years_exp` = '$exp' WHERE `manager`.`id_manager` = 1 ";
        $query_chprofil = mysqli_query($conn, $sql_chprofil) or die(mysqli_error($conn));
        header("location:home.php");
    }
?>