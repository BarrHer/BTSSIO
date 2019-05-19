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
<?php

        // Log pour ce connecté à la BDD

        $host="localhost";       //Nom du serveur
        $user="root";        //login au serveur de base de données
        $password="btssio97";   //mot de passe
        $db="User";         //Base de données


        // Test du serveur
        $cnx = mysqli_connect($host,$user,$password);

            // Vérifier la connexion
            if(!$cnx){
                die("Échec de la connexion au serveur ");
            }
            //echo " connexion OK <br /><br />";

            // Sélection de la base de données
            $dbcnx =  mysqli_select_db($cnx,$db);


         // Vérifier la base de données
            if (!$dbcnx) {
                die("Échec de la connexion à la base de données");
            }
            
        //Variable pour le login & le mot de passe 

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $societe = $_POST['societe'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $ville = $_POST['ville'];

       // $newslettre = $_POST['newslettre'];


        if(!empty($nom) && !empty($prenom) && !empty($societe))
        {
        //Exécution de la requête
        $strSQL = "INSERT INTO Contact (nomUser, prenomUser,societeUser,adresseUser,codePostalUser, villeUser,telephoneUser,emailUser) VALUES ('$nom','$prenom','$societe','$adresse','$cp','$ville','$telephone','$email');";
        mysqli_query($cnx,$strSQL);

        //confirme que l'utilisateur a était rajouté
        echo '<br>Vous serez bientôt contacter,<strong>'.$nom.'</strong> <strong>'.$prenom.'</strong>';
        // vérifier avec adminer ou phpmyadmin
        mysqli_close($cnx);
        }
        else
        {
            echo'<br>Vous devrez remplir tous les <strong>champs obligatoires</strong><br> <a href="formulaire.php">Retourner sur le formulaire</a>';
        }
?>
    </article>

    <footer>
           <?php include("footer.php"); ?>
    </footer>

    </div>

</body>

</html>