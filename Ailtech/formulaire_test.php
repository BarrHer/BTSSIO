<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>ailTECH: Spécialiste réseau n°1 à la Réunion : Implantation</title>
        <link href="" rel="stylesheet">
    <link   rel="stylesheet"    type="text/css" href="style.css">
</head>

<script type="text/javascript">

// Script qui permet de vérifié l'email

//Fonction qui surligne si c'est incorrect
function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

//Fonction qui permet de vérifié si l'email est valide
function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/; // Permet de vérifié les caractères@caratères.caratères compris en 2 & 4
   if(!regex.test(champ.value))
   {
        surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
//Permet de vérifié si un champ est remplis
function verifChamp(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
// Focntion qui permet d'exécuter la fonction verifMail lorsqu'on appuie sur le bouton
function verifForm(f)
{
   var mailOk = verifMail(f.email);
   var champNomOk = verifChamp(f.nom);
   var champPrenomOk = verifChamp(f.prenom);
   var champSocieteOk = verifChamp(f.societe);
   
   if(mailOk)
      return true;
   else
   {
      alert("Vous devrez saisir une adresse email valide");
      return false;
   }
   if(champNomOk && champPrenomOk && champSocieteOk)
   {
    return true;
   }
   else
   {
    alert("Veuillez remplis tous les champs");
    return false;
   }
}
// EXTRAIT CODE PRIS SUR OPEN CLASS ROOM MAIS MODIFIÉ

</script>

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
        <form method="post" action="formulaire_inserttest.php" onsubmit="return verifForm(this)">
        <h1>Formulaire</h1><br>
                <legend><h2>Vos coordonnées</h2></legend><br>
        <table>
        <tr><td>Nom*  </td><td>: <input type="text" name="nom" id="nom" onblur="verifChamp(this)"></td></tr>
        <tr><td>Prénom*  </td><td>: <input type ="text" name="prenom" id="prenom" onblur="verifChamp(this)"></td></tr>
        <tr><td>Société* </td><td>: <input type="text" name="societe" id="societe" onblur="verifChamp(this)"></td></tr> 
        <tr><td>Adresse  </td><td>: <input type="text" name="adresse" id="adresse"></td></tr>

        <?php

        // Log pour ce connecté à la BDD

        $host="localhost";       //Nom du serveur
        $user="root";        //login au serveur de base de données
        $password="";   //mot de passe
        $db="PPE14";         //Base de données


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
            
        // COnnexion SQL

        $dbcnx = mysqli_select_db($cnx,$db);
        // La requête
        $strSQL= "SELECT * FROM Ville ;"; 

        //Exécution de la reqête
        $resultat = mysqli_query($cnx,$strSQL);

        //Affiche les résultat ville
        echo'<tr><td>Ville </td><td>: <select name="ville" id="ville">';
        while ($ligne=mysqli_fetch_array($resultat)) // Stock les résultat dans un tableau
        {
        $ville = $ligne['nomVille'];
        $codeville = $ligne['codeVille'];
        echo '<option value='.$codeville.'>'.$ville.'</option>';
        }
        echo'</select></td></tr>';
        mysqli_close($cnx);
?>
        <tr><td>Téléphone  </td><td>: <input type="text" name="telephone" id="telephone"></td></tr>
        <tr><td>Email* </td><td>: <input type="text" name="email" id="email" onblur="verifMail(this)"></td></tr>
</table>
<table>
          <tr><td><input type="checkbox" name="newslettre"> Je souhaites recevoir des newslettres  </td></tr>
        </table><br>
        <strong>* Champ obligatoire </strong><br><br>
        <input type="submit" value="Envoyez" />
        </form>
        </p>
    </article>

    <footer>
           <?php include("footer.php"); ?>
    </footer>

    </div>


</body>

</html>