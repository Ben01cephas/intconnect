<div class="conatainer-fluid p-2 fixed-top" style="background-color: #222b4e;">
        <div style=" float: left">
            <a href="home.php"><img src="../../assets/images/logol.jpg" alt="" class="rounded-circle" style="width: 40px; height: 40px;"></a>
        </div>
        
        <ul class="nav justify-content-end">
            <li class="nav-item p-2"><a href="" class="text-white">Profil</a></li>
            <li class="nav-item p-2"><a href="" class="text-white">Notification</a></li>
            <li class="nav-item"><form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"><input type="submit" name="logout" value="DECONNEXION" class="btn text-light"></form></li>
        </ul>
    </div>

    <div class="row mt-5">
        <div class="w-25 vh-100 text-center" style="background-color: #2a345f;" id="navl">
            <ul class="nav flex-column list-group">
                <li class="nav-item list-group-item" style="background-color: #3a4883;">
                    <a class="nav-link text-white" href="home.php">Home</a>
                </li>
                <li class="nav-item list-group-item" style="background-color: #3a4883;">
                    <a class="nav-link text-white" href="activite.php">Activite</a>
                </li>
                <li class="nav-item list-group-item" style="background-color: #3a4883;">
                    <a class="nav-link text-white" href="presence.php">Presence</a>
                </li>
            </ul>
        </div>
    <?php if(isset($_POST['logout'])){logout();} ?>
    
    