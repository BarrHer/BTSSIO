<?php
session_start();
try  {
        
        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>

<div class="container">
        <?php require "templates/header.php"; ?>
        <form action="" method="post">
            <label for="POST-username">Nom d'utilisateur : </label>
            <input type="text" name="pseudo" class="form-control" style="width:20%" required>
            <br>
            <label for="POST-password">Mot de passe : </label>
            <input type="password" name="mdp" class="form-control" style="width:20%" required>
            <br>
            <input type="submit" value="Connexion" name="login" class="btn btn-success">
        </form>

<?php

if (isset($_POST['login'])){
    $user = $_POST["pseudo"];
    $mdp = $_POST["mdp"];

    $sql = "SELECT id, pseudo, mdp,type_compte  FROM dbannuaire.employes WHERE pseudo = '$user' and mdp = '$mdp'";

    $result = $connection->query($sql);

    //$id = $result->fetchColumn();
    //$type_compte = $result->fetchColumn($sql);

    //echo $sql;

    $values = $result->fetchAll(PDO::FETCH_ASSOC);
    $id = $values[0]['id'];
    $type_compte = $values[0]['type_compte'];

    $nbr=$result->rowCount();
    //echo "nbr = $nbr";
    echo "type = $id";

    echo "type = $type_compte";

    if ($nbr == 1){
        session_start();
        
        $_SESSION['id'] = $id;
        $_SESSION['pseudo'] = $user;
        $_SESSION['type_compte'] = $type_compte;
        echo 'Vous êtes connecté !';
        header ('location: index.php');

        
    }

    else {
        echo '<script>
        alert("Mauvais identifiant ou mot de passe !");
    </script>';
    }


}


        /*$isPasswordCorrect = password_verify($mdp, $password);
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
        }*/
    


?>

<?php require "templates/footer.php"; ?>