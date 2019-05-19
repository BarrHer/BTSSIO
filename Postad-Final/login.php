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
        <?php include("connexioncompte.php") ?>
        <form action="" method="post">
            <label for="POST-username">Nom d'utilisateur : </label>
            <input type="text" name="nomutilisateur">
            <br>
            <label for="POST-password">Mot de passe : </label>
            <input type="password" name="mdp">
            <br>
            <input type="submit" value="Connexion" id="connexion">
        </form>
    </div>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</div>
</body>
</html>