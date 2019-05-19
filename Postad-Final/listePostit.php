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
    <div id="affichage3">
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
            if (!empty($_SESSION['id'])){

                $id = $_SESSION['id'];
                $requete = "SELECT titre_Postit,contenu_Postit,date_Postit , id_Postit from postit where id_Compte = '$id' ORDER BY id_Postit DESC;";
                $res=$cnx->query($requete);
                if ($row = $res->fetch()){

                    echo '<div id="affpostit2">
                    
                    <table>
                        <tr>';
                                while ($row = $res->fetch())
                            {
                                echo '<th><h1><center>'.$row['titre_Postit'].'</center></h1><br>'.$row['contenu_Postit'].$row[2].'<a href=delete.php?id='.$row['id_Postit'].'><input type="submit" value="Supprimer" class="bouton" id="b1"></a></th>';
                                
                            }
                }
                else {
                    echo 'Vous n\'avez pas publié d\'annonce';
                }
            }
        ?>
                        </tr>
                    </table>
                </div>
    </div>
    

    <footer>
        <?php include("footer.php"); ?>
    </footer>
</div>
</body>
</html>