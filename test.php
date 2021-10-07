<?php
    function afficheTable($n)
    {
        $nlettre = array(1=>"un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf", "dix", "onze", "douze", "treize", "quatorze", "quinze", "seize", "dix-sept", "dix-huit", "dix-neuf", "vingt"); 
        echo "<h2>Table de multipliaction de $nlettre[$n]</h2>";
        echo "<table><tr><th>Fois</th><th>$n</th></tr>";
        for($i=1; $i<=20; $i++)
        {
            echo "<tr><td>$i</td><td>".($n * $i)."</td>";
        }
        echo "</table>";
    }

    echo "<style>
        th, td{ border: 1px solid black;}
        table{ margin: auto; border-collapse: collapse; width: 300px; text-align: center;}
        h2{text-align: center;}
        li{display: inline; margin-left: 20px;}
        ul{text-align: center;}   
    </style>";

?>

<ul>
    <?php 
        $url = $_SERVER['PHP_SELF'];
        for($i=1; $i<=20; $i++)
        {
            echo "<li><a href='$url?n=$i'>$i</a></li>";
        }
    ?>
</ul>

<?php 
    // Verifier qu'on a cliquer
    if (isset($_GET['n']))
    {
        $n = $_GET['n'];
        afficheTable($n);
    }
?>