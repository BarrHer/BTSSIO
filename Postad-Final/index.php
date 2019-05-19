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

    <div id="affpostit">
    <table>
        <tr>
            <?php 
                // Connexion à la base de données
                try
                {
                    $cnx = new PDO('mysql:host=localhost;dbname=postit;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }

                // Récupération des post par ordre du plus recent
                $requete="SELECT id_Postit , titre_Postit , date_Postit FROM postit ORDER BY id_Postit DESC";
                $res = $cnx->query($requete);
                

                // Affichage de chaque postit
                while ($row = $res->fetch())
                {
                    echo '<th><a class=lien href=index.php?param='.$row[0].'><strong>' . htmlspecialchars($row['titre_Postit']) . '</strong></a>'/*.$row[2].'*/.'</th>';
                }
            ?>
        </tr>
    </table>
    </div>

    <nav>
        <?php include("menu.php"); ?>
    </nav>

    <div id="affichage">
    <?php 
        // Connexion à la base de données
        try
        {
            $cnx2 = new PDO('mysql:host=localhost;dbname=postit;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }

        if (!empty($_GET['param'])){
        //page
        $requete2="SELECT titre_Postit,contenu_Postit,date_Postit from postit where id_Postit =".$_GET['param'].";";
        $res2=$cnx2->query($requete2);
        while ($row2 = $res2->fetch())
        {
            echo '<h1><center>'.$row2['titre_Postit'].'</center></h1><br>'.$row2['contenu_Postit'].'<br><br><br><br><br>'.$row2[2];
        }
    }
    ?>
    </div>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</div>
</body>
</html>