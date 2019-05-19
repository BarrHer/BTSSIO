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
    <label for="POST-titre">Titre : </label>
        <input type="text" id="titreform" name='titre'><br>
        <label for="POST-area">Messages : </label>
        <textarea cols="85" rows="20" name='contenu'></textarea>
        <input type="submit" value="Envoyer" class="bouton" id="b1">
    </form>
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
        if (isset($_POST['contenu']) && isset($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['titre'])){
            if (!empty($_SESSION)){
                $contenu = $_POST['contenu'];
                $titre = $_POST['titre'];
                $idCompte = $_SESSION['id'];
                $requete = "INSERT INTO postit(id_Postit,id_Compte,contenu_Postit,titre_Postit,date_Postit) VALUES ('','$idCompte','$contenu','$titre',CURRENT_TIMESTAMP())";
                $res = $cnx->query($requete);
    
                if ($cnx){
                    if ($res){
                        echo '<br>Publication effectuée';
                    }
                    else {
                        echo '<br>Erreur de publication';
                    }
                }
            }
            else {
                echo '<script>
                alert("Vous devez être connecté pour publier un postit");
                </script>';
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