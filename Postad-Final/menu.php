<div id="menu">
    <ul>
        <div id="etat">
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
                
                if(empty($_SESSION)){
                    echo 'Déconnecté(e)';
                }
                else {
                    echo 'Connecté(e), <strong>'.$_SESSION['pseudo'].'</strong>';
                } ?>
        </div>
        
        <li><a href="recherche.php"> <img class="" src="images/loupe.png" alt="button" width="50%"></a></li>
        <li><a href="edition.php"> <img class="" src="images/crayon.png" alt="button" width="50%"></a></li>
        <li><a href="compte.php"> <img class="" src="images/power.png" alt="button" width="50%"></a></li>
    </ul>
</div>