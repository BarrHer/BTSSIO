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

    <div>
        <?php 
            // Connexion à la base de données
            try
            {
                $cnx = new PDO('mysql:host=localhost;dbname=postit;charset=utf8', 'sacaroulex', 'sacaroulex');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
            
            ?>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</div>
</body>
</html>