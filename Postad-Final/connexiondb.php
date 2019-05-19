<?php
$server = "localhost";
$user = "root";
$pwd = "";
$db = "postit";

$cnx = mysqli_connect($server,$user,$pwd,$db);

/*if(mysqli_connect_errno())
{
echo '<p>La connexion au serveur MySQL a échoué: '.mysqli_connect_error().'</p>';
}
else
{
echo '<p>Connexion au serveur MySQL établie avec succès.</p>';
}*/


if($cnx){
    if (isset($_POST["nom"]) && isset($_POST["prénom"]) && isset($_POST["nomutilisateur"]) && isset($_POST["mail"]) && isset($_POST["mdp"])&&
    !empty($_POST["nom"]) && !empty($_POST["prénom"]) && !empty($_POST["nomutilisateur"]) && !empty($_POST["mail"]) && !empty($_POST["mdp"])){
        $nom = $_POST["nom"];
        $prenom = $_POST["prénom"];
        $user = $_POST["nomutilisateur"];
        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];
        $cmdp = $_POST["cmdp"];
        
    
        $pass_hache = password_hash($mdp, PASSWORD_DEFAULT);
        if ($mdp == $cmdp){
            $requete = "INSERT INTO compte(id_Compte,nom_Compte,prenom_Compte,pseudo_Compte,mail_Compte,mdp_Compte,date_Compte) values  ('','$nom','$prenom',
            '$user','$mail','$pass_hache',CURRENT_TIMESTAMP())";
            $res = $cnx->query($requete);
        
            if ($res){
                echo '<script>
                alert("Compte créé avec succès");
                </script>';
                //header ('location: index.php');
            }
            else {
                echo $requete;
                echo '<script>
                alert("Erreur lors de la création du compte");
                </script>';
            }
        }
        else{
            echo '<script>
            alert("Les champs mot de passe doivent être les mêmes");
            </script>';
        }
        
    }
    /*else {
        echo '<br>Veuillez remplir tous les champs';
    }*/
    //Hachage du mdp saisie
    
    //}
    else{
        echo '<br>Veuillez remplir tous les champs';
        }
}

/* Récupération des variables nécessaires au mail de confirmation	
$email = $mail;
$login = $user;
 
// Génération aléatoire d'une clé
$cle = md5(microtime(TRUE)*100000);
 
 
// Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
$stmt = $dbh->prepare("UPDATE membres SET cle=:cle WHERE login like :login");
$stmt->bindParam(':cle', $cle);
$stmt->bindParam(':login', $login);
$stmt->execute();
 
 
// Préparation du mail contenant le lien d'activation
$destinataire = $email;
$sujet = "Activer votre compte" ;
$entete = "From: herve974.30@gmail.com" ;
 
// Le lien d'activation est composé du login(log) et de la clé(cle)
$message = 'Bienvenue sur VotreSite,
 
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.
 
http://votresite.com/activation.php?log='.urlencode($login).'&cle='.urlencode($cle).'
 
 
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.';
 
 
mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail*/

mysqli_close($cnx);
?>