<?php 

if (isset($_POST['recherche']) && !empty($_POST['recherche'])){
    $server = "localhost";
    $user = "root";
    $pwd = "";
    $db = "postit";
    
    $cnx = mysqli_connect($server,$user,$pwd,$db);

    $saisie = htmlspecialchars($_POST['recherche']);
    $requete = ("SELECT contenu_Postit, titre_Postit FROM postit WHERE contenu_Postit OR titre_Postit LIKE '%$saisie%' ORDER BY DESC;") or die(mysql_error());
    //On compte le nombre de résultats
    $nb_resultats = mysql_num_rows($requete);

    if ($nb_resultats != 0){
        while ($row = mysqli_fetch($requete)) {
            
        }
    }
    $res = mysqli_query($cnx,$requete);
    $recup=mysqli_fetch_assoc($res);
    $titre = $recup['titre_Postit'];
    $contenu = $recup['contenu_Postit'];
}

?>
