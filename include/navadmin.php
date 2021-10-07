    <nav class="navbar navbar-expand-sm h-25 bg-dark navbar-dark text-light">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link <?php if($npage == "home"){echo"active";}?>" href="home.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($npage == "gestion"){echo"active";}?>" href="gestion.php">Comptes Utilisateur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($npage == "admin"){echo"active";}?>" href="admin.php">Compte administrateur</a>
            </li>
        </ul>

        <div class="mr-1">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"><input type="submit" name="logout" value="DECONNEXION" class="btn text-light"></form>
        </div>
        <?php if(isset($_POST['logout'])){logout();} ?>
    </nav> 