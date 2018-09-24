<div class="container">
<?php
session_start();

/**
 * Ouvrir une connexion via PDO pour créer un
 * nouvelle base de données avec une table structurée.
 *
 */



try {

    require "../config.php";
    require "../common.php";
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
   
    

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>

<?php
if (isset($_GET['update'])) : 

    $id = $_GET['update'];

    $sql = "SELECT * 
    FROM dbannuaire.employes WHERE id=$id";


    $statement = $connection->prepare($sql);
    $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();

    $sql = "SELECT * FROM dbannuaire.employes WHERE id = $id";
    $connection->query($sql);

    foreach ($result as $row) :
        $prenom = $row["prenom"];
        $nom = $row["nom"];
        $email = $row["email"];
        $age = $row["age"];
        $ville = $row["ville"];
        $genre = $row['genre'];
        $pseudo = $row['pseudo'];
        $mdp = $row['mdp'];
        $type = $row['type_compte'];

    endforeach;?>
    
    <h2>Modifier un employé</h2>
    
    <form method="post">
        <label for="prenom">Prénom</label>
        <input placeholder="Obligatoire" type="text" name="prenom" id="prenom" class="form-control" style="width:20%" value=<?php echo "$prenom" ?> required>
        <label for="nom">Nom</label>
        <input placeholder="Obligatoire" type="text" name="nom" id="nom" class="form-control" style="width:20%" value=<?php echo "$nom" ?> required>
        <label for="genre">Genre</label>
        <SELECT name="genre" size="1">
        <OPTION>M.
        <OPTION>Md.
        <OPTION>Mdlle
        </SELECT>
        <label for="email">Adresse mail</label>
        <input type="text" name="email" id="email" class="form-control" style="width:20%" value=<?php echo "$email" ?>>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" class="form-control" style="width:20%" value=<?php echo "$age" ?>>
        <label for="ville">ville de résidence</label>
        <input type="text" name="ville" id="ville" class="form-control" style="width:20%" value=<?php echo "$ville" ?>>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control" style="width:20%" value=<?php echo "$pseudo" ?>>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" class="form-control" style="width:20%" value=<?php echo "$mdp" ?>>
        <label for="type de compte">Type de compte (actuellement 
        <?php if ($type == 0) : ?>
            <?php echo "Basique)"; ?>
        <?php endif; ?>
        <?php if ($type == 1) : ?>
            <?php echo "Admin)"; ?>
        <?php endif; ?>
        <?php if ($type == 2) : ?>
            <?php echo "Super Admin)"; ?>
        <?php endif; ?>
        </label>
        <SELECT name="type_compte" size="1">
        <OPTION value="0">Basique</option>
        <OPTION value="1">Admin</option>
        <OPTION value="2">Super-Admin</option>
        </SELECT>
        
        <br><br>
        <div  class="form-group">
        <a href="lire.php" role="button" class="btn btn-info" id="retour" style="width:7%">Retour</a>
        <input type="submit" name="submit" value="Modifier" class="btn btn-success" style="margin-left:5%">
        <br><br>
    </form>
</div>

    

<?php

endif; ?>

<?php 
if (isset($_POST['submit'])){
    
    $new_user = array(
        "prenom"    => $_POST['prenom'],
        "nom"       => $_POST['nom'],
        "email"     => $_POST['email'],
        "age"       => $_POST['age'],
        "ville"     => $_POST['ville'],
        "genre"     => $_POST['genre'],
        "mdp"       => $_POST['password'],
        "pseudo"    => $_POST['pseudo'],
        "type_compte"   => $_POST['type_compte']
    );

    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $ville = $_POST["ville"];
    $genre = $_POST['genre'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['password'];
    $type = $_POST['type_compte'];

    $sql = "UPDATE dbannuaire.employes set prenom='$prenom', nom='$nom', email='$email', age='$age', ville='$ville', pseudo='$pseudo', mdp='$mdp', type_compte='$type', genre='$genre' WHERE id='$id'";
    $connection->query($sql);

    header('location: lire.php');
}

?>

<?php require "templates/footer.php"; ?>
</div>