<?php
/*if (empty($_SESSION)){
    echo '<script>
    alert("Vous devez être connecté pour publier un postit");
    </script>';
    header ('location: /postit_melange/code/compte.php');
    exit();
}
else {
    session_start();
}*/
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
    <form action="" method="post">
        <input type="submit" value="Publier une nouvelle annonce" class="bouton" id="b1" formaction="ecrit.php">
        <input type="submit" value="Editer mes annonces" class="bouton" id="b1" formaction="listePostit.php">
    </form>
    </div>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</div>
</body>
</html>