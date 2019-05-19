<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>ailTECH: Spécialiste réseau n°1 à la Réunion : Implantation</title>
        <link href="" rel="stylesheet">
    <link   rel="stylesheet"    type="text/css" href="style.css">
</head>

<body>
 <?php include("meta.php"); ?>
    <div class="container">

    <header>
 <?php include("header.php"); ?>
    </header>

    <nav>
    <?php include("menu.php"); ?>
        </nav>

    <article>
        <p>
            <map name="carte">
                <area shape="circle" coords="295,355,15" href="centre1.php" alt="information">
                <area shape="circle" coords="184,350,15" href="centre2.php" alt="information">
                <area shape="circle" coords="180,60,15" href="centre3.php" alt="information">
            </map>
            <img usemap="#carte" src="images/carte.png">
        </p>
    </article>

    <footer>
           <?php include("footer.php"); ?>
    </footer>

    </div>

</body>

</html>