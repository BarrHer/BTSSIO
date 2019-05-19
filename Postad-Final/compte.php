<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PostAd.com</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>


<div class="container">

    <header>
        <?php include("header.php"); ?>
    </header>


    <nav>
        <?php include("menu.php"); ?>
    </nav>

    <div id="affichage">
        <?php 
        
        if (empty($_SESSION)){
            include("choixlogout.php");
        }
        else{
            include("choixlogin.php");
        }
        ?>
    </div>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</div>
</body>
</html>