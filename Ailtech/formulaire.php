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
   
   if(mailOk)
      return true;
   else
   {
      alert("Vous devrez saisir une adresse email valide");
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
        <form method="post" action="formulaire_insert.php" onsubmit="return verifForm(this)">
        <h1>Formulaire</h1><br>
                <legend><h2>Vos coordonnées</h2></legend><br>
        <table>
          <tr><td>Nom*  </td><td>: <input type="text" name="nom" id="nom" onblur="verifChamp(this)"></td></tr>
          <tr><td>Prénom*  </td><td>: <input type ="text" name="prenom" id="prenom" onblur="verifChamp(this)"></td></tr>
          <tr><td>Société* </td><td>: <input type="text" name="societe" id="societe" onblur="verifChamp(this)"></td></tr> 
          <tr><td>Adresse  </td><td>: <input type="text" name="adresse" id="adresse"></td></tr>
          <tr><td>Code Postal  </td><td>: <input type="text" name="cp" id="cp"></td></tr>
          <tr><td>Ville  </td><td>: <input type="text" name="ville" id="ville"></td></tr>
          <tr><td>Téléphone  </td><td>: <input type="text" name="telephone" id="telephone"></td></tr>
          <tr><td>Email* </td><td>: <input type="text" name="email" id="email" onblur="verifMail(this)"></td></tr>
      </table>
      <table>
          <tr><td><input type="checkbox" name="newslettre"> Je souhaites recevoir des newslettres  </td></tr>
        </table><br>
        <strong><p>* Champ obligatoire </strong></p>
        <input type="submit" value="Envoyez" />
        </form>
    </article>

    <footer>
           <?php include("footer.php"); ?>
    </footer>

    </div>


</body>

</html>