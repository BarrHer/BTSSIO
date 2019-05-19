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
$del = $_GET['id'];
$requete = "DELETE FROM postit WHERE postit.id_Postit = '$del';";
$res=$cnx->query($requete);
header('Location: listePostit.php');
?>