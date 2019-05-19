<?php
//Connexion a la base de données
$server = "localhost";
$user = "root";
$pwd = "";
$db = "postit";

$cnx = mysqli_connect($server,$user,$pwd,$db);

//Si la connexion est établie alors
if ($cnx){

    //Si les champs existent et son rempli alors
    if (isset($_POST["nomutilisateur"]) && isset($_POST["mdp"]) && !empty($_POST["nomutilisateur"]) && !empty($_POST["mdp"])){
        $user = $_POST["nomutilisateur"];
        $mdp = $_POST["mdp"];
        $requete = "SELECT id_Compte, pseudo_Compte, mdp_Compte FROM compte WHERE pseudo_Compte LIKE '$user'";
        //$requete2 = "SELECT mdp_Compte FROM compte WHERE mdp_Compte LIKE '$mdp'";

        $res = mysqli_query($cnx,$requete);
        //$res2 = mysqli_query($cnx,$requete2);

        $recup=mysqli_fetch_assoc($res);
        $pseudo = $recup['pseudo_Compte'];

        //$recup_id = mysqli_fetch_assoc($res);
        $id = $recup['id_Compte'];

        //$recup_mdp=mysqli_fetch_assoc($res);
        $password = $recup['mdp_Compte'];

        //Vérification du mdp haché avec celui saisie (retourne un bouleen)
        $isPasswordCorrect = password_verify($mdp, $password);
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['pseudo'] = $pseudo;
            echo 'Vous êtes connecté !';
            header ('location: index.php');
            exit;
        }
        else {
            echo '<script>
            alert("Mauvais identifiant ou mot de passe !");
        </script>';
        }
        /*
        if ($mdp == $pseudo && $user == $password){
            session_start();
            $_SESSION['login'] = $_POST['nomutilisateur'];
            $_SESSION['pwd'] = $_POST['mdp'];

            header ('location: index.php');
            exit;
        }
        else {
            echo '<script>
                alert("Identifiant ou mot de passe incorrect");
            </script>';
            echo $pseudo." ".$password;
            echo $mdp." ".$user;
        }*/
    }
}